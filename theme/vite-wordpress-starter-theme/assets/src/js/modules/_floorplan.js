export default function initFloorplan() {
  const sectionBtns = document.querySelectorAll('.floorplan__section-btn');
  const floorsEl    = document.getElementById('floorsA');
  const floorBtns   = document.querySelectorAll('.floorplan__floor');

  if (!sectionBtns.length) return;

  sectionBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      sectionBtns.forEach(b => b.classList.remove('floorplan__section-btn--active'));
      btn.classList.add('floorplan__section-btn--active');

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
}
