// All comments in English
import gsap from "gsap";

export function carinaInitAccordionsSingleGsapSeq() {
  const reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  document.querySelectorAll('[data-accordion="single"]').forEach((group) => {
    let locked = false; // prevent overlapping sequences

    // Init panels
    group.querySelectorAll("details").forEach((d) => {
      const panel = d.querySelector("[data-accordion-panel]");
      if (!panel) return;
      gsap.set(panel, { height: d.open ? "auto" : 0, opacity: d.open ? 1 : 0 });
      const summary = d.querySelector("summary");
      if (!summary) return;

      summary.addEventListener("click", async (e) => {
        // Disable native instant toggle so we can animate in sequence
        e.preventDefault();
        if (locked) return;
        locked = true;

        try {
          const currentOpen = group.querySelector("details[open]");
          // If clicking the same open item => just close it
          if (currentOpen === d) {
            await closeDetails(currentOpen);
            locked = false;
            return;
          }

          // 1) Close current (if any)
          if (currentOpen) {
            await closeDetails(currentOpen);
          }

          // 2) Open target
          await openDetails(d);
        } finally {
          locked = false;
        }
      });
    });

    // ---- helpers (return Promises for clean sequencing) ----
    function closeDetails(detailsEl) {
      const panel = detailsEl.querySelector("[data-accordion-panel]");
      if (!panel) {
        detailsEl.open = false;
        return Promise.resolve();
      }
      gsap.killTweensOf(panel);

      if (reduce) {
        gsap.set(panel, { height: 0, opacity: 0 });
        detailsEl.open = false;
        return Promise.resolve();
      }

      return new Promise((resolve) => {
        gsap.to(panel, {
          height: 0,
          opacity: 0,
          duration: 0.6,
          ease: "power3.inOut",
          onComplete: () => {
            detailsEl.open = false; // remove open only after animation finishes
            resolve();
          },
        });
      });
    }

    function openDetails(detailsEl) {
      const panel = detailsEl.querySelector("[data-accordion-panel]");
      if (!panel) {
        detailsEl.open = true;
        return Promise.resolve();
      }
      gsap.killTweensOf(panel);

      // Set open before animating so a11y/state is correct; we are already after close.
      detailsEl.open = true;

      if (reduce) {
        gsap.set(panel, { height: "auto", opacity: 1 });
        return Promise.resolve();
      }

      // Animate from 0 to auto
      const startH = panel.offsetHeight || 0; // 0 when closed
      return new Promise((resolve) => {
        gsap.fromTo(
          panel,
          { height: startH, opacity: 0.001 },
          {
            height: "auto",
            opacity: 1,
            duration: 0.7,
            ease: "power3.inOut",
            onComplete: resolve,
          }
        );
      });
    }
  });
}

document.addEventListener("DOMContentLoaded", carinaInitAccordionsSingleGsapSeq);