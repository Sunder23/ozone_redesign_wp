import { gsap } from 'gsap';
import { SplitText } from 'gsap/SplitText';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(SplitText, ScrollTrigger);

export function initHeroAnimation() {
  const title = document.querySelector('.hero__title');
  if (!title) return;

  const split = new SplitText(title, { type: 'lines', mask: 'lines' });

  gsap.from(split.lines, {
    opacity: 0,
    y: '100%',
    duration: 0.9,
    ease: 'power3.out',
    stagger: 0.12,
    delay: 0.2,
    force3D: true,
    // onComplete: () => {
    //   split.revert();
    // }
  });

  const heroBg = document.querySelector('.hero__bg img');
  if (heroBg) {
    gsap.to(heroBg, {
      yPercent: -15,
      ease: 'none',
      scrollTrigger: {
        trigger: '.hero',
        start: 'top top',
        end: 'bottom top',
        scrub: true,
      },
    });
  }
}
