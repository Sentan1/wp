// Common JS for SkillSwap
// - Image extension validation for uploads
// - Bootstrap modal utility for gallery/details images

(function() {
  'use strict';

  // Validate image file extensions on inputs with id="image" or data-validate-image
  const accepted = ['jpg','jpeg','png','gif','webp'];

  function hasValidExtension(filename) {
    if (!filename) return false;
    const parts = filename.toLowerCase().split('.');
    if (parts.length < 2) return false;
    const ext = parts.pop();
    return accepted.includes(ext);
  }

  function wireImageValidation() {
    const inputs = document.querySelectorAll('input[type="file"]#image, input[type="file"][data-validate-image]');
    inputs.forEach(function(input) {
      input.addEventListener('change', function() {
        const file = input.files && input.files[0] ? input.files[0] : null;
        const filename = file ? file.name : input.value;
        const error = input.closest('div').querySelector('.error-message');
        const valid = hasValidExtension(filename);
        if (error) {
          error.style.display = valid ? 'none' : 'block';
        }
        if (!valid) {
          input.value = '';
        }
      });
    });
  }

  // Modal helper: any element with [data-image-modal] will open #imagePreviewModal with src
  function wireImageModals() {
    const triggers = document.querySelectorAll('[data-image-modal]');
    const modalEl = document.getElementById('imagePreviewModal');
    if (!modalEl) return;

    let bsModal = null;
    if (window.bootstrap) {
      bsModal = new window.bootstrap.Modal(modalEl);
    }
    const modalImg = modalEl.querySelector('img');

    triggers.forEach(function(el) {
      el.addEventListener('click', function(e) {
        e.preventDefault();
        const src = el.getAttribute('data-image-modal');
        if (modalImg && src) {
          modalImg.src = src;
          if (bsModal) {
            bsModal.show();
          } else {
            modalEl.classList.add('show');
            modalEl.style.display = 'block';
          }
        }
      });
    });

    // Fallback close if not using Bootstrap's JS
    modalEl.addEventListener('click', function(e) {
      if (e.target === modalEl && !window.bootstrap) {
        modalEl.classList.remove('show');
        modalEl.style.display = 'none';
      }
    });
  }

  document.addEventListener('DOMContentLoaded', function() {
    wireImageValidation();
    wireImageModals();
  });
})();


