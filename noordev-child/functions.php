<?php
/**
 * Noordev Child theme bootstrap.
 *
 * - Inherits Hello Elementor.
 * - Enqueues design tokens, global styles, mega-menu nav, and the home-page
 *   stylesheet (only on the front page or any page using the imported
 *   "Noordev — Home" Elementor template).
 * - Registers nav-menu locations for the footer columns.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'NOORDEV_CHILD_VERSION', '0.1.0' );

/**
 * Theme setup — runs once on after_setup_theme.
 */
function noordev_child_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'responsive-embeds' );

	register_nav_menus(
		array(
			'primary'         => __( 'Primary menu (used by mega-menu nav)', 'noordev-child' ),
			'footer-services' => __( 'Footer · Services', 'noordev-child' ),
			'footer-odoo'     => __( 'Footer · Odoo', 'noordev-child' ),
			'footer-security' => __( 'Footer · Security', 'noordev-child' ),
			'footer-legal'    => __( 'Footer · Legal', 'noordev-child' ),
		)
	);
}
add_action( 'after_setup_theme', 'noordev_child_setup' );

/**
 * Asset URL helper.
 */
function noordev_child_asset( $path ) {
	return get_stylesheet_directory_uri() . '/' . ltrim( $path, '/' );
}

/**
 * Enqueue parent theme + child stylesheets and scripts.
 */
function noordev_child_assets() {
	$child_uri = get_stylesheet_directory_uri();

	// Hello Elementor parent.
	wp_enqueue_style(
		'hello-elementor-parent',
		get_template_directory_uri() . '/style.css',
		array(),
		NOORDEV_CHILD_VERSION
	);

	// 1) Design tokens — must load first; everything else depends on the CSS variables it defines.
	wp_enqueue_style(
		'noordev-tokens',
		$child_uri . '/assets/css/design-tokens.css',
		array( 'hello-elementor-parent' ),
		NOORDEV_CHILD_VERSION
	);

	// 2) Global — buttons, sections, marquee, footer, announcement bar.
	wp_enqueue_style(
		'noordev-global',
		$child_uri . '/assets/css/global.css',
		array( 'noordev-tokens' ),
		NOORDEV_CHILD_VERSION
	);

	// 3) Mega-menu nav (CSS extracted out of nav.js into its own stylesheet).
	wp_enqueue_style(
		'noordev-mega-menu',
		$child_uri . '/assets/css/mega-menu.css',
		array( 'noordev-tokens' ),
		NOORDEV_CHILD_VERSION
	);

	// 4) Home-page styles (hero, services grid, case study, process, CTA).
	//    Loaded on the static front page or any page named "home".
	if ( noordev_child_is_home_page() ) {
		wp_enqueue_style(
			'noordev-home-page',
			$child_uri . '/assets/css/home-page.css',
			array( 'noordev-global' ),
			NOORDEV_CHILD_VERSION
		);

		// Vimeo Player API — required for the hero showreel sound toggle.
		wp_enqueue_script(
			'vimeo-player',
			'https://player.vimeo.com/api/player.js',
			array(),
			null,
			true
		);
	}

	// Mega-menu nav script (mounts after .announce on every page).
	wp_enqueue_script(
		'noordev-nav',
		$child_uri . '/assets/js/nav.js',
		array(),
		NOORDEV_CHILD_VERSION,
		true
	);
	wp_add_inline_script(
		'noordev-nav',
		sprintf(
			'window.NOORDEV = window.NOORDEV || {}; window.NOORDEV.homeUrl = %s;',
			wp_json_encode( home_url( '/' ) )
		),
		'before'
	);
}
add_action( 'wp_enqueue_scripts', 'noordev_child_assets' );

/**
 * "Is this the home page?" — true on the static front page, the blog index,
 * any page with the slug "home", or any page using one of the recognized
 * Elementor templates we provide.
 */
function noordev_child_is_home_page() {
	if ( is_front_page() || is_home() ) {
		return true;
	}
	if ( is_page() ) {
		$post = get_queried_object();
		if ( $post && in_array( $post->post_name, array( 'home', 'noordev-home', 'home-design-v0-1' ), true ) ) {
			return true;
		}
	}
	return false;
}

/**
 * Allow the announcement bar copy to be filtered without editing templates.
 */
function noordev_child_announcement() {
	$default = sprintf(
		/* translators: %s: comma-separated city list. */
		__( 'Now booking Q3 · <b>%s</b> · <b style="color: var(--crimson-400);">•</b> Odoo 17 migrations scheduling 6 weeks out', 'noordev-child' ),
		'Montreal · Toronto · Miami · Rabat'
	);
	return apply_filters( 'noordev_child_announcement', $default );
}
