(function () {
  const grid   = document.getElementById('blog-grid');
  const pager  = document.getElementById('blog-pager');
  const number = document.getElementById('blog-current');
  const section = document.getElementById('section-blog');
  if (!grid || !pager || !number || !section) return;

  const q = (sel, root = document) => root.querySelector(sel);

  const parsePageFromHref = (href) => {
    if (!href || href === '#' || href.includes('admin-ajax.php')) {
      return null;
    }
    
    try {
      const u = new URL(href, window.location.origin);
      const path = u.pathname;
      
      // Handle pretty permalinks: /geschichten/page/2/
      const prettyMatch = path.match(/\/page\/(\d+)\/?$/);
      if (prettyMatch) {
        return parseInt(prettyMatch[1], 10);
      }
      
      // Handle query parameter: ?paged=2
      const queryPage = u.searchParams.get('paged');
      if (queryPage) {
        return parseInt(queryPage, 10);
      }
      
      // If it's the base URL without /page/1/, it's page 1
      const basePath = new URL(CARINA_BLOG.baseUrl).pathname;
      if (path === basePath || path === basePath.replace(/\/$/, '') || path + '/' === basePath) {
        return 1;
      }
      
      return null;
    } catch { 
      return null; 
    }
  };

  const parsePageFromData = (btn) => {
    // First try data-page attribute
    if (btn.dataset.page) {
      const page = parseInt(btn.dataset.page, 10);
      if (!isNaN(page) && page > 0) return page;
    }
    
    // Fall back to parsing href
    return parsePageFromHref(btn.dataset.href) || 1;
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

  // Build pretty URL for any page number
  const buildPrettyUrl = (page) => {
    if (page === 1) {
      return CARINA_BLOG.baseUrl;
    } else {
      return CARINA_BLOG.pageBase + page + '/';
    }
  };

  // History priming
  const initialPage = parsePageFromHref(window.location.href) || 1;
  if (!history.state || typeof history.state.page === 'undefined') {
    history.replaceState({ page: initialPage }, '', buildPrettyUrl(initialPage));
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

        // Always use pretty URL for history
        const prettyUrl = buildPrettyUrl(p.current);
        history.pushState({ page: p.current }, '', prettyUrl);
        lastStatePage = p.current;

        return waitForImages(grid).then(scrollToIntroAfterLayout);
      })
      .catch((error) => {
        console.error('AJAX error:', error);
        // Fallback: navigate to the pretty URL
        const fallbackUrl = buildPrettyUrl(page);
        window.location.href = fallbackUrl;
      })
      .finally(() => {
        pager.classList.remove('opacity-50','pointer-events-none');
      });
  };

  // GLOBAL GUARD: cancel any click to admin-ajax and reroute to pretty URL via our AJAX
  document.addEventListener('click', (e) => {
    const a = e.target.closest('a');
    if (!a || !section.contains(a)) return;
    const href = a.getAttribute('href') || '';
    
    if (/admin-ajax\.php/i.test(href)) {
      e.preventDefault();
      e.stopPropagation();
      if (typeof e.stopImmediatePropagation === 'function') e.stopImmediatePropagation();

      const page = parsePageFromHref(href) || 1;
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

    const page = parsePageFromData(btn);
    if (page) {
      ajax(page);
    }
  }, { capture: true });

  // Back/Forward
  window.addEventListener('popstate', (e) => {
    const page = (e.state && typeof e.state.page !== 'undefined')
      ? parseInt(e.state.page, 10)
      : parsePageFromHref(window.location.href) || 1;
      
    if (!page || page === lastStatePage) return;
    lastStatePage = page;
    ajax(page);
  });
})();