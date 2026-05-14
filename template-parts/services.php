<?php
/**
 * Services grid — eight cards in a 3-column grid (responsive).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$services = apply_filters(
	'noordev_services',
	array(
		array(
			'num'   => '01 · Web',
			'title' => 'Website design & development',
			'body'  => 'Enterprise websites built to measurable results. Custom design, lead tracking, organic SEO, headless when it matters.',
			'tags'  => array( 'Strategy', 'Design', 'Dev', 'CMS' ),
			'href'  => '#',
		),
		array(
			'num'   => '02 · Growth',
			'title' => 'SEO & paid media',
			'body'  => 'Technical SEO, content programs, and paid acquisition across Google and Meta. Measured in pipeline, not vanity traffic.',
			'tags'  => array( 'SEO', 'SEM', 'Content', 'Analytics' ),
			'href'  => '#',
		),
		array(
			'num'   => '03 · Odoo',
			'title' => 'Odoo implementation & support',
			'body'  => 'Discovery to cutover — scoping, configuration, customization, training, and long-term support. Odoo Ready Partner.',
			'tags'  => array( 'Discovery', 'Config', 'Migration', 'Training' ),
			'href'  => '#',
		),
		array(
			'num'   => '04 · Social',
			'title' => 'Social media management',
			'body'  => "Always-on social that sounds like your brand — not an agency's template. Editorial calendars, production, community.",
			'tags'  => array( 'Editorial', 'Production', 'Paid' ),
			'href'  => '#',
		),
		array(
			'num'   => '05 · Security',
			'title' => 'Cybersecurity GRC & risk',
			'body'  => 'Governance, risk, and compliance programs that pass audit and survive reality. Risk registers, policy, controls, evidence.',
			'tags'  => array( 'GRC', 'Risk', 'Policy', 'Audit' ),
			'href'  => '#',
		),
		array(
			'num'   => '06 · ISO 27001',
			'title' => 'ISO 27001 implementation',
			'body'  => 'Gap assessment to certification. ISMS scope, Statement of Applicability, Annex A controls, internal audit, and management review.',
			'tags'  => array( 'ISMS', 'SoA', 'Annex A', 'Certify' ),
			'href'  => '#',
		),
		array(
			'num'   => '07 · Training',
			'title' => 'Corporate training',
			'body'  => 'On-site and remote programs: Odoo for end-users, security awareness, digital marketing fundamentals. Bilingual EN/FR · Arabic on request.',
			'tags'  => array( 'Odoo', 'Awareness', 'Workshops', 'EN/FR' ),
			'href'  => '#',
		),
		array(
			'num'   => '08 · WordPress',
			'title' => 'Maintenance & upgrades',
			'body'  => 'Keep your WordPress secure, backed up, and fast. Monthly retainers with transparent reporting.',
			'tags'  => array( 'Security', 'Backups', 'Performance' ),
			'href'  => '#',
		),
	)
);
?>
<section class="section" id="services">
	<div class="section__head">
		<div>
			<div class="section__eyebrow"><?php esc_html_e( 'What we do', 'noordev' ); ?></div>
			<h2 class="section__title"><?php esc_html_e( 'Five practices,', 'noordev' ); ?> <span class="italic"><?php esc_html_e( 'one team', 'noordev' ); ?></span> &mdash; <?php esc_html_e( 'from first sketch to certified controls.', 'noordev' ); ?></h2>
		</div>
		<p class="section__body">
			<?php esc_html_e( 'We do web, growth, Odoo, security, and training — and we do them together. Cross-pollination between practices is where our clients see the biggest lift.', 'noordev' ); ?>
		</p>
	</div>

	<div class="services">
		<?php foreach ( $services as $svc ) : ?>
			<a class="service" href="<?php echo esc_url( $svc['href'] ); ?>">
				<div class="service__num"><?php echo esc_html( $svc['num'] ); ?></div>
				<h3 class="service__title"><?php echo esc_html( $svc['title'] ); ?></h3>
				<p class="service__body"><?php echo esc_html( $svc['body'] ); ?></p>
				<div class="service__tags">
					<?php foreach ( $svc['tags'] as $tag ) : ?>
						<span class="service__tag"><?php echo esc_html( $tag ); ?></span>
					<?php endforeach; ?>
				</div>
				<span class="service__arrow" aria-hidden="true">&rarr;</span>
			</a>
		<?php endforeach; ?>
	</div>
</section>
