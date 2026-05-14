<?php
/**
 * Featured case study — dark navy band with quote + 4-cell metric grid.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$case = apply_filters(
	'noordev_featured_case',
	array(
		'eyebrow' => 'Case study · Meridian Bank · 2025',
		'quote'   => 'Attention to detail and creativity truly set them apart. Our site now converts at three times the rate of the old one — and the board notices.',
		'who'     => array(
			'initials' => 'JL',
			'name'     => 'Jane Lafleur',
			'title'    => 'Head of Marketing, Meridian Bank',
		),
		'cta'     => array( 'label' => 'Read the full case study', 'href' => '#' ),
		'metrics' => array(
			array( 'k' => '3.2',  'unit' => '×', 'dot' => false, 'l' => 'Conversion rate',           'delta' => '↗ vs. legacy site' ),
			array( 'k' => '0.9',  'unit' => 's', 'dot' => true,  'l' => 'Largest Contentful Paint', 'delta' => '↘ from 3.4s · p75 mobile' ),
			array( 'k' => '+187', 'unit' => '%', 'dot' => false, 'l' => 'Organic sessions',          'delta' => '↗ 12-month window' ),
			array( 'k' => '$1.2', 'unit' => 'M', 'dot' => false, 'l' => 'Pipeline attributed',       'delta' => '↗ Q1 2026' ),
		),
	)
);
?>
<section class="case">
	<div class="case__inner">
		<div>
			<div class="case__eyebrow"><?php echo esc_html( $case['eyebrow'] ); ?></div>
			<p class="case__quote"><?php echo esc_html( $case['quote'] ); ?></p>
			<div class="case__by">
				<div class="case__avatar"><?php echo esc_html( $case['who']['initials'] ); ?></div>
				<div class="case__by-who"><b><?php echo esc_html( $case['who']['name'] ); ?></b><?php echo esc_html( $case['who']['title'] ); ?></div>
			</div>
			<a class="nd-btn nd-btn--ghost-light" href="<?php echo esc_url( $case['cta']['href'] ); ?>"><?php echo esc_html( $case['cta']['label'] ); ?> <span class="arrow">&rarr;</span></a>
		</div>

		<div class="case__metrics">
			<?php foreach ( $case['metrics'] as $m ) : ?>
				<div class="case__metric">
					<div class="k"><?php echo esc_html( $m['k'] ); ?><span class="unit"><?php echo esc_html( $m['unit'] ); ?></span><?php if ( ! empty( $m['dot'] ) ) : ?><span class="dot"></span><?php endif; ?></div>
					<div class="l"><?php echo esc_html( $m['l'] ); ?></div>
					<div class="delta"><?php echo esc_html( $m['delta'] ); ?></div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
