import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import Lenis from 'lenis';

// GSAP horizontal scroll effect (this will still run on the about page)
gsap.registerPlugin(ScrollTrigger);

// Initialize Lenis only if it's NOT the about page
const lenis = new Lenis({
	duration: 1.1,
	smooth: true,
	//easing: easeOutExpo(),
});

function raf(time) {
	lenis.raf(time);
	requestAnimationFrame(raf);
}
requestAnimationFrame(raf);

// GSAP ScrollTrigger integration with Lenis
lenis.on('scroll', ScrollTrigger.update);

gsap.ticker.add((time) => {
	lenis.raf(time * 1000);
});

gsap.ticker.lagSmoothing(0);

// Smooth scroll for scroll down button on home page
document.addEventListener('DOMContentLoaded', function () {
	if (document.querySelector(".page-template-page-home")) {
		document.querySelector('.btn-scroll')?.addEventListener('click', function (e) {
			e.preventDefault();
			lenis.scrollTo(window.scrollY + window.innerHeight, {
				duration: 0.5, 
				easing: (t) => t, 
			})
		});
	}
});