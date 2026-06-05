import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

export function initWellnessStack() {
  const section = document.querySelector('.wellness');
  if (!section) return;

  const cards = gsap.utils.toArray('.wellness__slider__item');
  if (cards.length < 2) return;

  cards.forEach((card, i) => {
    gsap.set(card, { zIndex: i + 1 });
  });


  gsap.set(cards.slice(1), { yPercent: 100 });
  const SPEED_COEFFICIENT = 2;
  const tl = gsap.timeline({
    scrollTrigger: {
      trigger: section,
      start: 'top top',
      end: () => `+=${(cards.length - 1) * window.innerHeight * SPEED_COEFFICIENT}`,
      pin: true,
      pinType: 'transform',
      pinSpacing: true,
      scrub: 1,
    },
  });

  cards.slice(1).forEach((card, i) => {
    tl.to(
      card,
      { yPercent: 0, duration: 1, ease: 'power2.inOut' },
      i
    );
    tl.to(
      cards[i],
      { scale: 0.92, duration: 1, ease: 'power2.inOut' },
      i
    );
  });
}
