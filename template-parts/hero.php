<?php
/**
 * Hero section — Vimeo background, headline, CTAs, sound toggle, stats.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$vimeo_id = apply_filters( 'noordev_hero_vimeo_id', '1045372807' );

$stats = apply_filters(
	'noordev_hero_stats',
	array(
		array( 'k' => '14',   'unit' => 'yrs', 'l' => __( 'Shipping digital work', 'noordev' ) ),
		array( 'k' => '230+', 'unit' => '',    'l' => __( 'Engagements delivered', 'noordev' ) ),
		array( 'k' => '4',    'unit' => '',    'l' => __( 'Offices · 3 continents', 'noordev' ) ),
		array( 'k' => '98',   'unit' => '%',   'l' => __( 'Clients who renew', 'noordev' ) ),
	)
);
?>
<section class="hero" data-screen-label="Home Hero">
	<div class="hero__video" aria-hidden="true">
		<iframe id="hero-vimeo"
			src="<?php echo esc_url( 'https://player.vimeo.com/video/' . $vimeo_id . '?background=1&autoplay=1&loop=1&muted=1&autopause=0&controls=0&byline=0&title=0&portrait=0' ); ?>"
			allow="autoplay; fullscreen; picture-in-picture"
			loading="eager"
			title="<?php esc_attr_e( 'Noordev showreel', 'noordev' ); ?>"></iframe>
	</div>
	<div class="hero__veil" aria-hidden="true"></div>

	<div class="hero__inner">
		<div class="hero__top">
			<div class="hero__eyebrow"><b>&bull;</b> <?php esc_html_e( 'Digital agency, Odoo & cybersecurity · est. 2012', 'noordev' ); ?></div>
			<span class="hero__reel"><span class="live"></span> <?php esc_html_e( 'Showreel · Volume 14', 'noordev' ); ?></span>
		</div>

		<div class="hero__body">
			<h1>
				<?php esc_html_e( 'Build your brand,', 'noordev' ); ?><br>
				<?php esc_html_e( 'harden your operations,', 'noordev' ); ?><br>
				<span class="italic"><?php esc_html_e( 'certify', 'noordev' ); ?></span> <?php esc_html_e( 'what matters', 'noordev' ); ?><span class="accent-dot"></span>
			</h1>
			<p class="hero__lede">
				<?php esc_html_e( 'Websites, growth programs, Odoo implementations, ISO 27001 certification, and corporate training — delivered by one senior team across four cities.', 'noordev' ); ?>
			</p>
			<div class="hero__cta">
				<a class="nd-btn nd-btn--accent nd-btn--lg" href="#cta"><?php esc_html_e( 'Get a quote', 'noordev' ); ?> <span class="arrow">&rarr;</span></a>
				<a class="nd-btn nd-btn--secondary nd-btn--lg" href="#"><?php esc_html_e( 'See our work', 'noordev' ); ?></a>
				<small><?php esc_html_e( 'TYPICALLY ANSWERED IN ONE BUSINESS DAY', 'noordev' ); ?></small>
			</div>
		</div>

		<button type="button" class="hero__sound" id="hero-sound-toggle" aria-pressed="false" aria-label="<?php esc_attr_e( 'Toggle showreel sound', 'noordev' ); ?>">
			<svg viewBox="0 0 24 24" id="hero-sound-icon" aria-hidden="true"><path d="M4 9 H8 L13 4 V20 L8 15 H4 Z"/><path d="M17 8 L21 16 M21 8 L17 16"/></svg>
			<span id="hero-sound-label"><?php esc_html_e( 'Sound off', 'noordev' ); ?></span>
		</button>

		<div class="hero__stats">
			<?php foreach ( $stats as $stat ) : ?>
				<div class="hero__stat">
					<div class="k"><?php echo esc_html( $stat['k'] ); ?><?php if ( ! empty( $stat['unit'] ) ) : ?><span class="unit"><?php echo esc_html( $stat['unit'] ); ?></span><?php endif; ?></div>
					<div class="l"><?php echo esc_html( $stat['l'] ); ?></div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
