(function () {
  const grid    = document.getElementById('blog-grid');
  const pager   = document.getElementById('blog-pager');
  const number  = document.getElementById('blog-current');
  if (!grid || !pager || !number) return;

  // ---------- helpers ----------
  const q = (sel, root = document) => root.querySelector(sel);

  const parsePageFromUrl = (href) => {
    try {
      const u = new URL(href || window.location.href, window.location.href);
      const pretty = (u.pathname.match(/\/page\/(\d+)\/?$/) || [])[1];
      const query  = u.searchParams.get('paged');
      const n = parseInt(pretty || query || '1', 10);
      return Number.isFinite(n) && n > 0 ? n : 1;
    } catch {
      return 1;
    }
  };

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
      el.setAttribute('href', href || '#');
      el.dataset.page = '';
    }
  };

  const updatePagerFromPayload = (p) => {
    const prev = q('.pager-prev', pager);
    const next = q('.pager-next', pager);
    number.textContent = String(p.current);
    setLinkState(prev, p.has_prev, p.prev_url, p.current - 1);
    setLinkState(next, p.has_next, p.next_url, p.current + 1);
  };

  const getHeaderOffset = () => {
    const candidates = document.querySelectorAll('header[role="banner"], .site-header, .header, #site-header');
    let h = 0; candidates.forEach(el => { h = Math.max(h, el.offsetHeight || 0); });
    return h;
  };

  const smoothScrollToIntro = () => {
    const intro = document.querySelector('#section-intro, .section-intro');
    if (!intro) return;
    const y = Math.max(0, intro.getBoundingClientRect().top + window.scrollY - (getHeaderOffset() + 8));
    window.scrollTo({ top: y, behavior: 'smooth' });
  };

  // ---------- history priming (handles hard refresh) ----------
  const initialPage = parsePageFromUrl(window.location.href);
  if (!history.state || typeof history.state.page === 'undefined') {
    history.replaceState({ page: initialPage }, '', window.location.href);
  }
  let lastStatePage = history.state?.page || initialPage;

  // ---------- ajax loader ----------
  const ajax = (page) => {
    const fd = new FormData();
    fd.append('action', 'carina_load_posts');
    fd.append('nonce',  CARINA_BLOG.nonce);
    fd.append('page',   page);

    pager.classList.add('opacity-50','pointer-events-none');

    return fetch(CARINA_BLOG.ajax_url, { method: 'POST', body: fd })
      .then(r => r.json())
      .then(data => {
        if (!data || !data.success) throw new Error('Request failed');
        const p = data.data;

        grid.innerHTML = p.html;
        updatePagerFromPayload(p);

        const pretty = p.page_url || CARINA_BLOG.baseUrl;
        if (pretty) {
          history.pushState({ page: p.current }, '', pretty);
          lastStatePage = p.current;
        }

        smoothScrollToIntro();
      })
      .catch(() => {
        // hard fallback
        const a = pager.querySelector(`[data-page="${page}"]`);
        const href = a?.getAttribute('href');
        if (href) window.location.href = href;
      })
      .finally(() => {
        pager.classList.remove('opacity-50','pointer-events-none');
      });
  };

  // ---------- click handling ----------
  pager.addEventListener('click', (e) => {
    const a = e.target.closest('a[data-page]');
    if (!a) return;
    if (a.getAttribute('aria-disabled') === 'true') return;

    // prefer data-page; fall back to href parsing; default to 1
    let page = parseInt(a.dataset.page || '0', 10);
    if (!page) page = parsePageFromUrl(a.getAttribute('href') || '');
    if (!page) page = 1;

    e.preventDefault();
    ajax(page);
  });

  // ---------- browser back/forward ----------
  window.addEventListener('popstate', (e) => {
    // if state missing/empty, derive from current URL
    const page = (e.state && typeof e.state.page !== 'undefined')
      ? parseInt(e.state.page, 10)
      : parsePageFromUrl(window.location.href);

    if (!page || page === lastStatePage) return;
    lastStatePage = page;
    ajax(page);
  });
})();
