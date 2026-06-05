import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { initFloorplanTabs } from '@js/components/floorplanTabs.js';
import { initHeroAnimation } from '@js/components/heroAnimation.js';
import { initLenis } from '@js/components/lenis.js';
import { initWellnessStack } from '@js/components/wellnessStack.js';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

gsap.registerPlugin(ScrollTrigger);

document.addEventListener('DOMContentLoaded', () => {
  const lenis = initLenis();

  // Drive Lenis via GSAP ticker so ScrollTrigger stays in sync
  lenis.on('scroll', ScrollTrigger.update);
  gsap.ticker.add((time) => {
    lenis.raf(time * 1000);
  });
  gsap.ticker.lagSmoothing(0);

  initHeroAnimation();
  initFloorplanTabs();
  initWellnessStack();
});
