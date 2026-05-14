<?php
/**
 * Closing CTA — pitch text + lead-capture form.
 *
 * The form is presentational by default. Wire it up by intercepting the
 * `submit` event on `.cta__form` from your CRM/forms plugin (e.g. swap in a
 * Contact Form 7 / Gravity Forms shortcode if preferred).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$services = apply_filters(
	'noordev_cta_services',
	array(
		'Website design & development',
		'SEO & paid media',
		'Odoo implementation',
		'Social media management',
		'Consulting / advisory',
	)
);

$budgets = apply_filters(
	'noordev_cta_budgets',
	array( '$15k – $50k', '$50k – $150k', '$150k+', 'Ongoing retainer' )
);
?>
<section class="cta" id="cta">
	<div>
		<div class="section__eyebrow"><?php esc_html_e( "Let's talk", 'noordev' ); ?></div>
		<h2 class="cta__title"><?php esc_html_e( 'Start to build your project', 'noordev' ); ?> <span class="italic"><?php esc_html_e( 'with us', 'noordev' ); ?></span>.</h2>
		<p class="cta__body">
			<?php esc_html_e( "Tell us what you're working on — a site rebuild, a stalled Odoo project, a growth program that isn't moving. We'll respond within one business day with a plan, not a sales pitch.", 'noordev' ); ?>
		</p>
		<div class="cta__phones">
			<span>☎ <?php esc_html_e( 'Montréal-Toronto', 'noordev' ); ?> <b>(450) 990-0134</b></span>
			<span>· <?php esc_html_e( 'Miami', 'noordev' ); ?> <b>(877) 477-4146</b></span>
		</div>
	</div>

	<form class="cta__form" method="post" action="" onsubmit="event.preventDefault()">
		<?php wp_nonce_field( 'noordev_cta', 'noordev_cta_nonce' ); ?>
		<div>
			<label for="nd-cta-email"><?php esc_html_e( 'Work email', 'noordev' ); ?></label>
			<input type="email" id="nd-cta-email" name="email" placeholder="jane@acme.com" autocomplete="email">
		</div>
		<div class="cta__form-row">
			<div>
				<label for="nd-cta-company"><?php esc_html_e( 'Company', 'noordev' ); ?></label>
				<input type="text" id="nd-cta-company" name="company" placeholder="Acme Industries" autocomplete="organization">
			</div>
			<div>
				<label for="nd-cta-budget"><?php esc_html_e( 'Budget', 'noordev' ); ?></label>
				<select id="nd-cta-budget" name="budget">
					<?php foreach ( $budgets as $b ) : ?>
						<option><?php echo esc_html( $b ); ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div>
			<label for="nd-cta-service"><?php esc_html_e( 'Service of interest', 'noordev' ); ?></label>
			<select id="nd-cta-service" name="service">
				<?php foreach ( $services as $s ) : ?>
					<option><?php echo esc_html( $s ); ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="submit-row">
			<small>✓ <?php esc_html_e( 'Law 25 compliant · Data stays in Canada', 'noordev' ); ?></small>
			<button type="submit" class="nd-btn nd-btn--accent"><?php esc_html_e( 'Request a quote', 'noordev' ); ?> <span class="arrow">&rarr;</span></button>
		</div>
	</form>
</section>
