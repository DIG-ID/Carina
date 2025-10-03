(function () {
  const grid    = document.getElementById('blog-grid');
  const pager   = document.getElementById('blog-pager');
  const number  = document.getElementById('blog-current');
  const section = document.getElementById('section-blog');
  if (!grid || !pager || !number) return;

  const setLinkState = (el, enabled, href, page) => {
    if (!el) return;
    if (enabled) {
      el.classList.remove('opacity-30','pointer-events-none');
      el.setAttribute('aria-disabled', 'false');
      el.setAttribute('tabindex', '0');
      el.setAttribute('href', href || '#');
      el.dataset.page = String(page || '');
    } else {
      el.classList.add('opacity-30','pointer-events-none');
      el.setAttribute('aria-disabled', 'true');
      el.setAttribute('tabindex', '-1');
      el.setAttribute('href', '#');
      el.dataset.page = '';
    }
  };

  const ajax = (page) => {
    const fd = new FormData();
    fd.append('action', 'carina_load_posts');
    fd.append('nonce', CARINA_BLOG.nonce);
    fd.append('page', page);

    pager.classList.add('opacity-50','pointer-events-none');

    return fetch(CARINA_BLOG.ajax_url, { method: 'POST', body: fd })
      .then(r => r.json())
      .then(data => {
        if (!data || !data.success) throw new Error('Request failed');
        const p = data.data;

        // Swap cards
        grid.innerHTML = p.html;
        number.textContent = p.current;

        // Toggle links
        const prev = pager.querySelector('.pager-prev');
        const next = pager.querySelector('.pager-next');
        setLinkState(prev, p.has_prev, p.prev_url, p.current - 1);
        setLinkState(next, p.has_next, p.next_url, p.current + 1);

        // Update the address bar (pretty URL)
        const url = p.page_url || CARINA_BLOG.baseUrl;
        if (url) window.history.pushState({ page: p.current }, '', url);

        // Scroll back to the section top for a stable UX
        if (section && section.scrollIntoView) {
          section.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      })
      .catch(() => {
        // Fallback to normal navigation if AJAX fails
        const a = pager.querySelector(`[data-page="${page}"]`);
        if (a && a.getAttribute('href')) window.location.href = a.getAttribute('href');
      })
      .finally(() => {
        pager.classList.remove('opacity-50','pointer-events-none');
      });
  };

  // Intercept clicks (ignore disabled)
  pager.addEventListener('click', (e) => {
    const a = e.target.closest('a[data-page]');
    if (!a) return;
    if (a.getAttribute('aria-disabled') === 'true') return;
    const page = parseInt(a.dataset.page || '0', 10);
    if (!page) return;
    e.preventDefault();
    ajax(page);
  });

  // Browser back/forward
  window.addEventListener('popstate', (e) => {
    const page = e.state?.page ? parseInt(e.state.page, 10) : 1;
    ajax(page);
  });
})();
