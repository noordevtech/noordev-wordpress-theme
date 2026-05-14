<?php
/**
 * Header.
 *
 * Outputs:
 *   - <head> with WordPress hooks
 *   - opening <body class="nd-page">
 *   - the announcement bar (filterable via `noordev_announcement`)
 *
 * The primary nav (with mega-menu) is mounted by /assets/js/nav.js, which is
 * enqueued in functions.php. The script auto-inserts itself after .announce.
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
	<?php echo wp_kses_post( noordev_announcement() ); ?>
</div>
