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

<?php
/*
 * If Elementor Pro Theme Builder has a template assigned to the `header`
 * location, render it here. Otherwise fall back to the bundled
 * announcement bar (nav.js mounts the sticky mega-menu after it).
 */
if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) :
	?>
	<div class="announce" role="status">
		<?php echo wp_kses_post( noordev_child_announcement() ); ?>
	</div>
	<?php
endif;
?>
