<?php
/**
 * Template Name: Noordev — Contact
 *
 * Engagement form + direct lines + hours panel.
 *
 * The form posts back to itself via WordPress admin-post hooks. A plugin like
 * CF7/WPForms can replace this markup later; until then the handler in
 * functions.php emails the submission to admin and redirects with a flash.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$status = isset( $_GET['sent'] ) ? sanitize_key( wp_unslash( $_GET['sent'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- read-only flash
?>

<main id="content" class="site-main" role="main">

	<section class="page-hero">
		<div class="page-hero__inner">
			<div>
				<div class="page-hero__crumbs">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Noordev', 'noordev-child' ); ?></a>
					<span class="sep">/</span>
					<span><?php esc_html_e( 'Contact', 'noordev-child' ); ?></span>
				</div>
				<div class="page-hero__eyebrow"><?php esc_html_e( 'Get in touch', 'noordev-child' ); ?></div>
				<h1>
					<?php esc_html_e( 'Tell us about', 'noordev-child' ); ?><br>
					<span class="italic"><?php esc_html_e( 'the engagement', 'noordev-child' ); ?></span><span class="accent-dot" aria-hidden="true"></span>
				</h1>
			</div>
			<div>
				<p class="page-hero__lede"><?php esc_html_e( 'A short note is enough to start. A partner reads every inbound within one business day, in any of the four time zones we operate in. Existing clients should go straight to their account channel.', 'noordev-child' ); ?></p>
				<div class="page-hero__meta">
					<div class="page-hero__meta-item"><div class="l"><?php esc_html_e( 'First reply', 'noordev-child' ); ?></div><div class="v">&lt; 1 biz day</div></div>
					<div class="page-hero__meta-item"><div class="l"><?php esc_html_e( 'Read by', 'noordev-child' ); ?></div><div class="v"><?php esc_html_e( 'A partner', 'noordev-child' ); ?></div></div>
					<div class="page-hero__meta-item"><div class="l"><?php esc_html_e( 'Time zones', 'noordev-child' ); ?></div><div class="v">ET · PT · WET</div></div>
				</div>
			</div>
		</div>
	</section>

	<div class="contact">
		<form class="contact__form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="noordev_contact_submit">
			<?php wp_nonce_field( 'noordev_contact', 'noordev_contact_nonce' ); ?>
			<input type="hidden" name="noordev_redirect" value="<?php echo esc_url( get_permalink() ); ?>">
			<input type="text" name="noordev_company_url" value="" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;width:1px;height:1px;opacity:0;" aria-hidden="true">

			<div class="contact__form-label"><?php esc_html_e( 'Project brief', 'noordev-child' ); ?></div>
			<h2><?php esc_html_e( 'Start with the', 'noordev-child' ); ?> <span class="italic"><?php esc_html_e( 'shortest version', 'noordev-child' ); ?></span></h2>
			<p class="contact__form-lede"><?php esc_html_e( 'Two paragraphs and a deadline beats a 30-page RFP. We will follow up with the right questions once we know who is on the other end.', 'noordev-child' ); ?></p>

			<?php if ( 'ok' === $status ) : ?>
				<div role="status" style="margin: 0 0 24px; padding: 16px 18px; border-radius: var(--radius-sm); background: rgba(15,138,95,0.08); border: 1px solid rgba(15,138,95,0.25); color: var(--signal-success); font-size: var(--text-sm);">
					<?php esc_html_e( 'Thanks — your brief is in. A partner will reply within one business day.', 'noordev-child' ); ?>
				</div>
			<?php elseif ( 'err' === $status ) : ?>
				<div role="alert" style="margin: 0 0 24px; padding: 16px 18px; border-radius: var(--radius-sm); background: rgba(207,29,59,0.06); border: 1px solid rgba(207,29,59,0.25); color: var(--crimson-700); font-size: var(--text-sm);">
					<?php esc_html_e( 'Something went wrong. Please email hello@noordev.com directly.', 'noordev-child' ); ?>
				</div>
			<?php endif; ?>

			<div class="contact__row">
				<div class="contact__field">
					<label for="nd-name"><?php esc_html_e( 'Name', 'noordev-child' ); ?><span class="req">*</span></label>
					<input id="nd-name" type="text" name="name" required autocomplete="name">
				</div>
				<div class="contact__field">
					<label for="nd-company"><?php esc_html_e( 'Company', 'noordev-child' ); ?></label>
					<input id="nd-company" type="text" name="company" autocomplete="organization">
				</div>
			</div>

			<div class="contact__row">
				<div class="contact__field">
					<label for="nd-email"><?php esc_html_e( 'Work email', 'noordev-child' ); ?><span class="req">*</span></label>
					<input id="nd-email" type="email" name="email" required autocomplete="email">
				</div>
				<div class="contact__field">
					<label for="nd-phone"><?php esc_html_e( 'Phone', 'noordev-child' ); ?></label>
					<input id="nd-phone" type="tel" name="phone" autocomplete="tel">
				</div>
			</div>

			<div class="contact__row contact__row--single">
				<div class="contact__field">
					<label><?php esc_html_e( 'Discipline', 'noordev-child' ); ?></label>
					<div class="contact__pills" role="radiogroup" aria-label="<?php esc_attr_e( 'Discipline', 'noordev-child' ); ?>">
						<?php
						$disciplines = array(
							'web'      => __( 'Web & growth', 'noordev-child' ),
							'odoo'     => __( 'Odoo', 'noordev-child' ),
							'security' => __( 'Security', 'noordev-child' ),
							'other'    => __( 'Not sure yet', 'noordev-child' ),
						);
						foreach ( $disciplines as $val => $label ) :
							?>
							<label class="contact__pill">
								<input type="radio" name="discipline" value="<?php echo esc_attr( $val ); ?>"<?php checked( 'web', $val ); ?>>
								<?php echo esc_html( $label ); ?>
							</label>
						<?php endforeach; ?>
					</div>
				</div>
			</div>

			<div class="contact__row contact__row--single">
				<div class="contact__field">
					<label><?php esc_html_e( 'Budget range', 'noordev-child' ); ?></label>
					<div class="contact__pills" role="radiogroup" aria-label="<?php esc_attr_e( 'Budget range', 'noordev-child' ); ?>">
						<?php
						$budgets = array(
							'25-50'  => '$25–50k',
							'50-150' => '$50–150k',
							'150+'   => '$150k+',
							'unsure' => __( 'Not sure yet', 'noordev-child' ),
						);
						foreach ( $budgets as $val => $label ) :
							?>
							<label class="contact__pill">
								<input type="radio" name="budget" value="<?php echo esc_attr( $val ); ?>"<?php checked( '50-150', $val ); ?>>
								<?php echo esc_html( $label ); ?>
							</label>
						<?php endforeach; ?>
					</div>
				</div>
			</div>

			<div class="contact__row contact__row--single">
				<div class="contact__field">
					<label for="nd-msg"><?php esc_html_e( 'Tell us about the engagement', 'noordev-child' ); ?><span class="req">*</span></label>
					<textarea id="nd-msg" name="message" required placeholder="<?php esc_attr_e( 'What is the problem, what does success look like, and is there a deadline we should know about?', 'noordev-child' ); ?>"></textarea>
				</div>
			</div>

			<div class="contact__submit-row">
				<p class="contact__small"><?php esc_html_e( 'By submitting, you agree to our privacy policy. We will only use your details to reply to this enquiry.', 'noordev-child' ); ?></p>
				<button type="submit" class="nd-btn nd-btn--accent nd-btn--lg">
					<?php esc_html_e( 'Send brief', 'noordev-child' ); ?>
					<svg class="arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
				</button>
			</div>
		</form>

		<aside class="contact__side" aria-label="<?php esc_attr_e( 'Other ways to reach us', 'noordev-child' ); ?>">
			<div class="contact__side-block">
				<h3><?php esc_html_e( 'Direct lines', 'noordev-child' ); ?></h3>
				<div class="contact__direct">
					<div class="contact__line">
						<span class="city"><?php esc_html_e( 'Montréal · Toronto', 'noordev-child' ); ?></span>
						<span class="num"><a href="tel:+14509900134">(450) 990-0134</a></span>
					</div>
					<div class="contact__line">
						<span class="city"><?php esc_html_e( 'Miami', 'noordev-child' ); ?></span>
						<span class="num"><a href="tel:+18774774146">(877) 477-4146</a></span>
					</div>
					<div class="contact__line">
						<span class="city"><?php esc_html_e( 'Rabat', 'noordev-child' ); ?></span>
						<span class="num"><a href="tel:+212661863992">0661 86 39 92</a></span>
					</div>
					<div class="contact__line">
						<span class="city"><?php esc_html_e( 'Email', 'noordev-child' ); ?></span>
						<span class="num"><a href="mailto:hello@noordev.com">hello@noordev.com</a></span>
					</div>
				</div>
			</div>

			<div class="contact__side-block">
				<h3><?php esc_html_e( 'Office hours', 'noordev-child' ); ?></h3>
				<ul class="contact__hours-list">
					<li><span><?php esc_html_e( 'Monday – Thursday', 'noordev-child' ); ?></span><b>9:00 – 18:00</b></li>
					<li><span><?php esc_html_e( 'Friday', 'noordev-child' ); ?></span><b>9:00 – 16:00</b></li>
					<li><span><?php esc_html_e( 'Weekend', 'noordev-child' ); ?></span><b><?php esc_html_e( 'On-call only', 'noordev-child' ); ?></b></li>
				</ul>
			</div>

			<div class="contact__sla">
				<p>
					<b><?php esc_html_e( 'Existing client?', 'noordev-child' ); ?></b>
					<?php esc_html_e( 'Skip the form — use your account channel for an SLA-tracked reply. New enquiries get a first read within one business day, anywhere on the planet.', 'noordev-child' ); ?>
				</p>
			</div>
		</aside>
	</div>

</main>

<?php
get_footer();
