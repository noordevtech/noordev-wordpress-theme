/* ============================================================================
   NOORDEV · Sticky primary nav + Services mega menu
   Markup is injected; visual styles live in /assets/css/mega-menu.css.

   Optional config:
     window.NOORDEV.homeUrl  — brand-link URL (defaults to "/")
     <script id="noordev-nav-config" data-active="services|odoo|security|...">
       data-active : key of the active top-level link
       data-cta    : CTA button label
       data-cta-href : CTA button href
   ============================================================================ */
(function () {
  var ND = (window.NOORDEV = window.NOORDEV || {});
  var configEl = document.getElementById('noordev-nav-config');
  var ds = (configEl && configEl.dataset) || {};

  var homeUrl = ND.homeUrl || '/';
  var active  = ds.active  || ND.active  || '';
  var cta     = ds.cta     || ND.cta     || 'Book a call';
  var ctaHref = ds.ctaHref || ND.ctaHref || '#cta';

  // ---- Icons -------------------------------------------------------------
  var icons = {
    brand:      '<svg viewBox="0 0 24 24"><path d="M4 20 L4 9 L12 3 L20 9 L20 20 Z"/><path d="M10 20 V14 H14 V20"/></svg>',
    marketing:  '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M3 12 H21 M12 3 C15 6 15 18 12 21 C9 18 9 6 12 3"/></svg>',
    odoo:       '<svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="M3 9 H21 M9 14 H15"/></svg>',
    web:        '<svg viewBox="0 0 24 24"><path d="M4 17 L10 11 L14 15 L20 7"/><path d="M14 7 H20 V13"/></svg>',
    security:   '<svg viewBox="0 0 24 24"><path d="M12 3 L20 6 V12 C20 17 16 20 12 21 C8 20 4 17 4 12 V6 Z"/><path d="M9 12 L11 14 L15 10"/></svg>',
    iso:        '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="8"/><path d="M8 12 L11 15 L16 9"/></svg>',
    training:   '<svg viewBox="0 0 24 24"><path d="M3 8 L12 4 L21 8 L12 12 Z"/><path d="M7 10 V16 C7 17 9 18 12 18 C15 18 17 17 17 16 V10"/></svg>',
    advisory:   '<svg viewBox="0 0 24 24"><path d="M4 6 H20 M4 12 H20 M4 18 H14"/><circle cx="18" cy="18" r="2"/></svg>',
    ciso:       '<svg viewBox="0 0 24 24"><path d="M12 4 V20 M4 12 H20"/><circle cx="12" cy="12" r="8"/></svg>'
  };

  var svcCard = function (num, cat, title, desc, tag, href, iconKey, tagClass) {
    return ''
      + '<a href="' + href + '" class="nd-svc">'
      +   '<span class="nd-svc__icon">' + icons[iconKey] + '</span>'
      +   '<div>'
      +     '<span class="nd-svc__num">' + num + ' &middot; ' + cat + '</span>'
      +     '<h4 class="nd-svc__title">' + title + ' <span class="nd-svc__arrow">&rarr;</span></h4>'
      +     '<p class="nd-svc__desc">' + desc + '</p>'
      +     '<span class="nd-svc__tag ' + (tagClass || '') + '">' + tag + '</span>'
      +   '</div>'
      + '</a>';
  };

  // ---- Markup ------------------------------------------------------------
  var navHTML = `
  <nav class="nd-sitenav" aria-label="Primary">
    <div class="nd-sitenav__inner">
      <a href="${homeUrl}" class="nd-sitenav__brand" aria-label="Noordev home">noordev<span class="dot"></span></a>
      <ul class="nd-sitenav__links">
        <li>
          <button type="button" aria-expanded="false" aria-controls="nd-mega-services" id="nd-services-trigger" class="${active === 'services' ? 'active' : ''}">
            Services
            <svg class="caret" viewBox="0 0 10 10" aria-hidden="true"><path d="M2 4 L5 7 L8 4" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </button>
        </li>
        <li><a href="#" class="${active === 'odoo' ? 'active' : ''}">Odoo</a></li>
        <li><a href="#" class="${active === 'security' ? 'active' : ''}">Security</a></li>
        <li><a href="#" class="${active === 'training' ? 'active' : ''}">Training</a></li>
        <li><a href="#" class="${active === 'work' ? 'active' : ''}">Our work</a></li>
        <li><a href="#" class="${active === 'about' ? 'active' : ''}">About</a></li>
      </ul>
      <div class="nd-sitenav__right">
        <span class="nd-sitenav__lang"><b>EN</b> &middot; FR</span>
        <a class="nd-sitenav__cta" href="${ctaHref}">${cta}</a>
      </div>

      <div class="nd-mega-wrap" id="nd-mega-services" role="region" aria-label="Services menu">
        <div class="nd-mega" data-mega>
          <div class="nd-mega__grid">
            <aside class="nd-mega__rail" aria-label="Service categories">
              <div class="nd-mega__rail-label">Categories</div>
              <button class="nd-mega__rail-item" aria-selected="true" data-rail="all"><span>All services</span><span class="rail-count">08</span></button>
              <button class="nd-mega__rail-item" aria-selected="false" data-rail="brand"><span>Brand &amp; marketing</span><span class="rail-count">02</span></button>
              <button class="nd-mega__rail-item" aria-selected="false" data-rail="build"><span>Build &amp; operate</span><span class="rail-count">02</span></button>
              <button class="nd-mega__rail-item" aria-selected="false" data-rail="security"><span>Security &amp; risk</span><span class="rail-count">03</span></button>
              <button class="nd-mega__rail-item" aria-selected="false" data-rail="people"><span>People &amp; training</span><span class="rail-count">01</span></button>
              <div class="nd-mega__rail-foot"><a href="${homeUrl}#services">All services &rarr;</a></div>
            </aside>

            <div class="nd-mega__panels">
              <div class="nd-mega__panel" data-panel="all" data-active="true">
                <div class="nd-mega__panel-head"><h3>Everything Noordev does, <span class="italic">end-to-end</span>.</h3><span class="count">08 Services</span></div>
                <div class="nd-services-grid">
                  ${svcCard('01', 'Brand', 'Brand identity', 'Strategy, naming, visual system, verbal voice, guidelines.', '6&ndash;10 week sprints', '#', 'brand')}
                  ${svcCard('02', 'Marketing', 'Digital marketing', 'SEO, content, paid, CRM, attribution &mdash; fluent in bilingual markets.', 'Retainer + sprints', '#', 'marketing')}
                  ${svcCard('03', 'Platform', 'Odoo ERP', 'Implementation, migration, customization, support. Gold partner.', 'Gold partner &middot; 14 yrs', '#', 'odoo')}
                  ${svcCard('04', 'Web', 'Web &amp; apps', 'Marketing sites, portals, custom apps. Odoo-native or standalone.', 'Design + build', '#', 'web')}
                  ${svcCard('05', 'Security', 'Cybersecurity &amp; GRC', 'Risk program, policy, controls, audit prep, fractional CISO.', 'Growing fast', '#', 'security', 'new')}
                  ${svcCard('06', 'ISO 27001', 'ISO 27001:2022', 'ISMS, Statement of Applicability, 93 Annex A controls, certification.', '11-month path', '#', 'iso')}
                  ${svcCard('07', 'Training', 'Corporate training', 'ISO 27001 auditor, Odoo admin, secure dev, bilingual cohorts.', 'EN &middot; FR &middot; AR', '#', 'training')}
                  ${svcCard('08', 'Advisory', 'Fractional leadership', 'vCISO, CTO-in-residence, CMO-for-hire. Four days a month.', 'Monthly retainer', '#', 'advisory')}
                </div>
              </div>

              <div class="nd-mega__panel" data-panel="brand">
                <div class="nd-mega__panel-head"><h3>Brand &amp; marketing &mdash; <span class="italic">stories that convert</span>.</h3><span class="count">02 Services</span></div>
                <div class="nd-services-grid">
                  ${svcCard('01', 'Brand', 'Brand identity', 'Positioning, naming, logo system, typography, motion, guidelines.', '6&ndash;10 week sprints', '#', 'brand')}
                  ${svcCard('02', 'Marketing', 'Digital marketing', 'Full-funnel SEO, content, paid, CRM and attribution for bilingual markets.', 'Retainer + sprints', '#', 'marketing')}
                </div>
              </div>

              <div class="nd-mega__panel" data-panel="build">
                <div class="nd-mega__panel-head"><h3>Build &amp; operate &mdash; <span class="italic">platforms that last</span>.</h3><span class="count">02 Services</span></div>
                <div class="nd-services-grid">
                  ${svcCard('03', 'Platform', 'Odoo ERP', 'End-to-end Odoo implementation, module customization, data migration, hypercare, year-round support.', 'Gold partner', '#', 'odoo')}
                  ${svcCard('04', 'Web', 'Web &amp; apps', 'Marketing sites, customer portals, internal tools. React + Odoo-native.', 'Design + build', '#', 'web')}
                </div>
              </div>

              <div class="nd-mega__panel" data-panel="security">
                <div class="nd-mega__panel-head"><h3>Security &amp; risk &mdash; <span class="italic">harden what matters</span>.</h3><span class="count">03 Services</span></div>
                <div class="nd-services-grid">
                  ${svcCard('05', 'Security', 'Cybersecurity &amp; GRC', 'Risk program, policy library, control implementation, tabletop exercises, vendor reviews.', 'Growing fast', '#', 'security', 'new')}
                  ${svcCard('06', 'Certification', 'ISO 27001:2022', 'ISMS scoping, SoA, Annex A controls, Stage 1 &amp; 2 audit prep. 100% first-pass rate.', '11-month path', '#', 'iso')}
                  ${svcCard('09', 'Advisory', 'Fractional CISO', 'Security leadership on retainer. Board reporting, program ownership, incident response.', '4 days / month', '#', 'ciso')}
                </div>
              </div>

              <div class="nd-mega__panel" data-panel="people">
                <div class="nd-mega__panel-head"><h3>People &amp; training &mdash; <span class="italic">teams that ship</span>.</h3><span class="count">01 Service</span></div>
                <div class="nd-services-grid">
                  ${svcCard('07', 'Training', 'Corporate training', 'ISO 27001 internal auditor, Odoo administrator, secure development, security awareness. Bilingual cohorts.', 'EN &middot; FR &middot; Arabic on request', '#', 'training')}
                </div>
              </div>
            </div>

            <aside class="nd-mega__feature" aria-label="Featured work">
              <div class="nd-mega__feature-label">Featured case study</div>
              <div class="nd-mega__feature-mark">M<span class="dot"></span></div>
              <h4>Meridian Bank, <span class="italic">certified</span> in eleven months.</h4>
              <p>A full ISO 27001:2022 implementation &mdash; from gap assessment through Stage 2 &mdash; with zero major nonconformities. $2.1M of stalled enterprise pipeline unblocked on day one.</p>
              <div class="nd-mega__feature-meta">
                <div><div class="k">11<span class="u">mo</span></div><div class="l">To certified</div></div>
                <div><div class="k">0</div><div class="l">Major NCs</div></div>
                <div><div class="k">$2.1M</div><div class="l">Unblocked</div></div>
              </div>
              <a class="nd-mega__feature-cta" href="#">Read the case &rarr;</a>
            </aside>
          </div>

          <div class="nd-mega__foot">
            <div><span class="dotg"></span> Reply &lt; 1 biz day</div>
            <div>Montr&eacute;al &middot; Toronto &middot; Miami &middot; Rabat &middot; Canada, USA, North Africa</div>
            <div><a href="${ctaHref}">Book a free discovery call &rarr;</a></div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <div class="nd-scrim" data-scrim></div>
  `;

  // ---- Mount -------------------------------------------------------------
  function mount() {
    var legacy = document.querySelector('nav.site-nav');
    var frag = document.createRange().createContextualFragment(navHTML);
    if (legacy) {
      legacy.parentNode.insertBefore(frag, legacy);
      legacy.remove();
    } else {
      var announce = document.querySelector('.announce');
      var navEl = frag.firstElementChild;
      var scrimEl = frag.lastElementChild;
      if (announce) {
        announce.insertAdjacentElement('afterend', navEl);
      } else {
        document.body.insertBefore(navEl, document.body.firstChild);
      }
      if (scrimEl && scrimEl.classList && scrimEl.classList.contains('nd-scrim')) {
        document.body.appendChild(scrimEl);
      }
    }
    wire();
  }

  function wire() {
    var trigger = document.getElementById('nd-services-trigger');
    var wrap    = document.getElementById('nd-mega-services');
    if (!trigger || !wrap) return;
    var mega    = wrap.querySelector('[data-mega]');
    var scrim   = document.querySelector('[data-scrim]');
    var rail    = wrap.querySelectorAll('[data-rail]');
    var panels  = wrap.querySelectorAll('[data-panel]');
    var hoverTimer = null;

    var open  = function () { clearTimeout(hoverTimer); trigger.setAttribute('aria-expanded', 'true'); mega.setAttribute('data-open', 'true'); if (scrim) scrim.setAttribute('data-open', 'true'); };
    var close = function () { trigger.setAttribute('aria-expanded', 'false'); mega.setAttribute('data-open', 'false'); if (scrim) scrim.setAttribute('data-open', 'false'); };
    var deferClose = function () { clearTimeout(hoverTimer); hoverTimer = setTimeout(close, 160); };

    trigger.addEventListener('mouseenter', open);
    trigger.addEventListener('focus', open);
    trigger.addEventListener('click', function (e) { e.preventDefault(); trigger.getAttribute('aria-expanded') === 'true' ? close() : open(); });
    wrap.addEventListener('mouseenter', function () { clearTimeout(hoverTimer); });
    wrap.addEventListener('mouseleave', deferClose);
    trigger.addEventListener('mouseleave', deferClose);
    if (scrim) scrim.addEventListener('click', close);
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && mega.getAttribute('data-open') === 'true') { close(); trigger.focus(); } });

    var activate = function (name) {
      rail.forEach(function (r) { r.setAttribute('aria-selected', r.dataset.rail === name ? 'true' : 'false'); });
      panels.forEach(function (p) { p.setAttribute('data-active', p.dataset.panel === name ? 'true' : 'false'); });
      try { localStorage.setItem('nd-mega-cat', name); } catch (e) {}
    };
    rail.forEach(function (r) {
      r.addEventListener('click', function () { activate(r.dataset.rail); });
      r.addEventListener('mouseenter', function () { activate(r.dataset.rail); });
      r.addEventListener('focus', function () { activate(r.dataset.rail); });
    });
    try { var saved = localStorage.getItem('nd-mega-cat'); if (saved) activate(saved); } catch (e) {}
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', mount);
  } else {
    mount();
  }
})();
