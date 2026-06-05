import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

export function initHeaderSecond() {
  const el = document.querySelector('.header_second');
  const intro = document.querySelector('.intro');
  const footer = document.querySelector('footer');
  if (!el || !intro || !footer) return;

  const show = () => gsap.to(el, { opacity: 1, pointerEvents: 'all', duration: 0.4, ease: 'power2.out' });
  const hide = () => gsap.to(el, { opacity: 0, pointerEvents: 'none', duration: 0.3, ease: 'power2.in' });

  // Appear when the bottom of .intro scrolls past the bottom of the viewport
  ScrollTrigger.create({
    trigger: intro,
    start: 'bottom bottom',
    onEnter: show,
    onLeaveBack: hide,
  });

  // Disappear when the footer enters the viewport
  ScrollTrigger.create({
    trigger: footer,
    start: 'top bottom',
    onEnter: hide,
    onLeaveBack: show,
  });
}
