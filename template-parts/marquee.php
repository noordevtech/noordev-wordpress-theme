<?php
/**
 * Trust marquee — certified-partner row beneath the hero.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$logos = apply_filters(
	'noordev_marquee_logos',
	array( 'Google Partner', 'Amazon Ads', 'Meta Business', 'Odoo Ready', 'Shopify Plus' )
);
?>
<div class="marquee">
	<div class="marquee__inner">
		<div class="marquee__label"><?php esc_html_e( 'Certified partners', 'noordev' ); ?> ↗</div>
		<div class="marquee__logos">
			<?php foreach ( $logos as $logo ) : ?>
				<span><?php echo esc_html( $logo ); ?></span>
			<?php endforeach; ?>
		</div>
	</div>
</div>
