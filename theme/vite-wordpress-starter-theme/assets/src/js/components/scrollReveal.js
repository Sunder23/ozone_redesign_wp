import { gsap } from 'gsap';
import { SplitText } from 'gsap/SplitText';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(SplitText, ScrollTrigger);

function revealOnScroll(el, vars = {}) {
  gsap.from(el, {
    opacity: 0,
    y: 40,
    duration: 0.85,
    ease: 'power3.out',
    scrollTrigger: {
      trigger: el,
      start: 'top 88%',
    },
    ...vars,
  });
}

export function initScrollReveal() {
  // ── intro__text: animate each paragraph ────────────────────────────────────
  const introParagraphs = document.querySelectorAll('.intro__text p');
  introParagraphs.forEach((p, i) => {
    revealOnScroll(p, { delay: i * 0.12 });
  });

  // ── promo-card__title h2: split into lines, stagger each ───────────────────
  const promoH2 = document.querySelector('.promo-card__title h2');
  if (promoH2) {
    const split = new SplitText(promoH2, { type: 'lines', mask: 'lines' });
    gsap.from(split.lines, {
      opacity: 0,
      y: '100%',
      duration: 0.9,
      ease: 'power3.out',
      stagger: 0.13,
      scrollTrigger: {
        trigger: promoH2,
        start: 'top 88%',
      },
    });
  }
}
