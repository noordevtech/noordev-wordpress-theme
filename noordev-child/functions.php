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

	// 5) Inner pages (Services / Case studies / About / Contact).
	//    `inner-pages.css` is shared scaffolding (page hero, rail, deflist, chips).
	//    Each page template adds its own stylesheet on top.
	$inner_template = noordev_child_inner_page_template();
	if ( $inner_template ) {
		wp_enqueue_style(
			'noordev-inner-pages',
			$child_uri . '/assets/css/inner-pages.css',
			array( 'noordev-global' ),
			NOORDEV_CHILD_VERSION
		);
		wp_enqueue_style(
			'noordev-' . $inner_template,
			$child_uri . '/assets/css/page-' . $inner_template . '.css',
			array( 'noordev-inner-pages' ),
			NOORDEV_CHILD_VERSION
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
 * Map the current page to its inner-page CSS slug by post slug.
 *
 * Returns one of 'services' | 'case-studies' | 'about' | 'contact', or '' if
 * the current page does not match. Detection is by post slug — the inner
 * pages are imported as Elementor templates, so there is no PHP template to
 * key off of.
 */
function noordev_child_inner_page_template() {
	if ( ! is_page() ) {
		return '';
	}
	$post = get_queried_object();
	if ( ! $post || empty( $post->post_name ) ) {
		return '';
	}
	$slug_map = array(
		'services'     => 'services',
		'case-studies' => 'case-studies',
		'work'         => 'case-studies',
		'about'        => 'about',
		'contact'      => 'contact',
		'security'     => 'security',
	);
	return isset( $slug_map[ $post->post_name ] ) ? $slug_map[ $post->post_name ] : '';
}

/**
 * Register Elementor Pro Theme Builder locations.
 *
 * Lets the user build the site Header and Footer (and add new pages of each
 * to specific URLs) inside Elementor instead of editing PHP. The child's
 * header.php / footer.php call `noordev_child_do_elementor_location()` and
 * fall back to the bundled markup when no Elementor template targets the
 * location.
 */
function noordev_child_register_elementor_locations( $manager ) {
	$manager->register_location( 'header' );
	$manager->register_location( 'footer' );
}
add_action( 'elementor/theme/register_locations', 'noordev_child_register_elementor_locations' );

/**
 * Render an Elementor Pro Theme Builder location, returning true when a
 * matching template was found and rendered.
 *
 * Wraps the public helper `elementor_theme_do_location()` so we keep working
 * if the helper is missing or renamed (Elementor Pro 4.x reshuffles a lot of
 * internals). Falls through the class-based API as a backup.
 *
 * @param string $location Registered location slug (e.g. 'header', 'footer').
 * @return bool True if Elementor rendered a template for this location.
 */
function noordev_child_do_elementor_location( $location ) {
	if ( function_exists( 'elementor_theme_do_location' ) ) {
		return (bool) elementor_theme_do_location( $location );
	}
	if ( class_exists( '\\ElementorPro\\Modules\\ThemeBuilder\\Module' ) ) {
		$module = \ElementorPro\Modules\ThemeBuilder\Module::instance();
		if ( $module && method_exists( $module, 'get_locations_manager' ) ) {
			$manager = $module->get_locations_manager();
			if ( $manager && method_exists( $manager, 'do_location' ) ) {
				return (bool) $manager->do_location( $location );
			}
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
