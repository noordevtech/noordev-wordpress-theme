<?php
/**
 * Process band — four engagement steps on a subtle background.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$steps = apply_filters(
	'noordev_process_steps',
	array(
		array(
			'n'     => 'Step 01 · Week 1',
			'title' => 'Discovery',
			'body'  => 'Stakeholder interviews, an audit of what exists, and a shared definition of what success looks like at the end.',
		),
		array(
			'n'     => 'Step 02 · Week 2–3',
			'title' => 'Scope & shape',
			'body'  => 'A written proposal: scope, timeline, price, and the resources required on both sides. Nothing proceeds without sign-off.',
		),
		array(
			'n'     => 'Step 03 · Week 4–10',
			'title' => 'Design & build',
			'body'  => 'Interactive wireframes, a branded prototype, then production. You review at each stage — no 12-week reveals.',
		),
		array(
			'n'     => 'Step 04 · Launch + ongoing',
			'title' => 'Measure & improve',
			'body'  => 'Monthly analytics review. We ship improvements continuously against the metrics we agreed to in week one.',
		),
	)
);
?>
<section class="process">
	<div class="process__inner">
		<div class="section__head" style="margin-bottom: 0;">
			<div>
				<div class="section__eyebrow"><?php esc_html_e( 'How we work', 'noordev' ); ?></div>
				<h2 class="section__title"><?php esc_html_e( 'A disciplined, senior-led', 'noordev' ); ?> <span class="italic"><?php esc_html_e( 'engagement', 'noordev' ); ?></span> &mdash; <?php esc_html_e( 'no surprises.', 'noordev' ); ?></h2>
			</div>
			<p class="section__body">
				<?php esc_html_e( 'Weekly checkpoints, a transparent statement of work, and one point of contact throughout. Your team is always one level away from a decision-maker.', 'noordev' ); ?>
			</p>
		</div>
		<div class="process__grid">
			<?php foreach ( $steps as $step ) : ?>
				<div class="step">
					<div class="step__n"><?php echo esc_html( $step['n'] ); ?></div>
					<h4 class="step__title"><?php echo esc_html( $step['title'] ); ?></h4>
					<p class="step__body"><?php echo esc_html( $step['body'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
