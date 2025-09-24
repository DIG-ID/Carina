// menu toggle syncing classes on button, body and html
window.addEventListener("load", () => {
  const btn = document.querySelector(".menu-toggle__button");
  if (!btn) return;

  // elements that should reflect menu open state
  const targets = [document.body, document.documentElement]; // body + html

  // initial a11y state
  btn.setAttribute("aria-expanded", "false");

  const carinaOnMenuToggle = () => {
    // toggle button visual state
    btn.classList.toggle("menu-open");
    const isOpen = btn.classList.contains("menu-open");

    // sync classes on targets
    targets.forEach((el) => {
      el.classList.toggle("menu-open", isOpen);
    });

    // update a11y attribute
    btn.setAttribute("aria-expanded", isOpen ? "true" : "false");

    // optional — lock page scroll when menu is open
    // If you use Lenis, this plays nice with its recommended CSS.
    document.documentElement.classList.toggle("lenis", true);          // keep lenis class present
    document.documentElement.classList.toggle("lenis-stopped", isOpen); // stop scroll when menu open
  };

  btn.addEventListener("click", carinaOnMenuToggle);

  // optional — close on ESC and on outside click
  const carinaCloseMenu = () => {
    if (!btn.classList.contains("menu-open")) return;
    btn.classList.remove("menu-open");
    btn.setAttribute("aria-expanded", "false");
    targets.forEach((el) => el.classList.remove("menu-open"));
    document.documentElement.classList.remove("lenis-stopped");
  };

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") carinaCloseMenu();
  });

  document.addEventListener("click", (e) => {
    const isClickInside = e.target.closest(".menu-toggle__button") || e.target.closest(".menu-offcanvas");
    if (!isClickInside) carinaCloseMenu();
  });
});
