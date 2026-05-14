<?php
/**
 * Fallback template.
 *
 * On any non–front-page request that doesn't have a more specific template,
 * we render the marketing site sections so the design is always available
 * while the rest of the theme grows.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

if ( have_posts() && ! is_front_page() && ! is_home() ) {
	echo '<main class="section">';
	while ( have_posts() ) {
		the_post();
		echo '<article ' . get_post_class( 'nd-post' ) . '>';
		echo '<h1 class="section__title">' . esc_html( get_the_title() ) . '</h1>';
		echo '<div class="nd-post__content">';
		the_content();
		echo '</div>';
		echo '</article>';
	}
	echo '</main>';
} else {
	get_template_part( 'template-parts/hero' );
	get_template_part( 'template-parts/marquee' );
	get_template_part( 'template-parts/services' );
	get_template_part( 'template-parts/case-study' );
	get_template_part( 'template-parts/process' );
	get_template_part( 'template-parts/cta' );
}

get_footer();
