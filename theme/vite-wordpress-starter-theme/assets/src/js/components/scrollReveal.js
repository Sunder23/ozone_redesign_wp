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

function animateSectionTitle(el, triggerEl = el, start = 'top 88%') {
  const split = new SplitText(el, { type: 'lines', mask: 'lines' });
  gsap.from(split.lines, {
    opacity: 0,
    y: '100%',
    duration: 0.9,
    ease: 'power3.out',
    stagger: 0.13,
    scrollTrigger: {
      trigger: triggerEl,
      start,
    },
  });
}

// All section h2s get this animation except .hero, .timeline, .enjoy, and .wellness (handled separately)
const SECTION_TITLE_SELECTORS = [
  '.promo-card__title h2',
  '.formats__header h2',
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

  // ── enjoy h2: trigger from section root so pin-scroll is accounted for ─────
  const enjoyTitle = document.querySelector('.enjoy h2');
  if (enjoyTitle) {
    animateSectionTitle(enjoyTitle, '.enjoy', 'top 60%');
  }

  // ── enjoy__bg: parallax zoom on scroll ────────────────────────────────────
  const enjoyBg = document.querySelector('.enjoy__bg');
  if (enjoyBg) {
    gsap.fromTo(enjoyBg,
      { scale: 1 },
      {
        scale: 1.12,
        ease: 'none',
        scrollTrigger: {
          trigger: '.enjoy',
          start: 'top bottom',
          end: 'bottom top',
          scrub: true,
        },
      }
    );
  }

  // ── wellness header: title → button sequence ──────────────────────────────
  const wellnessTitle = document.querySelector('.wellness__header h2');
  const wellnessBtn = document.querySelector('.wellness__header .btn--primary');
  if (wellnessTitle) {
    const split = new SplitText(wellnessTitle, { type: 'lines', mask: 'lines' });
    const tl = gsap.timeline({
      scrollTrigger: { trigger: '.wellness__header', start: 'top 88%' },
    });
    tl.from(split.lines, {
      opacity: 0,
      y: '100%',
      duration: 0.9,
      ease: 'power3.out',
      stagger: 0.13,
    });
    if (wellnessBtn) {
      gsap.set(wellnessBtn, { opacity: 0, y: 16 });
      tl.to(wellnessBtn, {
        opacity: 1,
        y: 0,
        duration: 0.6,
        ease: 'power3.out',
      }, '-=0.15');
    }
  }

  // ── promo-card features: staggered reveal ──────────────────────────────────
  const promoFeatures = document.querySelectorAll('.promo-card__feature');
  if (promoFeatures.length) {
    const trigger = promoFeatures[0].closest('.promo-card__features') || promoFeatures[0];
    gsap.from(promoFeatures, {
      opacity: 0,
      y: 30,
      duration: 0.85,
      ease: 'power3.out',
      stagger: 0.12,
      scrollTrigger: {
        trigger,
        start: 'top 88%',
      },
    });
  }

  // ── formats cards: staggered reveal ───────────────────────────────────────
  const formatCards = document.querySelectorAll('.formats__cards .format-card');
  if (formatCards.length) {
    gsap.from(formatCards, {
      opacity: 0,
      y: 40,
      duration: 0.85,
      ease: 'power3.out',
      stagger: 0.12,
      scrollTrigger: {
        trigger: '.formats__cards',
        start: 'top 88%',
      },
    });
  }
}
