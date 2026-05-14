<?php
/**
 * Noordev theme bootstrap.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'NOORDEV_VERSION', '0.1.0' );

function noordev_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'responsive-embeds' );

	register_nav_menus(
		array(
			'primary'         => __( 'Primary menu (used by mega-menu nav)', 'noordev' ),
			'footer-services' => __( 'Footer · Services', 'noordev' ),
			'footer-odoo'     => __( 'Footer · Odoo', 'noordev' ),
			'footer-security' => __( 'Footer · Security', 'noordev' ),
			'footer-legal'    => __( 'Footer · Legal', 'noordev' ),
		)
	);
}
add_action( 'after_setup_theme', 'noordev_setup' );

function noordev_assets() {
	$theme_uri = get_template_directory_uri();

	wp_enqueue_style(
		'noordev-tokens',
		$theme_uri . '/assets/css/tokens.css',
		array(),
		NOORDEV_VERSION
	);

	wp_enqueue_style(
		'noordev-marketing',
		$theme_uri . '/assets/css/marketing.css',
		array( 'noordev-tokens' ),
		NOORDEV_VERSION
	);

	// Mega-menu / primary nav.
	wp_enqueue_script(
		'noordev-nav',
		$theme_uri . '/assets/js/nav.js',
		array(),
		NOORDEV_VERSION,
		true
	);
	wp_script_add_data( 'noordev-nav', 'data', sprintf(
		'window.NOORDEV = window.NOORDEV || {}; window.NOORDEV.homeUrl = %s;',
		wp_json_encode( home_url( '/' ) )
	) );

	// Hero video controls (only on the front page).
	if ( is_front_page() ) {
		wp_enqueue_script(
			'vimeo-player',
			'https://player.vimeo.com/api/player.js',
			array(),
			null,
			true
		);
		wp_enqueue_script(
			'noordev-hero',
			$theme_uri . '/assets/js/hero-video.js',
			array( 'vimeo-player' ),
			NOORDEV_VERSION,
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'noordev_assets' );

/**
 * Helper: render a relative theme URL for an asset path.
 */
function noordev_asset( $path ) {
	return get_template_directory_uri() . '/' . ltrim( $path, '/' );
}

/**
 * Allow the announcement bar copy to be filtered without editing templates.
 */
function noordev_announcement() {
	$default = sprintf(
		/* translators: %s: comma-separated city list. */
		__( 'Now booking Q3 · <b>%s</b> · <b style="color: var(--crimson-400);">•</b> Odoo 17 migrations scheduling 6 weeks out', 'noordev' ),
		'Montreal · Toronto · Miami · Rabat'
	);
	return apply_filters( 'noordev_announcement', $default );
}
