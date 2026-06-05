import Swiper from 'swiper';
import { Pagination } from 'swiper/modules';

export function initFloorplanTabs() {
  const tabBtns = document.querySelectorAll('.floorplan__section-btn');
  const panels = document.querySelectorAll('.floorplan__panel');

  if (!tabBtns.length) return;

  panels.forEach((panel, index) => {
    const swiperEl = panel.querySelector('.floorplan__swiper');
    const floorBtnContainer = document.querySelector(`[data-floorplan="${index}"]`);
    const floorBtns = floorBtnContainer ? floorBtnContainer.querySelectorAll('.floorplan__floor') : [];

    if (!swiperEl) return;

    const swiper = new Swiper(swiperEl, {
      modules: [Pagination],
      slidesPerView: 1,
      pagination: {
        el: swiperEl.querySelector('.swiper-pagination'),
        clickable: true,
      },
    });

    floorBtns.forEach((btn, i) => {
      btn.addEventListener('click', () => {
        floorBtns.forEach(b => b.classList.remove('floorplan__floor--active'));
        btn.classList.add('floorplan__floor--active');
        swiper.slideTo(i);
      });
    });

    swiper.on('slideChange', () => {
      floorBtns.forEach(b => b.classList.remove('floorplan__floor--active'));
      if (floorBtns[swiper.activeIndex]) {
        floorBtns[swiper.activeIndex].classList.add('floorplan__floor--active');
      }
    });
  });

  tabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const idx = btn.dataset.tab;
      tabBtns.forEach(b => b.classList.remove('floorplan__section-btn--active'));
      btn.classList.add('floorplan__section-btn--active');
      panels.forEach(p => p.classList.toggle('is-active', p.dataset.tab === idx));
    });
  });
}
