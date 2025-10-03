(function () {
  const grid   = document.getElementById('blog-grid');
  const pager  = document.getElementById('blog-pager');
  const number = document.getElementById('blog-current');
  const section = document.getElementById('section-blog');
  if (!grid || !pager || !number || !section) return;

  const q = (sel, root = document) => root.querySelector(sel);

  const parsePageFromHref = (href) => {
    try {
      const u = new URL(href || window.location.href, window.location.href);
      const pretty = (u.pathname.match(/\/page\/(\d+)\/?$/) || [])[1];
      const query  = u.searchParams.get('paged');
      const n = parseInt(pretty || query || '1', 10);
      return Number.isFinite(n) && n > 0 ? n : 1;
    } catch { return 1; }
  };

  const setBtnState = (btn, enabled, href, page) => {
    if (!btn) return;
    btn.dataset.href = href || '#';
    btn.dataset.page = enabled ? String(page || '') : '';
    if (enabled) {
      btn.classList.remove('opacity-30','pointer-events-none');
      btn.removeAttribute('aria-disabled');
      btn.removeAttribute('disabled');
      btn.setAttribute('tabindex','0');
    } else {
      btn.classList.add('opacity-30','pointer-events-none');
      btn.setAttribute('aria-disabled','true');
      btn.setAttribute('disabled','');
      btn.setAttribute('tabindex','-1');
    }
  };

  const updatePagerFromPayload = (p) => {
    const prev = q('.pager-prev', pager);
    const next = q('.pager-next', pager);
    number.textContent = String(p.current);
    setBtnState(prev, p.has_prev, p.prev_url, p.current - 1);
    setBtnState(next, p.has_next, p.next_url, p.current + 1);
  };

  const getHeaderOffset = () => {
    const candidates = document.querySelectorAll('header[role="banner"], .site-header, .header, #site-header');
    let h = 0; candidates.forEach(el => { h = Math.max(h, el.offsetHeight || 0); });
    return h;
  };

  const waitForImages = (root, timeout = 800) => new Promise((resolve) => {
    const imgs = [...root.querySelectorAll('img')].filter(img => !img.complete);
    if (!imgs.length) return requestAnimationFrame(() => resolve());
    let remaining = imgs.length, done = false;
    const finish = () => { if (!done) { done = true; resolve(); } };
    const t = setTimeout(finish, timeout);
    imgs.forEach(img => {
      const cb = () => { if (--remaining === 0) { clearTimeout(t); finish(); } };
      img.addEventListener('load', cb, { once: true });
      img.addEventListener('error', cb, { once: true });
    });
  });

  const scrollToIntroAfterLayout = () => {
    const intro = document.querySelector('#section-intro, .section-intro');
    if (!intro) return;
    const offset = getHeaderOffset() + 8;
    requestAnimationFrame(() => {
      requestAnimationFrame(() => {
        const y = Math.max(0, intro.getBoundingClientRect().top + window.scrollY - offset);
        window.scrollTo({ top: y, behavior: 'smooth' });
      });
    });
  };

  // History priming
  const initialPage = parsePageFromHref(window.location.href);
  if (!history.state || typeof history.state.page === 'undefined') {
    history.replaceState({ page: initialPage }, '', window.location.href);
  }
  if ((parseInt(number.textContent.trim() || '0',10) || 0) !== initialPage) {
    number.textContent = String(initialPage);
  }
  let lastStatePage = history.state?.page || initialPage;

  // AJAX loader
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

        return waitForImages(grid).then(scrollToIntroAfterLayout);
      })
      .catch(() => {
        // Hard fallback: navigate to the pretty URL we control
        const btn = pager.querySelector(`[data-page="${page}"]`);
        const href = btn?.dataset.href;
        if (href) window.location.href = href;
      })
      .finally(() => {
        pager.classList.remove('opacity-50','pointer-events-none');
      });
  };

  // GLOBAL GUARD 1: cancel any pointerdown that targets admin-ajax links
  document.addEventListener('pointerdown', (e) => {
    const a = e.target.closest('a');
    if (!a || !section.contains(a)) return;
    if (/admin-ajax\.php/i.test(a.getAttribute('href') || '')) {
      e.preventDefault();
      e.stopPropagation();
      if (typeof e.stopImmediatePropagation === 'function') e.stopImmediatePropagation();
    }
  }, { capture: true });

  // GLOBAL GUARD 2: cancel any click to admin-ajax and reroute to pretty URL via our AJAX
  document.addEventListener('click', (e) => {
    const a = e.target.closest('a');
    if (!a || !section.contains(a)) return;
    const href = a.getAttribute('href') || '';
    if (/admin-ajax\.php/i.test(href)) {
      e.preventDefault();
      e.stopPropagation();
      if (typeof e.stopImmediatePropagation === 'function') e.stopImmediatePropagation();

      const page = parsePageFromHref(href) || 1;
      history.pushState({ page }, '', page > 1 ? (CARINA_BLOG.pageBase + page + '/') : CARINA_BLOG.baseUrl);
      ajax(page);
    }
  }, { capture: true });

  // Our pager buttons
  pager.addEventListener('click', (e) => {
    const btn = e.target.closest('button.pager-prev, button.pager-next');
    if (!btn || !pager.contains(btn)) return;
    if (btn.getAttribute('aria-disabled') === 'true' || btn.hasAttribute('disabled')) return;

    e.preventDefault();
    e.stopPropagation();
    if (typeof e.stopImmediatePropagation === 'function') e.stopImmediatePropagation();

    let page = parseInt(btn.dataset.page || '0', 10);
    if (!page) page = parsePageFromHref(btn.dataset.href || '');
    if (!page) page = 1;

    ajax(page);
  }, { capture: true });

  // Back/Forward
  window.addEventListener('popstate', (e) => {
    const page = (e.state && typeof e.state.page !== 'undefined')
      ? parseInt(e.state.page, 10)
      : parsePageFromHref(window.location.href);
    if (!page || page === lastStatePage) return;
    lastStatePage = page;
    ajax(page);
  });
})();
