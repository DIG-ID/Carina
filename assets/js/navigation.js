// resources/js/menu-offcanvas.js
// -----------------------------------------------------------
// GSAP off-canvas mega menu animation (open/reverse-close)
// Requires: gsap (v3)
// -----------------------------------------------------------
import gsap from "gsap";

// Optional: avoid conflicts when toggling quickly
gsap.defaults({ overwrite: "auto" });

export function carinaInitOffcanvasMenuGsap() {
  // trigger and wrapper
  const btn = document.querySelector(".menu-toggle__button");
  const wrap = document.querySelector(".menu-offcanvas"); // allow both
  if (!btn || !wrap) return;

  // columns of the mega menu (preferred via data attribute)
  let cols = gsap.utils.toArray(wrap.querySelectorAll("[data-menu-col]"));
  // fallback if data attribute not present
  if (!cols.length) {
    // Note: Tailwind variant classes like "lg:col-span-4" need escaping in CSS, so we target the safe part.
    cols = gsap.utils.toArray(wrap.querySelectorAll('[class*="col-span-"]'));
  }

  const targets = [document.body, document.documentElement];
  const prefersReduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  const polygonStart = "polygon(30% 0, 70% 0, 100% 0, 0 0)"; // initial clip-path (matches CSS)
  const polygonMid = "polygon(0 100%, 70% 0, 100% 0, 0 0)"; // intermediate clip-path (bottom-left corner down)
  const polygonEnd = "polygon(0 100%, 100% 100%, 100% 0, 0 0)"; // final clip-path (fully open)

  // initial states
  gsap.set(wrap, {
    // keep same coordinate system as CSS translateY(-100%)
    x: 0, y: 0, xPercent: 0, yPercent: -100, // <- match CSS
    clipPath: polygonStart,
    webkitClipPath: polygonStart,
    willChange: "transform, clip-path",
    force3D: true,
  });
  gsap.set(cols, { autoAlpha: 0, y: -20 });
  cols.forEach((col) => gsap.set(col.querySelectorAll("li"), { autoAlpha: 0, y: -10 }));

  // master timeline (paused). Reverse will play the closing sequence (items out -> wrapper out)
  const tl = gsap.timeline({
    paused: true,
    defaults: { ease: "power2.out" },
    onReverseComplete() {
      // unlock lenis scroll when fully closed
      document.documentElement.classList.remove("lenis-stopped");
      // reset wrapper precisely to hidden CSS state
      gsap.set(wrap, {
        yPercent: -100,
        clipPath: polygonStart,
        webkitClipPath: polygonStart
      });
    }
  });

  // --- labels para controlar a orquestração ---
  tl.addLabel("carinaWrapStart", 0);

  // 1) WRAPPER: slide + morph em 3 fases, com overlap ligeiro
  tl.to(wrap, { yPercent: 0, duration: 0.32, ease: "power4.inOut" },"carinaWrapStart" )
    .to(wrap, {
      // 3 fases: start -> mid -> end (mesmo nº de pontos, mesma ordem)
      keyframes: [
        {
          clipPath: polygonMid,
          webkitClipPath: polygonMid,
          duration: 0.20,
          ease: "power2.in"
        },
        {
          clipPath: polygonEnd,
          webkitClipPath: polygonEnd,
          duration: 0.22,
          ease: "power3.out"
        }
      ]
      // começa um pouco antes do slide terminar para um efeito mais "buttery"
    }, "carinaWrapStart+=0.10"); 

  // 2) COLUNAS: todas de uma vez com stagger curto (não por forEach)
  tl.fromTo(
    cols,
    { autoAlpha: 0, y: -20 },
    { autoAlpha: 1, y: 0, duration: 0.4, stagger: 0.06, ease: "power2.out", immediateRender: false },
    "carinaWrapStart+=0.40" // entra quase a seguir ao início do morph
  );

  // 3) ITENS: todos os <li> (flatten) com stagger global curtinho
  const carinaAllItems = cols.flatMap(col => Array.from(col.querySelectorAll("li")));
  if (carinaAllItems.length) {
    tl.fromTo(
      carinaAllItems,
      { autoAlpha: 0, y: -8 },
      { autoAlpha: 1, y: 0, duration: 0.3, stagger: { each: 0.06, from: 0 }, ease: "power2.out", immediateRender: false },
      "carinaWrapStart+=0.30" // quase simultâneo com colunas
    );
  }

  // helpers to open/close with classes + GSAP play/reverse
  const carinaPlayOpen = () => {
    btn.classList.add("menu-open");
    btn.setAttribute("aria-expanded", "true");
    targets.forEach((el) => el.classList.add("menu-open"));
    //document.documentElement.classList.add("lenis", "lenis-stopped"); // keep lenis class present and stop scroll while open
    // no animation for reduced motion
    if (prefersReduced) {
      gsap.set(wrap, { yPercent: 0, clipPath: polygonEnd, webkitClipPath: polygonEnd });
      return;
    }
    tl.timeScale(1).play(0);
  };

  const carinaPlayClose = () => {
    // close only if currently open
    if (!btn.classList.contains("menu-open")) return;
    btn.classList.remove("menu-open");
    btn.setAttribute("aria-expanded", "false");
    targets.forEach((el) => el.classList.remove("menu-open"));

    if (prefersReduced) {
      // snap back instantly when reduced motion is on
      //document.documentElement.classList.remove("lenis-stopped");
      gsap.set(wrap, { yPercent: -100, clipPath: polygonStart, webkitClipPath: polygonStart });
      return;
    }
    tl.timeScale(1.1).reverse(); // slightly faster on close feels snappier
  };

  // click toggle
  btn.addEventListener("click", () => {
    const isOpen = btn.classList.contains("menu-open");
    isOpen ? carinaPlayClose() : carinaPlayOpen();
  });

  // ESC to close
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") carinaPlayClose();
  });

  // outside click to close
  document.addEventListener("click", (e) => {
    const inside = e.target.closest(".menu-toggle__button") || e.target.closest(".menu-offcanvas");
    if (!inside) carinaPlayClose();
  });

  // close when clicking any menu link
  wrap.addEventListener("click", (e) => {
    if (e.target.closest("a")) carinaPlayClose();
  });
}

// boot
document.addEventListener("DOMContentLoaded", carinaInitOffcanvasMenuGsap);
