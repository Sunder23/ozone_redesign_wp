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

function animateSectionTitle(el) {
  const split = new SplitText(el, { type: 'lines', mask: 'lines' });
  gsap.from(split.lines, {
    opacity: 0,
    y: '100%',
    duration: 0.9,
    ease: 'power3.out',
    stagger: 0.13,
    scrollTrigger: {
      trigger: el,
      start: 'top 88%',
    },
  });
}

// All section h2s get this animation except .hero and .timeline (has its own scrub animation)
const SECTION_TITLE_SELECTORS = [
  '.promo-card__title h2',
  '.formats__header h2',
  '.enjoy h2',
  '.wellness__header h2',
  '.tech__header h2',
  '.floorplan__header h2',
  '.gallery__header h2',
];

export function initScrollReveal() {
  // ── intro__text: animate each paragraph ────────────────────────────────────
  const introParagraphs = document.querySelectorAll('.intro__text p');
  introParagraphs.forEach((p, i) => {
    revealOnScroll(p, { delay: i * 0.12 });
  });

  // ── section titles: SplitText lines reveal (shared animation) ──────────────
  SECTION_TITLE_SELECTORS.forEach(selector => {
    const el = document.querySelector(selector);
    if (el) animateSectionTitle(el);
  });
}
