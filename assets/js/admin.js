/**
 * Digital Agency Theme — Admin JavaScript Engine (Vanilla JS)
 *
 * @package DigitalAgency
 * @version 1.1.0
 */

document.addEventListener('DOMContentLoaded', function () {
    'use strict';

    // =========================================================================
    // 1. Generic Repeatable Field Engine
    // =========================================================================
    function initRepeatableFields() {
        document.addEventListener('click', function (e) {
            // Add Row
            const addBtn = e.target.closest('[data-repeatable-add]');
            if (addBtn) {
                e.preventDefault();
                const wrapper = addBtn.closest('.agency-repeatable-wrapper');
                if (!wrapper) return;

                const list = wrapper.querySelector('.agency-repeatable-list');
                const fieldName = addBtn.getAttribute('data-field-name');
                const placeholder = addBtn.getAttribute('data-placeholder') || '';
                const isSkill = addBtn.hasAttribute('data-skill-repeatable');

                if (list) {
                    const row = document.createElement('li');
                    if (isSkill) {
                        row.className = 'agency-skill-row';
                        row.innerHTML = `
                            <input type="text" name="${fieldName}_name[]" value="" placeholder="${placeholder}" class="agency-skill-name" required />
                            <input type="range" value="85" min="0" max="100" class="agency-skill-range" />
                            <input type="number" name="${fieldName}_pct[]" value="85" min="0" max="100" class="agency-skill-number" required />
                            <button type="button" class="agency-repeatable-remove" data-repeatable-remove aria-label="Remove skill">&times;</button>
                        `;
                    } else {
                        row.className = 'agency-repeatable-row';
                        row.innerHTML = `
                            <input type="text" name="${fieldName}[]" value="" placeholder="${placeholder}" class="agency-repeatable-input" required />
                            <button type="button" class="agency-repeatable-remove" data-repeatable-remove aria-label="Remove item">&times;</button>
                        `;
                    }

                    list.appendChild(row);
                    const firstInput = row.querySelector('input');
                    if (firstInput) {
                        firstInput.focus();
                    }
                }
            }

            // Remove Row
            const removeBtn = e.target.closest('[data-repeatable-remove]');
            if (removeBtn) {
                e.preventDefault();
                const row = removeBtn.closest('li');
                if (row) {
                    const list = row.closest('.agency-repeatable-list');
                    row.remove();
                    if (list && list.children.length === 0) {
                        // Keep container clean
                    }
                }
            }
        });
    }

    // =========================================================================
    // 2. Team Member Skill Slider & Number Synchronizer
    // =========================================================================
    function initSkillSync() {
        document.addEventListener('input', function (e) {
            const range = e.target.closest('.agency-skill-range');
            if (range) {
                const row = range.closest('.agency-skill-row');
                const number = row.querySelector('.agency-skill-number');
                if (number) {
                    number.value = Math.min(100, Math.max(0, parseInt(range.value, 10) || 0));
                }
            }

            const number = e.target.closest('.agency-skill-number');
            if (number) {
                const row = number.closest('.agency-skill-row');
                const range = row.querySelector('.agency-skill-range');
                const clamped = Math.min(100, Math.max(0, parseInt(number.value, 10) || 0));
                if (range) {
                    range.value = clamped;
                }
            }
        });
    }

    // =========================================================================
    // 3. WordPress Media Library Gallery Selector
    // =========================================================================
    function initGallerySelector() {
        let mediaFrame = null;

        document.addEventListener('click', function (e) {
            const selectBtn = e.target.closest('[data-gallery-select]');
            if (selectBtn) {
                e.preventDefault();
                const wrapper = selectBtn.closest('.agency-gallery-wrapper');
                if (!wrapper) return;

                const input = wrapper.querySelector('[data-gallery-input]');
                const thumbs = wrapper.querySelector('[data-gallery-thumbs]');

                if (typeof wp === 'undefined' || !wp.media) {
                    alert('WordPress Media Library is unavailable.');
                    return;
                }

                // Create or reuse media frame
                mediaFrame = wp.media({
                    title: selectBtn.getAttribute('data-frame-title') || 'Select Gallery Images',
                    button: {
                        text: selectBtn.getAttribute('data-frame-button') || 'Add to Gallery'
                    },
                    multiple: true,
                    library: {
                        type: 'image'
                    }
                });

                mediaFrame.on('select', function () {
                    const selection = mediaFrame.state().get('selection');
                    let currentIds = [];

                    try {
                        currentIds = JSON.parse(input.value || '[]');
                        if (!Array.isArray(currentIds)) currentIds = [];
                    } catch (err) {
                        currentIds = [];
                    }

                    selection.each(function (attachment) {
                        const att = attachment.toJSON();
                        const id = parseInt(att.id, 10);
                        if (id && !currentIds.includes(id)) {
                            currentIds.push(id);

                            // Remove empty placeholder message if present
                            const emptyMsg = thumbs.querySelector('.agency-gallery-empty-msg');
                            if (emptyMsg) {
                                emptyMsg.remove();
                            }

                            // Append thumb item
                            const thumbUrl = (att.sizes && att.sizes.thumbnail) ? att.sizes.thumbnail.url : att.url;
                            const item = document.createElement('div');
                            item.className = 'agency-gallery-thumb-item';
                            item.setAttribute('data-attachment-id', id);
                            item.innerHTML = `
                                <img src="${thumbUrl}" alt="" />
                                <button type="button" class="agency-gallery-thumb-remove" data-gallery-remove aria-label="Remove image">&times;</button>
                            `;
                            thumbs.appendChild(item);
                        }
                    });

                    input.value = JSON.stringify(currentIds);
                });

                mediaFrame.open();
            }

            // Remove Single Gallery Image
            const removeThumbBtn = e.target.closest('[data-gallery-remove]');
            if (removeThumbBtn) {
                e.preventDefault();
                const item = removeThumbBtn.closest('.agency-gallery-thumb-item');
                if (!item) return;

                const wrapper = item.closest('.agency-gallery-wrapper');
                const input = wrapper.querySelector('[data-gallery-input]');
                const thumbs = wrapper.querySelector('[data-gallery-thumbs]');
                const idToRemove = parseInt(item.getAttribute('data-attachment-id'), 10);

                item.remove();

                if (input) {
                    try {
                        let currentIds = JSON.parse(input.value || '[]');
                        if (Array.isArray(currentIds)) {
                            currentIds = currentIds.filter(id => id !== idToRemove);
                            input.value = JSON.stringify(currentIds);
                        }
                    } catch (err) {
                        input.value = '[]';
                    }
                }

                if (thumbs && thumbs.children.length === 0) {
                    thumbs.innerHTML = '<p class="agency-gallery-empty-msg">No images selected in gallery.</p>';
                }
            }
        });
    }

    // Initialize all modules
    initRepeatableFields();
    initSkillSync();
    initGallerySelector();
});
