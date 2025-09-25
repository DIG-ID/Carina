// resources/js/features/carina-sticky-header.js
// -----------------------------------------------------------
// carina: Sticky header body class toggler (direction + threshold)
// - Vanilla JS, rAF-throttled, passive listeners
// - Self-contained: no external options, auto-inits on import
// - Plays nice with Lenis if present; robust on refresh mid-page & bfcache
// - WordPress theme prefix: "carina"
// -----------------------------------------------------------

/* global window, document */

(function carinaStickyHeaderIIFE() {
  // Avoid double init if imported twice
  if (window.__carinaStickyHeaderInit) return;
  window.__carinaStickyHeaderInit = true;

  // --- Internal config (no external options) ------------------------------
  // If headerSelector is not found, we still operate using scrollY.
  const cfg = {
    headerSelector: ".header-main",
    // If null => use header height or fallback to 64px
    threshold: null,
    dirDelta: 4,     // min delta (px) to flip direction state
    topEpsilon: 1,   // hysteresis to stabilize "at top"
  };

  const body = document.body;
  if (!body) return;

  const header = document.querySelector(cfg.headerSelector);

  // Resolve threshold initially
  // Não misturar ?? com ||. Mantém a mesma semântica do teu código.
  let dynamicThreshold = Number.isFinite(cfg.threshold)
    ? Number(cfg.threshold)
    : ((header && header.getBoundingClientRect().height) || 64);

  // State
  let lastY = 0;
  let lastDir = 0; // -1 up, +1 down, 0 unknown
  let ticking = false;

  // Helpers
  const clampY = (y) => Math.max(0, y | 0);

  function carinaApplyState(y) {
    const atTop = y <= cfg.topEpsilon;
    const beyond = y > dynamicThreshold;

    body.classList.toggle("at-top", atTop);
    body.classList.toggle("is-scrolled", beyond || (!atTop && y > 0));
  }

  function carinaApplyDirection(y) {
    const dy = y - lastY;
    if (Math.abs(dy) <= cfg.dirDelta) return;
    const dir = dy > 0 ? 1 : -1;
    if (dir !== lastDir) {
      lastDir = dir;
      body.classList.toggle("scroll-dir-down", dir === 1);
      body.classList.toggle("scroll-dir-up", dir === -1);
    }
    lastY = y;
  }

  function carinaMeasure() {
    // Recalculate threshold when header changes size (responsive)
    if (!Number.isFinite(cfg.threshold)) {
      const h = header && header.getBoundingClientRect().height;
      if (h && h > 0) dynamicThreshold = h;
    }
  }

  function carinaUpdate(yRaw) {
    const y =
      Number.isFinite(yRaw) ? clampY(yRaw) :
      clampY(window.scrollY || window.pageYOffset || 0);

    carinaApplyState(y);
    carinaApplyDirection(y);
    ticking = false;
  }

  function carinaOnScroll(yFromAdapter) {
    if (!ticking) {
      ticking = true;
      window.requestAnimationFrame(() => carinaUpdate(yFromAdapter));
    }
  }

  // Initial run (handles refresh mid-page)
  carinaMeasure();
  carinaUpdate();

  // Window scroll fallback
  const onWinScroll = () => carinaOnScroll();
  window.addEventListener("scroll", onWinScroll, { passive: true });

  // Resize => header height may change
  const onResize = () => {
    carinaMeasure();
    carinaOnScroll();
  };
  window.addEventListener("resize", onResize, { passive: true });

  // bfcache restore (Safari/Firefox)
  window.addEventListener(
    "pageshow",
    (e) => {
      if (e.persisted) {
        carinaMeasure();
        carinaOnScroll();
      }
    },
    { passive: true }
  );

  // Lenis integration if present
  if (window.lenis && typeof window.lenis.on === "function") {
    window.lenis.on("scroll", ({ scroll }) => {
      carinaOnScroll(scroll);
    });
  }

  // Public refresh, in case you inject content dynamically
  window.carinaStickyHeaderRefresh = function () {
    carinaMeasure();
    carinaOnScroll();
  };
})();
