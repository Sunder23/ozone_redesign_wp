import { initFloorplanTabs } from '@js/components/floorplanTabs.js';
import { initLenis } from '@js/components/lenis.js';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

document.addEventListener('DOMContentLoaded', () => {
  initFloorplanTabs();
  initLenis();
});
