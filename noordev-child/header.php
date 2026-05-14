<?php
/**
 * Header — Noordev Child.
 *
 * Overrides Hello Elementor's header so we can add the announcement bar and
 * mount point for the mega-menu nav. The nav itself is injected client-side
 * by /assets/js/nav.js, which targets the `.announce` element.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'nd-page' ); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); } ?>

<div class="announce" role="status">
	<?php echo wp_kses_post( noordev_child_announcement() ); ?>
</div>
