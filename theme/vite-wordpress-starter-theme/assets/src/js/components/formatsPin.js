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
    start: 'top top',
    end: 'bottom top',
    pin: true,
    pinType: 'transform',
    pinSpacing: false,
  });
}
