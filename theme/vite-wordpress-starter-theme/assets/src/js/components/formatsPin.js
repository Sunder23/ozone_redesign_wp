import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

export function initFormatsPin() {
  const formats = document.querySelector('.formats');
  const enjoy = document.querySelector('.enjoy');
  if (!formats || !enjoy) return;

  // enjoy slides over the pinned formats section — needs higher stacking order
  gsap.set(enjoy, { position: 'relative', zIndex: 10 });

  ScrollTrigger.create({
    trigger: formats,
    start: () => {
      if (window.innerWidth > 1440) return 'top top';
      const h2 = formats.querySelector('.formats__header h2');
      if (!h2) return 'top top';
      const offset = h2.getBoundingClientRect().top - formats.getBoundingClientRect().top;
      return `top+=${Math.max(0, offset - 30)} top`;
    },
    end: 'bottom top',
    pin: true,
    pinType: 'transform',
    pinSpacing: false,
  });
}
