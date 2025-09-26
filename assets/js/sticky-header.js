// resources/js/features/carina-sticky-header.js
// -----------------------------------------------------------
// carina: Sticky header body class toggler (direction + threshold)
// - Vanilla JS, rAF-throttled, passive listeners
// - Self-contained: no external options, auto-inits on import
// - Plays nice with Lenis if present; robust on refresh mid-page & bfcache
// - WordPress theme prefix: "carina"
// -----------------------------------------------------------


(function carinaStickyHeaderIIFE() {
  if (window.__carinaStickyHeaderInit) return;
  window.__carinaStickyHeaderInit = true;

  const cfg = {
    headerSelector: ".header-main",
    threshold: null,     // header height fallback
    dirDelta: 4,
    topEpsilon: 1,
    footerSelector: ".footer-main",
    footerTriggerMargin: 48, // px before footer enters view to start hiding
  };

  const body = document.body;
  if (!body) return;

  const header = document.querySelector(cfg.headerSelector);
  const footer = document.querySelector(cfg.footerSelector);

  // --- Threshold (avoid mixing ?? with ||) ---------------------------------
  let dynamicThreshold = Number.isFinite(cfg.threshold)
    ? Number(cfg.threshold)
    : ((header && header.getBoundingClientRect().height) || 64);

  // State
  let lastY = 0;
  let lastDir = 0; // -1 up, +1 down
  let ticking = false;

  // Footer fallback state (when no IO support)
  let footerTopAbs = null;
  let useFooterFallback = false;

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
    if (!Number.isFinite(cfg.threshold)) {
      const h = header && header.getBoundingClientRect().height;
      if (h && h > 0) dynamicThreshold = h;
    }
    // Recompute footer absolute top if using fallback
    if (useFooterFallback && footer) {
      const rect = footer.getBoundingClientRect();
      footerTopAbs = (window.pageYOffset || 0) + rect.top;
    }
  }

  // --- Footer observer (prefer IO, fall back if unsupported) ---------------
  if (footer && "IntersectionObserver" in window) {
    // When any part of the footer is visible (with an early trigger margin),
    // toggle carina-at-footer
    const io = new IntersectionObserver(
      (entries) => {
        const near = entries.some((e) => e.isIntersecting);
        body.classList.toggle("at-footer", near);
      },
      {
        root: null,
        threshold: 0,
        // Start "near footer" a bit earlier so the header hides before overlapping
        rootMargin: `0px 0px -${cfg.footerTriggerMargin}px 0px`,
      }
    );
    io.observe(footer);
  } else if (footer) {
    // Fallback: compute based on scroll position
    useFooterFallback = true;
    const rect = footer.getBoundingClientRect();
    footerTopAbs = (window.pageYOffset || 0) + rect.top;
  }

  function carinaUpdate(yRaw) {
    const y =
      Number.isFinite(yRaw) ? clampY(yRaw) :
      clampY(window.scrollY || window.pageYOffset || 0);

    carinaApplyState(y);
    carinaApplyDirection(y);

    // Footer fallback: set carina-at-footer when viewport bottom reaches footer
    if (useFooterFallback && footerTopAbs != null) {
      const viewBottom =
        y + (window.innerHeight || document.documentElement.clientHeight || 0);
      const near = viewBottom >= (footerTopAbs - cfg.footerTriggerMargin);
      body.classList.toggle("at-footer", !!near);
    }

    ticking = false;
  }

  function carinaOnScroll(yFromAdapter) {
    if (!ticking) {
      ticking = true;
      window.requestAnimationFrame(() => carinaUpdate(yFromAdapter));
    }
  }

  // Initial
  carinaMeasure();
  carinaUpdate();

  // Native scroll
  window.addEventListener("scroll", () => carinaOnScroll(), { passive: true });

  // Resize/layout changes
  window.addEventListener("resize", () => { carinaMeasure(); carinaOnScroll(); }, { passive: true });

  // bfcache restore
  window.addEventListener("pageshow", (e) => {
    if (e.persisted) {
      carinaMeasure();
      carinaOnScroll();
    }
  }, { passive: true });

  // Lenis integration (optional)
  if (window.lenis && typeof window.lenis.on === "function") {
    window.lenis.on("scroll", ({ scroll }) => carinaOnScroll(scroll));
  }

  // Manual refresh if needed
  window.carinaStickyHeaderRefresh = function () {
    carinaMeasure();
    carinaOnScroll();
  };
})();
