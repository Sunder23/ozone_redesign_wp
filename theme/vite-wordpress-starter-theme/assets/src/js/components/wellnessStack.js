import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

export function initWellnessStack() {
  const section = document.querySelector('.wellness');
  if (!section) return;

  const slider = section.querySelector('.wellness__slider');
  if (!slider) return;

  const cards = gsap.utils.toArray('.wellness__slider__item');
  if (cards.length < 2) return;

  cards.forEach((card, i) => {
    gsap.set(card, { zIndex: i + 1 });
  });

  gsap.set(cards.slice(1), { yPercent: 100 });
  const SPEED_COEFFICIENT = 1.5;
  const tl = gsap.timeline({
    scrollTrigger: {
      trigger: slider,
      start: 'top-=30 top',
      end: () => `+=${(cards.length - 1) * window.innerHeight * SPEED_COEFFICIENT}`,
      pin: true,
      pinType: 'transform',
      pinSpacing: true,
      scrub: 0.5,
    },
  });

  cards.slice(1).forEach((card, i) => {
    tl.to(
      card,
      { yPercent: 0, duration: 1, ease: 'none' },
      i
    );
    tl.to(
      cards[i],
      { scale: 0.92, duration: 1, ease: 'none' },
      i
    );
  });
}
