import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import Lenis from 'lenis';

gsap.registerPlugin(ScrollTrigger);

// expo-out easing for a filmic stop
const carinaEaseExpoOut = (t) => (t === 1 ? 1 : 1 - Math.pow(2, -10 * t));

/**
 * Initialize Lenis with cinematic glide feel
 * - Slightly longer duration
 * - Expo-out easing
 * - Softer wheel multiplier for high-res devices
 * - GSAP ticker drives Lenis (single RAF source)
 */
export function carinaInitLenisCinematic() {
  const carinaLenis = new Lenis({
    duration: 1.35,
    easing: carinaEaseExpoOut,
    smooth: true,
    smoothWheel: true,
    wheelMultiplier: 0.85,
  });

  // keep ScrollTrigger in sync with Lenis
  carinaLenis.on("scroll", ScrollTrigger.update);

  // drive Lenis with GSAP's ticker to avoid double raf
  gsap.ticker.add((time) => {
    carinaLenis.raf(time * 1000);
  });
  gsap.ticker.lagSmoothing(0);

  return carinaLenis;
}

// init (if you really need to skip on about page, guard here)
const carinaLenis = carinaInitLenisCinematic();

// Smooth scroll for "scroll down" button on home page
document.addEventListener("DOMContentLoaded", function () {
  if (document.querySelector(".page-template-page-home")) {
    document.querySelector(".btn-scroll")?.addEventListener("click", function (e) {
      e.preventDefault();
      carinaLenis.scrollTo(window.scrollY + window.innerHeight, {
        duration: 0.6,
        // carina: linear is fine here; the global feel comes from Lenis' easing
        easing: (t) => t,
      });
    });
  }
});