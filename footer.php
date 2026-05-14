<?php
/**
 * Footer.
 *
 * Renders the dark navy footer with a brand column + four link columns,
 * followed by the bottom row (copyright, office phones, language).
 *
 * Each link column will use the registered nav menu if assigned in
 * Appearance → Menus; otherwise it falls back to the design defaults.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Render a footer link column. Uses a WP nav menu if assigned to $location,
 * otherwise renders the supplied $fallback array of [label => href] items.
 *
 * @param string $location WP nav menu location key.
 * @param string $heading  Column heading.
 * @param array  $fallback Default links if no menu is assigned.
 */
function noordev_footer_column( $location, $heading, array $fallback ) {
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

<footer class="footer" role="contentinfo">
	<div class="footer__inner">
		<div class="footer__top">
			<div class="footer__brand">
				<img src="<?php echo esc_url( noordev_asset( 'assets/img/logo-noordev.png' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>">
				<p class="footer__tag"><?php esc_html_e( 'Digital agency & strategy consulting. Websites, growth, and Odoo — delivered by a senior team across four cities.', 'noordev' ); ?></p>
			</div>

			<?php
			noordev_footer_column(
				'footer-services',
				__( 'Services', 'noordev' ),
				array(
					'Web design'         => '#',
					'SEO & paid media'   => '#',
					'Social media'       => '#',
					'Corporate training' => '#',
					'WordPress'          => '#',
				)
			);

			noordev_footer_column(
				'footer-odoo',
				__( 'Odoo', 'noordev' ),
				array(
					'Implementation' => '#',
					'Customization'  => '#',
					'Migration'      => '#',
					'Hosting'        => '#',
					'Support'        => '#',
				)
			);

			noordev_footer_column(
				'footer-security',
				__( 'Security', 'noordev' ),
				array(
					'ISO 27001'           => '#',
					'GRC & risk'          => '#',
					'Policy & controls'   => '#',
					'Audit prep'          => '#',
					'Security awareness'  => '#',
				)
			);

			noordev_footer_column(
				'footer-legal',
				__( 'Legal', 'noordev' ),
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
