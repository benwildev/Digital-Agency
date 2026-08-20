/**
 * Digital Agency — Global Shell Interaction & Accessibility JavaScript
 *
 * @package DigitalAgency
 * @version 1.1.0
 */

(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {
    initStickyHeader();
    initA11yNavigation();
    initSmoothScroll();
  });

  /**
   * Sticky Header Dynamic Background & Blur on Scroll
   */
  function initStickyHeader() {
    const header = document.querySelector('.agency-header');
    if (!header) return;

    let ticking = false;

    function onScroll() {
      if (!ticking) {
        window.requestAnimationFrame(function () {
          if (window.scrollY > 20) {
            header.classList.add('is-scrolled');
          } else {
            header.classList.remove('is-scrolled');
          }
          ticking = false;
        });
        ticking = true;
      }
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll(); // Initial check
  }

  /**
   * Accessibility Enhancements for Mobile Navigation Overlay & Focus Trap
   */
  function initA11yNavigation() {
    const navContainers = document.querySelectorAll('.wp-block-navigation__responsive-container');

    // Observe overlay open/close attribute changes for body scroll lock & ESC key handling
    navContainers.forEach(function (container) {
      const observer = new MutationObserver(function (mutations) {
        mutations.forEach(function (mutation) {
          if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
            const isOpen = container.classList.contains('is-menu-open');
            if (isOpen) {
              document.body.classList.add('agency-menu-open');
            } else {
              document.body.classList.remove('agency-menu-open');
            }
          }
        });
      });

      observer.observe(container, { attributes: true });
    });

    // Close on Escape key press
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' || e.keyCode === 27) {
        const openNavCloseBtn = document.querySelector(
          '.wp-block-navigation__responsive-container.is-menu-open .wp-block-navigation__responsive-container-close'
        );
        if (openNavCloseBtn) {
          openNavCloseBtn.click();
        }
      }
    });

    // Ensure accessible labels on open/close buttons
    const openBtns = document.querySelectorAll('.wp-block-navigation__responsive-container-open');
    openBtns.forEach(function (btn) {
      if (!btn.getAttribute('aria-label')) {
        btn.setAttribute('aria-label', 'Open main navigation menu');
      }
    });

    const closeBtns = document.querySelectorAll('.wp-block-navigation__responsive-container-close');
    closeBtns.forEach(function (btn) {
      if (!btn.getAttribute('aria-label')) {
        btn.setAttribute('aria-label', 'Close main navigation menu');
      }
    });
  }

  /**
   * Smooth Scrolling for internal anchor links (e.g. #contact)
   */
  function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]:not([href="#"])').forEach(function (anchor) {
      anchor.addEventListener('click', function (e) {
        const targetId = this.getAttribute('href');
        const target = document.querySelector(targetId);
        if (target) {
          e.preventDefault();
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
          // Focus target for accessibility
          target.setAttribute('tabindex', '-1');
          target.focus({ preventScroll: true });
        }
      });
    });
  }
})();
