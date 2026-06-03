'use strict';

/* ── Floor Plan Tabs ─────────────────────────────────────────────────────── */
(function () {
  const sectionBtns = document.querySelectorAll('.floorplan__section-btn');
  const floorsEl    = document.getElementById('floorsA');
  const floorBtns   = document.querySelectorAll('.floorplan__floor');

  sectionBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      sectionBtns.forEach(b => b.classList.remove('floorplan__section-btn--active'));
      btn.classList.add('floorplan__section-btn--active');

      /* Show floor picker only for section A */
      if (floorsEl) {
        floorsEl.style.display = btn.dataset.section === 'A' ? 'flex' : 'none';
      }
    });
  });

  floorBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      floorBtns.forEach(b => b.classList.remove('floorplan__floor--active'));
      btn.classList.add('floorplan__floor--active');
    });
  });
})();

/* ── Smooth anchor links ─────────────────────────────────────────────────── */
document.querySelectorAll('a[href^="#"]').forEach(link => {
  link.addEventListener('click', e => {
    const target = document.querySelector(link.getAttribute('href'));
    if (target) {
      e.preventDefault();
      target.scrollIntoView({ behavior: 'smooth' });
    }
  });
});
