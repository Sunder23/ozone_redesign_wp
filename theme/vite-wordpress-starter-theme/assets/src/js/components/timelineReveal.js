import { gsap } from 'gsap';
import { SplitText } from 'gsap/SplitText';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(SplitText, ScrollTrigger);

export function initTimelineReveal() {
  const section = document.querySelector('.timeline');
  if (!section) return;

  const bg = section.querySelector('.timeline__bg');
  const h2 = section.querySelector('.timeline__inner > h2');
  const line = section.querySelector('.timeline__line');
  const nodes = section.querySelectorAll('.timeline__node');
  const leftItems = section.querySelectorAll('.timeline__col--left  .timeline__item');
  const rightItems = section.querySelectorAll('.timeline__col--right .timeline__item');
  const descP = section.querySelector('.timeline__desc p');
  const descImg = section.querySelector('.timeline__desc img');

  // ── initial states ──────────────────────────────────────────────────────────
  gsap.set(bg, { opacity: 0 });
  gsap.set(h2, { opacity: 0, y: 30 });
  gsap.set(line, { scaleY: 0, transformOrigin: 'top center' });
  gsap.set(nodes, { opacity: 0, scale: 0 });
  gsap.set(leftItems, { opacity: 0, x: -24 });
  gsap.set(rightItems, { opacity: 0, x: 24 });
  if (descP) gsap.set(descP, { opacity: 0 });
  if (descImg) gsap.set(descImg, { opacity: 0, y: 20 });

  // ── pre-entry: bg and h2 appear as section scrolls into view (before pin) ───
  gsap.to(bg, {
    opacity: 1,
    ease: 'none',
    scrollTrigger: {
      trigger: section,
      start: 'top 80%',
      end: 'top 20%',
      scrub: 1,
    },
  });

  gsap.to(h2, {
    opacity: 1,
    y: 0,
    ease: 'power2.out',
    scrollTrigger: {
      trigger: section,
      start: 'top 60%',
      end: 'top top',
      scrub: 1,
    },
  });

  // ── pinned scrub timeline ───────────────────────────────────────────────────
  const tl = gsap.timeline({
    scrollTrigger: {
      trigger: section,
      start: 'bottom bottom',
      end: `+=${section.offsetHeight * 2.5}`,
      scrub: 1,
      pin: true,
      pinSpacing: true,
    },
  });

  // 1. center line grows
  tl.to(line, { scaleY: 1, duration: 0.5, ease: 'power2.out' });

  // 2. nodes pop in one by one
  tl.to(nodes, {
    opacity: 1,
    scale: 1,
    duration: 0.3,
    ease: 'back.out(1.7)',
    stagger: 0.08,
  }, '-=0.2');

  // 3. left & right items slide in alternating (zip left/right)
  const maxItems = Math.max(leftItems.length, rightItems.length);
  for (let i = 0; i < maxItems; i++) {
    const offset = i === 0 ? '-=0.1' : '-=0.15';
    if (leftItems[i]) tl.to(leftItems[i], { opacity: 1, x: 0, duration: 0.3, ease: 'power3.out' }, offset);
    if (rightItems[i]) tl.to(rightItems[i], { opacity: 1, x: 0, duration: 0.3, ease: 'power3.out' }, '-=0.25');
  }

  // 4. desc paragraph — line by line
  if (descP) {
    const split = new SplitText(descP, { type: 'lines', mask: 'lines' });
    gsap.set(split.lines, { yPercent: 100 });
    tl.to(descP, { opacity: 1, duration: 0.01 }, '+=0.1');
    tl.to(split.lines, {
      yPercent: 0,
      duration: 0.25,
      ease: 'power3.out',
      stagger: 0.07,
    }, '-=0.01');
  }

  // 5. desc image
  if (descImg) {
    tl.to(descImg, { opacity: 1, y: 0, duration: 0.3, ease: 'power2.out' }, '-=0.1');
  }
}
