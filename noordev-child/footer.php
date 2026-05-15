<?php
/**
 * Footer — Noordev Child.
 *
 * Renders the dark navy footer (brand column + four link columns + bottom row)
 * and overrides Hello Elementor's footer.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Render a footer column. Uses a registered nav menu if one is assigned to
 * $location; otherwise falls back to the design defaults in $fallback.
 *
 * @param string $location WordPress nav-menu location key.
 * @param string $heading  Column heading.
 * @param array  $fallback Map of [label => href] for the default links.
 */
function noordev_child_footer_column( $location, $heading, array $fallback ) {
	echo '<div class="footer__col">';
	echo '<h5>' . esc_html( $heading ) . '</h5>';

	if ( has_nav_menu( $location ) ) {
		wp_nav_menu(
			array(
				'theme_location' => $location,
				'container'      => false,
				'menu_class'     => '',
				'fallback_cb'    => false,
				'depth'          => 1,
				'items_wrap'     => '<ul>%3$s</ul>',
			)
		);
	} else {
		echo '<ul>';
		foreach ( $fallback as $label => $href ) {
			printf(
				'<li><a href="%s">%s</a></li>',
				esc_url( $href ),
				esc_html( $label )
			);
		}
		echo '</ul>';
	}
	echo '</div>';
}
?>

<?php
/*
 * Defer to Elementor Pro Theme Builder if a template is assigned to the
 * `footer` location. Otherwise render the bundled dark navy footer below.
 */
if ( function_exists( 'noordev_child_do_elementor_location' ) && noordev_child_do_elementor_location( 'footer' ) ) :
	wp_footer();
	?>
	</body>
	</html>
	<?php
	return;
endif;
?>

<footer class="footer" role="contentinfo">
	<div class="footer__inner">
		<div class="footer__top">
			<div class="footer__brand">
				<img src="<?php echo esc_url( noordev_child_asset( 'assets/img/logo-noordev.png' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>">
				<p class="footer__tag"><?php esc_html_e( 'Digital agency & strategy consulting. Websites, growth, and Odoo — delivered by a senior team across four cities.', 'noordev-child' ); ?></p>
			</div>

			<?php
			noordev_child_footer_column(
				'footer-services',
				__( 'Services', 'noordev-child' ),
				array(
					'Web design'         => '#',
					'SEO & paid media'   => '#',
					'Social media'       => '#',
					'Corporate training' => '#',
					'WordPress'          => '#',
				)
			);

			noordev_child_footer_column(
				'footer-odoo',
				__( 'Odoo', 'noordev-child' ),
				array(
					'Implementation' => '#',
					'Customization'  => '#',
					'Migration'      => '#',
					'Hosting'        => '#',
					'Support'        => '#',
				)
			);

			noordev_child_footer_column(
				'footer-security',
				__( 'Security', 'noordev-child' ),
				array(
					'ISO 27001'           => '#',
					'GRC & risk'          => '#',
					'Policy & controls'   => '#',
					'Audit prep'          => '#',
					'Security awareness'  => '#',
				)
			);

			noordev_child_footer_column(
				'footer-legal',
				__( 'Legal', 'noordev-child' ),
				array(
					'Privacy policy'    => '#',
					'Law 25'            => '#',
					'Terms of service'  => '#',
					'Cookie policy'     => '#',
				)
			);
			?>
		</div>

		<div class="footer__bottom">
			<div>&copy; <?php bloginfo( 'name' ); ?> &middot; 2012&ndash;<?php echo esc_html( date_i18n( 'Y' ) ); ?></div>
			<div class="locs">
				<span><b>Montr&eacute;al-Toronto</b>(450) 990-0134</span>
				<span><b>Miami</b>(877) 477-4146</span>
				<span><b>Rabat</b>0661 86 39 92</span>
			</div>
			<div class="lang"><b>EN</b> &middot; FR</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
