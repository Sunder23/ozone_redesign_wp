import { gsap } from 'gsap';
import { SplitText } from 'gsap/SplitText';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(SplitText, ScrollTrigger);

export async function initHeroAnimation() {
  const title = document.querySelector('.hero__title');
  if (!title) return;

  await document.fonts.ready;

  const heroNav = document.querySelector('.hero__content .header__nav');
  const contactItems = document.querySelectorAll('.header_wrapper > *');
  const split = new SplitText(title, { type: 'lines', mask: 'lines' });
  title.style.opacity = 1;

  const tl = gsap.timeline({ defaults: { ease: 'power3.out', force3D: true } });

  if (contactItems.length) {
    gsap.set(contactItems, { opacity: 0, filter: 'blur(6px)' });
    tl.to(contactItems, {
      opacity: 1, filter: 'blur(0px)',
      duration: 1.1, stagger: 0.14, ease: 'power2.inOut',
      delay: 0.2,
    });
  }

  tl.from(split.lines,
    { opacity: 0, y: '100%', duration: 0.9, stagger: 0.12 },
    '-=0.2'
  );

  if (heroNav) {
    tl.from(heroNav,
      { opacity: 0, y: 16, duration: 0.6 },
      '-=0.4'
    );
  }

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
