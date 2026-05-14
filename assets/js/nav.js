/* ============================================================================
   NOORDEV · Shared site nav + services mega menu
   Mounts the primary nav and a 3-column "Services" mega menu after any
   .announce element on the page, or to <body> if none exists.

   Optional config (read from window.NOORDEV.homeUrl, plus data-* on a
   <script id="noordev-nav-config" data-active="..." data-cta="..."
   data-cta-href="..."> tag if present):
     - homeUrl   : URL for the brand link (defaults to "/")
     - active    : key of the active top-level link
     - cta       : label for the CTA button
     - ctaHref   : href for the CTA button
   ============================================================================ */
(function () {
  var ND = (window.NOORDEV = window.NOORDEV || {});
  var configEl = document.getElementById('noordev-nav-config');
  var ds = (configEl && configEl.dataset) || {};

  var homeUrl = ND.homeUrl || '/';
  var active  = ds.active  || ND.active  || '';
  var cta     = ds.cta     || ND.cta     || 'Book a call';
  var ctaHref = ds.ctaHref || ND.ctaHref || '#cta';

  // ---- CSS ---------------------------------------------------------------
  var css = `
  .nd-sitenav { position: sticky; top: 0; z-index: 40; background: rgba(255,255,255,0.92); backdrop-filter: saturate(180%) blur(12px); border-bottom: 1px solid var(--color-border); }
  .nd-sitenav__inner { max-width: var(--container-wide); margin: 0 auto; padding: 14px var(--gutter); display: flex; align-items: center; justify-content: space-between; gap: 32px; position: relative; }
  .nd-sitenav__brand { font-family: var(--font-sans); font-weight: 600; font-size: 16px; letter-spacing: -0.01em; color: var(--navy-900); text-decoration: none; display: flex; align-items: baseline; gap: 2px; }
  .nd-sitenav__brand .dot { width: 4px; height: 4px; border-radius: 50%; background: var(--crimson-600); display: inline-block; transform: translateY(-8px); margin: 0 1px 0 1px; }
  .nd-sitenav__links { display: flex; gap: 28px; list-style: none; margin: 0; padding: 0; }
  .nd-sitenav__links > li { position: relative; }
  .nd-sitenav__links a, .nd-sitenav__links button { font-family: var(--font-sans); font-size: var(--text-sm); color: var(--color-ink); text-decoration: none; font-weight: 500; position: relative; padding: 6px 0; background: none; border: 0; cursor: pointer; display: inline-flex; align-items: center; gap: 6px; }
  .nd-sitenav__links a:hover, .nd-sitenav__links button:hover { color: var(--navy-700); }
  .nd-sitenav__links a.active::after, .nd-sitenav__links button[aria-expanded="true"]::after { content:''; position: absolute; left: -2px; right: -2px; bottom: -19px; height: 2px; background: var(--crimson-600); }
  .nd-sitenav__links button .caret { width: 10px; height: 10px; transition: transform 220ms var(--ease-out); opacity: 0.5; }
  .nd-sitenav__links button[aria-expanded="true"] .caret { transform: rotate(180deg); opacity: 1; }
  .nd-sitenav__right { display: flex; gap: 20px; align-items: center; }
  .nd-sitenav__lang { font-family: var(--font-mono); font-size: 11px; color: var(--color-ink-muted); text-transform: uppercase; letter-spacing: 0.08em; }
  .nd-sitenav__lang b { color: var(--color-ink); }
  .nd-sitenav__cta { display: inline-flex; align-items: center; gap: 8px; font-family: var(--font-sans); font-size: var(--text-xs); font-weight: 500; padding: 8px 14px; border-radius: var(--radius-sm); background: var(--crimson-600); color: white; text-decoration: none; transition: all 200ms var(--ease-out); border: 1px solid transparent; }
  .nd-sitenav__cta:hover { background: var(--crimson-700); }

  .nd-mega-wrap { position: absolute; left: 0; right: 0; top: 100%; z-index: 50; display: flex; justify-content: center; pointer-events: none; }
  .nd-mega { width: min(1280px, calc(100vw - 32px)); background: var(--color-bg); border: 1px solid var(--color-border); border-top: 0; border-radius: 0 0 var(--radius-lg) var(--radius-lg); box-shadow: var(--shadow-xl); overflow: hidden; opacity: 0; transform: translateY(-8px); transition: opacity 240ms var(--ease-out), transform 240ms var(--ease-out); pointer-events: none; }
  .nd-mega[data-open="true"] { opacity: 1; transform: translateY(0); pointer-events: auto; }
  .nd-mega__grid { display: grid; grid-template-columns: 200px 1fr 340px; min-height: 520px; }
  .nd-mega__rail { background: var(--color-bg-subtle); border-right: 1px solid var(--color-border); padding: 28px 0; display: flex; flex-direction: column; }
  .nd-mega__rail-label { font-family: var(--font-mono); font-size: 10px; text-transform: uppercase; letter-spacing: 0.08em; color: var(--color-ink-muted); padding: 0 24px 14px; }
  .nd-mega__rail-item { padding: 12px 24px; font-family: var(--font-sans); font-size: var(--text-sm); font-weight: 500; color: var(--color-ink); cursor: pointer; display: flex; justify-content: space-between; align-items: center; gap: 12px; border: 0; border-left: 2px solid transparent; width: 100%; text-align: left; background: none; transition: all 200ms var(--ease-out); }
  .nd-mega__rail-item:hover { color: var(--navy-700); background: rgba(255,255,255,0.6); }
  .nd-mega__rail-item[aria-selected="true"] { color: var(--navy-900); background: white; border-left-color: var(--crimson-600); }
  .nd-mega__rail-item[aria-selected="true"] .rail-count { color: var(--crimson-600); }
  .nd-mega__rail-item .rail-count { font-family: var(--font-mono); font-size: 10px; color: var(--color-ink-muted); letter-spacing: 0.04em; }
  .nd-mega__rail-foot { margin-top: auto; padding: 24px; border-top: 1px solid var(--color-border); }
  .nd-mega__rail-foot a { font-family: var(--font-sans); font-size: var(--text-sm); color: var(--navy-700); text-decoration: none; display: inline-flex; align-items: center; gap: 6px; font-weight: 500; }
  .nd-mega__rail-foot a:hover { color: var(--crimson-600); }

  .nd-mega__panels { position: relative; }
  .nd-mega__panel { position: absolute; inset: 0; padding: 36px 40px; display: none; }
  .nd-mega__panel[data-active="true"] { display: block; animation: nd-fade 240ms var(--ease-out); }
  @keyframes nd-fade { from { opacity: 0; transform: translateY(4px); } to { opacity: 1; transform: translateY(0); } }
  .nd-mega__panel-head { display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 24px; padding-bottom: 16px; border-bottom: 1px solid var(--color-border); }
  .nd-mega__panel-head h3 { font-family: var(--font-sans); font-size: var(--text-md); font-weight: 500; letter-spacing: -0.01em; margin: 0; color: var(--navy-900); }
  .nd-mega__panel-head h3 .italic { font-family: var(--font-display); font-style: italic; color: var(--navy-700); font-weight: 400; }
  .nd-mega__panel-head .count { font-family: var(--font-mono); font-size: 10px; text-transform: uppercase; letter-spacing: 0.08em; color: var(--color-ink-muted); }

  .nd-services-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 4px; }
  .nd-svc { display: grid; grid-template-columns: 40px 1fr; gap: 16px; padding: 16px; border-radius: var(--radius-sm); text-decoration: none; color: inherit; transition: background 180ms var(--ease-out); align-items: start; }
  .nd-svc:hover { background: var(--color-bg-subtle); }
  .nd-svc:hover .nd-svc__arrow { opacity: 1; transform: translateX(0); }
  .nd-svc__icon { width: 40px; height: 40px; border-radius: var(--radius-sm); background: white; border: 1px solid var(--color-border); display: flex; align-items: center; justify-content: center; color: var(--navy-700); transition: all 200ms var(--ease-out); }
  .nd-svc:hover .nd-svc__icon { background: var(--navy-900); border-color: var(--navy-900); color: white; }
  .nd-svc__icon svg { width: 20px; height: 20px; stroke: currentColor; fill: none; stroke-width: 1.5; }
  .nd-svc__num { font-family: var(--font-mono); font-size: 10px; color: var(--color-ink-muted); letter-spacing: 0.04em; margin-bottom: 4px; display: block; }
  .nd-svc__title { font-family: var(--font-sans); font-size: var(--text-sm); font-weight: 500; color: var(--navy-900); margin: 0 0 4px; letter-spacing: -0.005em; display: flex; align-items: center; gap: 8px; }
  .nd-svc__title .nd-svc__arrow { font-family: var(--font-mono); color: var(--crimson-600); opacity: 0; transform: translateX(-4px); transition: all 200ms var(--ease-out); }
  .nd-svc__desc { font-size: var(--text-xs); color: var(--color-ink-muted); line-height: 1.55; margin: 0 0 8px; }
  .nd-svc__tag { font-family: var(--font-mono); font-size: 10px; text-transform: uppercase; letter-spacing: 0.06em; color: var(--navy-700); display: inline-flex; gap: 8px; align-items: center; }
  .nd-svc__tag::before { content: ''; width: 4px; height: 4px; border-radius: 50%; background: var(--crimson-600); }
  .nd-svc__tag.new::before { background: #58c494; }

  .nd-mega__feature { background: var(--navy-950); color: white; padding: 36px 32px; display: flex; flex-direction: column; gap: 20px; position: relative; overflow: hidden; }
  .nd-mega__feature::before { content:''; position: absolute; inset: 0; background-image: linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px); background-size: 32px 32px; -webkit-mask-image: radial-gradient(ellipse at top right, black 20%, transparent 75%); mask-image: radial-gradient(ellipse at top right, black 20%, transparent 75%); pointer-events: none; }
  .nd-mega__feature > * { position: relative; }
  .nd-mega__feature-label { font-family: var(--font-mono); font-size: 10px; text-transform: uppercase; letter-spacing: 0.1em; color: var(--crimson-400); display: flex; align-items: center; gap: 8px; }
  .nd-mega__feature-label::before { content: ''; width: 4px; height: 4px; border-radius: 50%; background: var(--crimson-500); box-shadow: 0 0 0 4px rgba(207,29,59,0.15); }
  .nd-mega__feature-mark { font-family: var(--font-display); font-style: italic; font-size: 48px; color: white; line-height: 1; margin-top: 4px; position: relative; display: inline-block; }
  .nd-mega__feature-mark .dot { display: inline-block; width: 6px; height: 6px; border-radius: 50%; background: var(--crimson-500); position: absolute; top: 10px; right: -8px; }
  .nd-mega__feature h4 { font-family: var(--font-sans); font-size: var(--text-lg); font-weight: 400; letter-spacing: -0.015em; line-height: 1.25; margin: 0; color: white; }
  .nd-mega__feature h4 .italic { font-family: var(--font-display); font-style: italic; color: var(--navy-200); }
  .nd-mega__feature p { font-size: var(--text-xs); color: var(--navy-300); line-height: 1.6; margin: 0; }
  .nd-mega__feature-meta { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; padding-top: 20px; margin-top: auto; border-top: 1px solid var(--navy-800); }
  .nd-mega__feature-meta .k { font-family: var(--font-sans); font-size: var(--text-lg); font-weight: 300; letter-spacing: -0.02em; color: white; line-height: 1; }
  .nd-mega__feature-meta .k .u { font-size: 11px; color: var(--navy-400); margin-left: 2px; }
  .nd-mega__feature-meta .l { font-family: var(--font-mono); font-size: 9px; text-transform: uppercase; letter-spacing: 0.08em; color: var(--navy-400); margin-top: 6px; }
  .nd-mega__feature-cta { display: inline-flex; align-items: center; gap: 8px; font-family: var(--font-sans); font-size: var(--text-xs); font-weight: 500; color: white; text-decoration: none; padding: 10px 14px; border: 1px solid rgba(255,255,255,0.2); border-radius: var(--radius-sm); transition: all 200ms var(--ease-out); align-self: flex-start; }
  .nd-mega__feature-cta:hover { background: var(--crimson-600); border-color: var(--crimson-600); }

  .nd-mega__foot { display: grid; grid-template-columns: 200px 1fr 340px; border-top: 1px solid var(--color-border); background: var(--color-bg-subtle); font-family: var(--font-mono); font-size: 10px; text-transform: uppercase; letter-spacing: 0.06em; color: var(--color-ink-muted); }
  .nd-mega__foot > div { padding: 14px 24px; display: flex; align-items: center; gap: 12px; }
  .nd-mega__foot > div + div { border-left: 1px solid var(--color-border); }
  .nd-mega__foot a { color: var(--navy-800); text-decoration: none; }
  .nd-mega__foot a:hover { color: var(--crimson-600); }
  .nd-mega__foot .dotg { width: 5px; height: 5px; border-radius: 50%; background: #58c494; box-shadow: 0 0 0 3px rgba(88,196,148,0.15); }

  .nd-scrim { position: fixed; inset: 0; background: rgba(7, 13, 19, 0.35); backdrop-filter: blur(2px); z-index: 30; opacity: 0; pointer-events: none; transition: opacity 240ms var(--ease-out); }
  .nd-scrim[data-open="true"] { opacity: 1; pointer-events: auto; }

  @media (max-width: 960px) {
    .nd-sitenav__links { display: none; }
    .nd-mega__grid { grid-template-columns: 1fr; min-height: 0; }
    .nd-mega__rail, .nd-mega__feature { display: none; }
    .nd-mega__foot { grid-template-columns: 1fr; }
    .nd-mega__foot > div + div { border-left: 0; border-top: 1px solid var(--color-border); }
  }
  `;
  var styleEl = document.createElement('style');
  styleEl.textContent = css;
  document.head.appendChild(styleEl);

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
      // Append the scrim to body so it overlays everything.
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
