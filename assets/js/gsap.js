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
document.addEventListener("DOMContentLoaded", () => {

  const isHome = !!document.querySelector(".page-template-page-home");

  if (isHome) {
    document.querySelector(".btn-scroll")?.addEventListener("click", (e) => {
      e.preventDefault();
      carinaLenis.scrollTo(window.scrollY + window.innerHeight, {
        duration: 0.6,
        // carina: linear here; global feel comes from Lenis easing
        easing: (t) => t,
      });
    });
  }
   // Fixed Booking Button
  const fixedButton = document.querySelector(".fixed-booking-button");
  if (fixedButton) {
    const triggerPosition = 40; // px from top
    let isVisible = false;

    // Prepare initial hidden state
    gsap.set(fixedButton, { autoAlpha: 0, y: 50 });

    // Listen to Lenis scroll on the instance
    carinaLenis.on("scroll", ({ scroll }) => {
      const shouldShow = scroll > triggerPosition;
      if (shouldShow === isVisible) return; // no-op if unchanged
      isVisible = shouldShow;

      gsap.to(fixedButton, {
        autoAlpha: shouldShow ? 1 : 0,
        y: shouldShow ? 0 : 50,
        duration: 0.6,
        overwrite: "auto",
      });
    });
  }
});


