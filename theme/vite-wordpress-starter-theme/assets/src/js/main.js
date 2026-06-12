import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { initFloorplanTabs } from '@js/components/floorplanTabs.js';
import { initHeroAnimation } from '@js/components/heroAnimation.js';
import { initLenis } from '@js/components/lenis.js';
import { initWellnessStack } from '@js/components/wellnessStack.js';
import { initScrollReveal } from '@js/components/scrollReveal.js';
import { initFormatsPin } from '@js/components/formatsPin.js';
import { initTechReveal } from '@js/components/techReveal.js';
import { initTimelineReveal } from '@js/components/timelineReveal.js';
import { initHeaderSecond } from '@js/components/headerSecond.js';
import { initVideoPopup } from '@js/components/videoPopup.js';
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
  initFormatsPin();
  initFloorplanTabs();
  initWellnessStack();
  initTechReveal();
  initTimelineReveal();
  initScrollReveal();
  initHeaderSecond();
  initVideoPopup();

  ScrollTrigger.refresh();
});
