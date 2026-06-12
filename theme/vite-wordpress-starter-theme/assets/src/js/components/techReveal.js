import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

export function initTechReveal() {
  const section = document.querySelector('.tech');
  const titleLines = gsap.utils.toArray('.tech__title-line');
  const titleOverlay = document.querySelector('.tech__title-overlay');
  const leftCol = document.querySelector('.tech__col--left');
  const middleCol = document.querySelector('.tech__col--middle');
  const rightCol = document.querySelector('.tech__col--right');
  const grid = document.querySelector('.tech__grid');

  if (!grid) return;

  const isMobile = window.matchMedia('(max-width: 767px)').matches;

  if (isMobile || !titleLines.length || !leftCol || !middleCol || !rightCol) {
    const cols = [leftCol, middleCol, rightCol].filter(Boolean);
    if (cols.length) {
      gsap.set(cols, { opacity: 0, y: 30 });
      gsap.to(cols, {
        opacity: 1,
        y: 0,
        duration: 0.7,
        ease: 'power3.out',
        scrollTrigger: { trigger: grid, start: 'top 80%' },
      });
    }
    return;
  }

  gsap.set([leftCol, rightCol], { opacity: 0, y: -50 });
  gsap.set(middleCol, { opacity: 0, y: 50 });

  const bgImg = document.querySelector('.tech__bg img');
  if (bgImg) {
    gsap.fromTo(bgImg,
      { yPercent: -5, scale: 1.12 },
      {
        yPercent: 5,
        scale: 1,
        ease: 'none',
        scrollTrigger: {
          trigger: section,
          start: 'top bottom',
          end: 'top top',
          scrub: true,
        },
      }
    );
  }

  const tl = gsap.timeline({
    scrollTrigger: {
      trigger: section,
      start: 'top top',
      end: `+=${section.offsetHeight * 3}`,
      scrub: 1,
      pin: true,
      pinSpacing: true,
    },
  });

  // phase 1: lines slide out — odd lines left, even lines right
  tl.to(titleLines, {
    xPercent: (i) => i % 2 === 0 ? -110 : 110,
    ease: 'power2.inOut',
    duration: 0.5,
  });

  // overlay fades out as lines leave
  if (titleOverlay) {
    tl.to(titleOverlay, {
      opacity: 0,
      ease: 'power2.out',
      duration: 0.3,
    }, '-=0.15');
  }

  // phase 2: cols appear
  tl.to(
    [leftCol, middleCol, rightCol],
    { opacity: 1, y: 0, ease: 'power2.out', duration: 0.5 },
    '-=0.05'
  );
}
