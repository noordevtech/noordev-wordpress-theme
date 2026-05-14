<?php
/**
 * Template Name: Noordev — Services
 *
 * Capabilities index: hero, three discipline groups (Web · Odoo · Security),
 * engagement models row, process band reused from the home page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="content" class="site-main" role="main">

	<section class="page-hero">
		<div class="page-hero__inner">
			<div>
				<div class="page-hero__crumbs">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Noordev', 'noordev-child' ); ?></a>
					<span class="sep">/</span>
					<span><?php esc_html_e( 'Services', 'noordev-child' ); ?></span>
				</div>
				<div class="page-hero__eyebrow"><?php esc_html_e( 'What we do', 'noordev-child' ); ?></div>
				<h1>
					<?php esc_html_e( 'Three disciplines.', 'noordev-child' ); ?><br>
					<span class="italic"><?php esc_html_e( 'One senior team', 'noordev-child' ); ?></span><span class="accent-dot" aria-hidden="true"></span>
				</h1>
			</div>
			<div>
				<p class="page-hero__lede">
					<?php esc_html_e( 'We build the websites that earn attention, the Odoo systems that run the business behind them, and the security posture that keeps both intact. No handoffs between agencies, no junior account managers.', 'noordev-child' ); ?>
				</p>
				<div class="page-hero__meta">
					<div class="page-hero__meta-item"><div class="l"><?php esc_html_e( 'Engagements', 'noordev-child' ); ?></div><div class="v">140+</div></div>
					<div class="page-hero__meta-item"><div class="l"><?php esc_html_e( 'Avg. tenure', 'noordev-child' ); ?></div><div class="v">3.4 yrs</div></div>
					<div class="page-hero__meta-item"><div class="l"><?php esc_html_e( 'Lead time', 'noordev-child' ); ?></div><div class="v">6 wks</div></div>
				</div>
			</div>
		</div>
	</section>

	<div class="svc-groups">

		<section class="svc-group" aria-labelledby="grp-web">
			<header class="svc-group__head">
				<div class="svc-group__num">01 / Discipline</div>
				<h2 id="grp-web" class="svc-group__title">
					<?php esc_html_e( 'Web', 'noordev-child' ); ?> &amp; <span class="italic"><?php esc_html_e( 'growth', 'noordev-child' ); ?></span>
				</h2>
				<p class="svc-group__body"><?php esc_html_e( 'Marketing sites, lead engines, and the SEO/paid programs that feed them. Built to ship value in weeks, not quarters.', 'noordev-child' ); ?></p>
			</header>
			<div class="svc-group__cards">
				<?php
				$web_cards = array(
					array(
						'icon'  => '<path d="M3 7h18M3 12h18M3 17h12"/>',
						'title' => __( 'Web design & build', 'noordev-child' ),
						'body'  => __( 'Marketing sites and product surfaces designed from a real brand system, built on WordPress or headless.', 'noordev-child' ),
						'tag'   => __( 'Design + Dev', 'noordev-child' ),
					),
					array(
						'icon'  => '<circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/>',
						'title' => __( 'SEO & paid media', 'noordev-child' ),
						'body'  => __( 'Technical SEO, content programs, and Google/Meta paid funnels that report against revenue, not vanity.', 'noordev-child' ),
						'tag'   => __( 'Always-on', 'noordev-child' ),
					),
					array(
						'icon'  => '<rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/>',
						'title' => __( 'WordPress engineering', 'noordev-child' ),
						'body'  => __( 'Multi-site, multi-lingual, custom blocks, performance budgets, and a maintenance contract that means it.', 'noordev-child' ),
						'tag'   => __( 'Long-term', 'noordev-child' ),
					),
					array(
						'icon'  => '<path d="M21 12a9 9 0 1 1-9-9c2.5 0 4.8 1 6.5 2.5"/><path d="M21 3v6h-6"/>',
						'title' => __( 'CRO & analytics', 'noordev-child' ),
						'body'  => __( 'GA4 + server-side events, audit-grade attribution, and a quarterly experiment pipeline against your funnel.', 'noordev-child' ),
						'tag'   => __( 'Quarterly', 'noordev-child' ),
					),
				);
				foreach ( $web_cards as $c ) :
					?>
					<a class="svc-card" href="#">
						<span class="svc-card__icon"><svg viewBox="0 0 24 24" aria-hidden="true"><?php echo $c['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG paths ?></svg></span>
						<h3 class="svc-card__title"><?php echo esc_html( $c['title'] ); ?></h3>
						<p class="svc-card__body"><?php echo esc_html( $c['body'] ); ?></p>
						<div class="svc-card__foot"><span><?php echo esc_html( $c['tag'] ); ?></span><span class="svc-card__arrow">&rarr;</span></div>
					</a>
				<?php endforeach; ?>
			</div>
		</section>

		<section class="svc-group" aria-labelledby="grp-odoo">
			<header class="svc-group__head">
				<div class="svc-group__num">02 / Discipline</div>
				<h2 id="grp-odoo" class="svc-group__title">
					<?php esc_html_e( 'Odoo', 'noordev-child' ); ?> <span class="italic"><?php esc_html_e( 'partner', 'noordev-child' ); ?></span>
				</h2>
				<p class="svc-group__body"><?php esc_html_e( 'Official Odoo partner since 2016. Implementations, migrations, and the long-tail support contracts most partners refuse to take.', 'noordev-child' ); ?></p>
			</header>
			<div class="svc-group__cards">
				<?php
				$odoo_cards = array(
					array(
						'icon'  => '<path d="M3 7l9-4 9 4-9 4-9-4z"/><path d="M3 12l9 4 9-4M3 17l9 4 9-4"/>',
						'title' => __( 'Implementation', 'noordev-child' ),
						'body'  => __( 'Greenfield Odoo 17/18 builds — Sales, Inventory, MRP, Accounting, Project, HR — phased into production on a fixed plan.', 'noordev-child' ),
						'tag'   => __( '8–16 wks', 'noordev-child' ),
					),
					array(
						'icon'  => '<path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2"/><path d="M7 11l5 5 5-5"/><path d="M12 16V3"/>',
						'title' => __( 'Migration', 'noordev-child' ),
						'body'  => __( 'Move from on-prem v13/14/15 to Odoo Online or odoo.sh on 17 — custom modules audited, refactored, kept.', 'noordev-child' ),
						'tag'   => __( 'Booking Q3', 'noordev-child' ),
					),
					array(
						'icon'  => '<path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/>',
						'title' => __( 'Customization', 'noordev-child' ),
						'body'  => __( 'Custom modules, OWL components, server actions, and the QWeb reports your finance team actually wants.', 'noordev-child' ),
						'tag'   => __( 'Bespoke', 'noordev-child' ),
					),
					array(
						'icon'  => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>',
						'title' => __( 'Support & hosting', 'noordev-child' ),
						'body'  => __( 'Tier-2 support, monitored upgrades, and managed odoo.sh hosting with a real SLA and a real human on call.', 'noordev-child' ),
						'tag'   => __( 'Retainer', 'noordev-child' ),
					),
				);
				foreach ( $odoo_cards as $c ) :
					?>
					<a class="svc-card" href="#">
						<span class="svc-card__icon"><svg viewBox="0 0 24 24" aria-hidden="true"><?php echo $c['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG paths ?></svg></span>
						<h3 class="svc-card__title"><?php echo esc_html( $c['title'] ); ?></h3>
						<p class="svc-card__body"><?php echo esc_html( $c['body'] ); ?></p>
						<div class="svc-card__foot"><span><?php echo esc_html( $c['tag'] ); ?></span><span class="svc-card__arrow">&rarr;</span></div>
					</a>
				<?php endforeach; ?>
			</div>
		</section>

		<section class="svc-group" aria-labelledby="grp-sec">
			<header class="svc-group__head">
				<div class="svc-group__num">03 / Discipline</div>
				<h2 id="grp-sec" class="svc-group__title">
					<?php esc_html_e( 'Security', 'noordev-child' ); ?> &amp; <span class="italic"><?php esc_html_e( 'governance', 'noordev-child' ); ?></span>
				</h2>
				<p class="svc-group__body"><?php esc_html_e( 'ISO 27001 readiness, Law 25 compliance, and the GRC scaffolding that keeps your audit boring.', 'noordev-child' ); ?></p>
			</header>
			<div class="svc-group__cards">
				<?php
				$sec_cards = array(
					array(
						'icon'  => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/>',
						'title' => __( 'ISO 27001 readiness', 'noordev-child' ),
						'body'  => __( 'Gap assessment, ISMS scope, Annex A control implementation, and stage-1/stage-2 audit prep with a named auditor.', 'noordev-child' ),
						'tag'   => __( '5–7 mo', 'noordev-child' ),
					),
					array(
						'icon'  => '<rect x="3" y="11" width="18" height="10" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>',
						'title' => __( 'Law 25 / GDPR', 'noordev-child' ),
						'body'  => __( 'Privacy program for Québec organizations: data mapping, DPIA, breach playbook, vendor controls, training.', 'noordev-child' ),
						'tag'   => __( 'Compliance', 'noordev-child' ),
					),
					array(
						'icon'  => '<path d="M3 3h18v18H3z"/><path d="M3 9h18M9 21V9"/>',
						'title' => __( 'Policy & controls', 'noordev-child' ),
						'body'  => __( 'A living policy library, RACI matrices, and the evidence pipeline that turns control work into audit-ready artifacts.', 'noordev-child' ),
						'tag'   => __( 'Library', 'noordev-child' ),
					),
					array(
						'icon'  => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
						'title' => __( 'Awareness program', 'noordev-child' ),
						'body'  => __( 'Quarterly phishing simulations, role-based training, and a measurable culture metric instead of an annual checkbox.', 'noordev-child' ),
						'tag'   => __( 'Always-on', 'noordev-child' ),
					),
				);
				foreach ( $sec_cards as $c ) :
					?>
					<a class="svc-card" href="#">
						<span class="svc-card__icon"><svg viewBox="0 0 24 24" aria-hidden="true"><?php echo $c['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG paths ?></svg></span>
						<h3 class="svc-card__title"><?php echo esc_html( $c['title'] ); ?></h3>
						<p class="svc-card__body"><?php echo esc_html( $c['body'] ); ?></p>
						<div class="svc-card__foot"><span><?php echo esc_html( $c['tag'] ); ?></span><span class="svc-card__arrow">&rarr;</span></div>
					</a>
				<?php endforeach; ?>
			</div>
		</section>

	</div>

	<section class="engage" aria-labelledby="engage-title">
		<div class="engage__inner">
			<div class="section__head" style="margin-bottom:0">
				<div>
					<div class="section__eyebrow"><?php esc_html_e( 'How we engage', 'noordev-child' ); ?></div>
					<h2 id="engage-title" class="section__title"><?php esc_html_e( 'Three ways to', 'noordev-child' ); ?> <span class="italic"><?php esc_html_e( 'work together', 'noordev-child' ); ?></span></h2>
				</div>
				<p class="section__body"><?php esc_html_e( 'Pick the shape that fits the problem. We will tell you if you have picked wrong before we send a contract.', 'noordev-child' ); ?></p>
			</div>

			<div class="engage__grid">
				<article class="engage__card">
					<div class="engage__label"><?php esc_html_e( 'Sprint', 'noordev-child' ); ?></div>
					<div class="engage__name"><?php esc_html_e( 'Discovery sprint', 'noordev-child' ); ?></div>
					<div class="engage__price">2 wks</div>
					<p class="engage__body"><?php esc_html_e( 'A scoped, fixed-cost engagement to validate the problem and shape a delivery plan we both believe in.', 'noordev-child' ); ?></p>
					<ul class="engage__list">
						<li><?php esc_html_e( 'Stakeholder + system audit', 'noordev-child' ); ?></li>
						<li><?php esc_html_e( 'Architecture + scope doc', 'noordev-child' ); ?></li>
						<li><?php esc_html_e( 'Fixed delivery quote', 'noordev-child' ); ?></li>
					</ul>
					<a href="#contact" class="engage__cta"><?php esc_html_e( 'Book a sprint', 'noordev-child' ); ?> &rarr;</a>
				</article>

				<article class="engage__card engage__card--feat">
					<div class="engage__label"><?php esc_html_e( 'Project', 'noordev-child' ); ?></div>
					<div class="engage__name"><?php esc_html_e( 'Fixed-scope delivery', 'noordev-child' ); ?></div>
					<div class="engage__price">6&ndash;16 wks</div>
					<p class="engage__body"><?php esc_html_e( 'A single delivery against a fixed scope and timeline, run by a senior pod of three to five.', 'noordev-child' ); ?></p>
					<ul class="engage__list">
						<li><?php esc_html_e( 'Weekly demos & change log', 'noordev-child' ); ?></li>
						<li><?php esc_html_e( 'Fixed price, fixed dates', 'noordev-child' ); ?></li>
						<li><?php esc_html_e( '90-day post-launch warranty', 'noordev-child' ); ?></li>
					</ul>
					<a href="#contact" class="engage__cta"><?php esc_html_e( 'Scope a project', 'noordev-child' ); ?> &rarr;</a>
				</article>

				<article class="engage__card">
					<div class="engage__label"><?php esc_html_e( 'Retainer', 'noordev-child' ); ?></div>
					<div class="engage__name"><?php esc_html_e( 'Ongoing partnership', 'noordev-child' ); ?></div>
					<div class="engage__price"><?php esc_html_e( 'Monthly', 'noordev-child' ); ?></div>
					<p class="engage__body"><?php esc_html_e( 'A named team that owns the platform with you: roadmap, build, monitor, report. Quarterly business review.', 'noordev-child' ); ?></p>
					<ul class="engage__list">
						<li><?php esc_html_e( 'Named senior pod', 'noordev-child' ); ?></li>
						<li><?php esc_html_e( 'SLA & on-call', 'noordev-child' ); ?></li>
						<li><?php esc_html_e( 'Quarterly business review', 'noordev-child' ); ?></li>
					</ul>
					<a href="#contact" class="engage__cta"><?php esc_html_e( 'Start a retainer', 'noordev-child' ); ?> &rarr;</a>
				</article>
			</div>
		</div>
	</section>

	<section class="process" aria-labelledby="proc-title">
		<div class="process__inner">
			<div class="section__head">
				<div>
					<div class="section__eyebrow"><?php esc_html_e( 'Process', 'noordev-child' ); ?></div>
					<h2 id="proc-title" class="section__title"><?php esc_html_e( 'How a project', 'noordev-child' ); ?> <span class="italic"><?php esc_html_e( 'actually runs', 'noordev-child' ); ?></span></h2>
				</div>
				<p class="section__body"><?php esc_html_e( 'Four phases. Senior-only delivery. No status meetings about status meetings.', 'noordev-child' ); ?></p>
			</div>
			<div class="process__grid">
				<div class="step"><div class="step__n">01 — Discovery</div><h3 class="step__title"><?php esc_html_e( 'Audit & frame', 'noordev-child' ); ?></h3><p class="step__body"><?php esc_html_e( 'Two weeks with stakeholders, systems, and data. We leave you with a scope doc that both teams can sign.', 'noordev-child' ); ?></p></div>
				<div class="step"><div class="step__n">02 — Design</div><h3 class="step__title"><?php esc_html_e( 'System & flows', 'noordev-child' ); ?></h3><p class="step__body"><?php esc_html_e( 'Brand-led interface design, IA, and a tokenized design system that survives the next redesign.', 'noordev-child' ); ?></p></div>
				<div class="step"><div class="step__n">03 — Build</div><h3 class="step__title"><?php esc_html_e( 'Ship in weeks', 'noordev-child' ); ?></h3><p class="step__body"><?php esc_html_e( 'Weekly demos against a public change log. You see progress the same week we make it.', 'noordev-child' ); ?></p></div>
				<div class="step"><div class="step__n">04 — Run</div><h3 class="step__title"><?php esc_html_e( 'Operate & evolve', 'noordev-child' ); ?></h3><p class="step__body"><?php esc_html_e( 'Quarterly business reviews, an experiment pipeline, and an SLA that means the same thing on Friday at 6pm.', 'noordev-child' ); ?></p></div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
