(function() {
  'use strict';

  // Accepted image extensions
  const accepted = ['jpg','jpeg','png','gif','webp'];

  function hasValidExtension(filename) {
    if (!filename) return false;
    const parts = filename.toLowerCase().split('.');
    if (parts.length < 2) return false;
    return accepted.includes(parts.pop());
  }

  function wireImageValidation() {
    const inputs = document.querySelectorAll('input[type="file"]#image, input[type="file"][data-validate-image]');
    inputs.forEach(function(input) {
      input.addEventListener('change', function() {
        const file = input.files && input.files[0] ? input.files[0] : null;
        const filename = file ? file.name : input.value;
        const error = input.closest('div').querySelector('.error-message');
        const valid = hasValidExtension(filename);
        if (error) error.style.display = valid ? 'none' : 'block';
        if (!valid) input.value = '';
      });
    });
  }

  function wireImageModals() {
    const triggers = document.querySelectorAll('[data-image-modal]');
    const modalEl = document.getElementById('imagePreviewModal');
    if (!modalEl) return;
    let bsModal = null;
    if (window.bootstrap) bsModal = new window.bootstrap.Modal(modalEl);
    const modalImg = modalEl.querySelector('img');
    triggers.forEach(function(el) {
      el.addEventListener('click', function(e) {
        e.preventDefault();
        const src = el.getAttribute('data-image-modal');
        if (modalImg && src) {
          modalImg.src = src;
          if (bsModal) bsModal.show();
        }
      });
    });
  }

  function wireDeleteConfirmations() {
    document.querySelectorAll('[data-confirm="delete"]').forEach(function(btn) {
      btn.addEventListener('click', function(e) {
        if (!confirm('Are you sure you want to delete this skill? This cannot be undone.')) {
          e.preventDefault();
        }
      });
    });
  }

  function wireGalleryFilter() {
    const filterButtons = document.querySelectorAll('[data-filter-category]');
    const items = document.querySelectorAll('[data-category]');
    if (!filterButtons.length || !items.length) return;
    filterButtons.forEach(function(btn) {
      btn.addEventListener('click', function() {
        const cat = btn.getAttribute('data-filter-category');
        filterButtons.forEach(function(b) { b.classList.remove('active'); });
        btn.classList.add('active');
        items.forEach(function(it) {
          const match = (cat === 'all') || (it.getAttribute('data-category') === cat);
          it.style.display = match ? '' : 'none';
        });
      });
    });
  }

  document.addEventListener('DOMContentLoaded', function() {
    wireImageValidation();
    wireImageModals();
    wireDeleteConfirmations();
    wireGalleryFilter();
  });
})();
