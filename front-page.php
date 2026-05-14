<?php
/**
 * Front page — Noordev marketing site (mirrors 03-marketing-site.html).
 *
 * Section order:
 *   header (announcement + injected nav)
 *   hero (with Vimeo background + sound toggle)
 *   marquee (certified partners)
 *   services (8-card grid)
 *   case-study (Meridian Bank, dark)
 *   process (4 steps, subtle bg)
 *   cta (lead form)
 *   footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

get_template_part( 'template-parts/hero' );
get_template_part( 'template-parts/marquee' );
get_template_part( 'template-parts/services' );
get_template_part( 'template-parts/case-study' );
get_template_part( 'template-parts/process' );
get_template_part( 'template-parts/cta' );

get_footer();
