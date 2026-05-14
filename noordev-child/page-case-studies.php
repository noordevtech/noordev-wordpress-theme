<?php
/**
 * Template Name: Noordev — Case Studies
 *
 * Filterable index of representative engagements. Static demo content for
 * design; replace with a `case_study` CPT loop when content is ready.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$cases = array(
	array(
		'feat'      => true,
		'tag'       => __( 'Featured case', 'noordev-child' ),
		'client'    => __( 'Meridian Bank', 'noordev-child' ),
		'mark'      => 'm',
		'title'     => __( 'Rebuilding a 40-year-old bank for the way people actually move money.', 'noordev-child' ),
		'body'      => __( 'We replatformed Meridian onto a modern marketing stack and rebuilt the application funnel. 12 months in, organic-led applications are up 41% and the average decision time dropped from six days to under two.', 'noordev-child' ),
		'metrics'   => array(
			array( 'k' => '+41%',  'l' => __( 'Applications', 'noordev-child' ) ),
			array( 'k' => '1.8 d', 'l' => __( 'Decision time', 'noordev-child' ) ),
			array( 'k' => '12 mo', 'l' => __( 'Engagement', 'noordev-child' ) ),
		),
		'discipline'=> 'web',
		'industry'  => 'finance',
	),
	array(
		'client'    => __( 'Atelier Norden', 'noordev-child' ),
		'mark'      => 'a',
		'vx'        => '70%', 'vy' => '30%',
		'title'     => __( 'A direct-to-consumer brand built around a single Odoo source of truth.', 'noordev-child' ),
		'metric'    => array( 'l' => __( 'Order time', 'noordev-child' ), 'v' => '−68%' ),
		'discipline'=> 'odoo',
		'industry'  => 'retail',
	),
	array(
		'client'    => __( 'Pôle Santé Québec', 'noordev-child' ),
		'mark'      => 'p',
		'vx'        => '30%', 'vy' => '60%',
		'title'     => __( 'ISO 27001 + Law 25 readiness for a 14-clinic health network.', 'noordev-child' ),
		'metric'    => array( 'l' => __( 'Audit pass', 'noordev-child' ), 'v' => 'Stage 2' ),
		'discipline'=> 'security',
		'industry'  => 'healthcare',
	),
	array(
		'client'    => __( 'Voltaria Energy', 'noordev-child' ),
		'mark'      => 'v',
		'vx'        => '50%', 'vy' => '20%',
		'title'     => __( 'A lead engine for a B2B clean-energy installer scaling Ontario-wide.', 'noordev-child' ),
		'metric'    => array( 'l' => __( 'Qualified leads', 'noordev-child' ), 'v' => '+212%' ),
		'discipline'=> 'web',
		'industry'  => 'energy',
	),
	array(
		'client'    => __( 'Routes Verts', 'noordev-child' ),
		'mark'      => 'r',
		'vx'        => '80%', 'vy' => '70%',
		'title'     => __( 'Migration from Odoo 14 on-prem to odoo.sh, zero-downtime cutover.', 'noordev-child' ),
		'metric'    => array( 'l' => __( 'Downtime', 'noordev-child' ), 'v' => '0 min' ),
		'discipline'=> 'odoo',
		'industry'  => 'logistics',
	),
	array(
		'client'    => __( 'Studio Lumen', 'noordev-child' ),
		'mark'      => 'l',
		'vx'        => '20%', 'vy' => '50%',
		'title'     => __( 'A multilingual editorial site that finally outranks the trade press.', 'noordev-child' ),
		'metric'    => array( 'l' => __( 'Organic sessions', 'noordev-child' ), 'v' => '4.2×' ),
		'discipline'=> 'web',
		'industry'  => 'media',
	),
	array(
		'client'    => __( 'Fiducie Brun', 'noordev-child' ),
		'mark'      => 'f',
		'vx'        => '60%', 'vy' => '80%',
		'title'     => __( 'A privacy program that survived a real Law 25 incident in week two.', 'noordev-child' ),
		'metric'    => array( 'l' => __( 'Breach impact', 'noordev-child' ), 'v' => 'Contained' ),
		'discipline'=> 'security',
		'industry'  => 'finance',
	),
);

$filters = array(
	'all'      => __( 'All', 'noordev-child' ),
	'web'      => __( 'Web', 'noordev-child' ),
	'odoo'     => __( 'Odoo', 'noordev-child' ),
	'security' => __( 'Security', 'noordev-child' ),
);
?>

<main id="content" class="site-main" role="main">

	<section class="page-hero">
		<div class="page-hero__inner">
			<div>
				<div class="page-hero__crumbs">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Noordev', 'noordev-child' ); ?></a>
					<span class="sep">/</span>
					<span><?php esc_html_e( 'Case studies', 'noordev-child' ); ?></span>
				</div>
				<div class="page-hero__eyebrow"><?php esc_html_e( 'Selected work', 'noordev-child' ); ?></div>
				<h1>
					<?php esc_html_e( 'Real systems.', 'noordev-child' ); ?><br>
					<span class="italic"><?php esc_html_e( 'Measured outcomes', 'noordev-child' ); ?></span><span class="accent-dot" aria-hidden="true"></span>
				</h1>
			</div>
			<div>
				<p class="page-hero__lede"><?php esc_html_e( 'A representative slice of engagements across web, Odoo, and security. Numbers are reported by the client or pulled from their analytics — we will gladly share methodology on request.', 'noordev-child' ); ?></p>
				<div class="page-hero__meta">
					<div class="page-hero__meta-item"><div class="l"><?php esc_html_e( 'Live cases', 'noordev-child' ); ?></div><div class="v"><?php echo (int) count( $cases ); ?></div></div>
					<div class="page-hero__meta-item"><div class="l"><?php esc_html_e( 'Industries', 'noordev-child' ); ?></div><div class="v">7</div></div>
					<div class="page-hero__meta-item"><div class="l"><?php esc_html_e( 'Avg. tenure', 'noordev-child' ); ?></div><div class="v">3.4 yrs</div></div>
				</div>
			</div>
		</div>
	</section>

	<div class="cases">
		<div class="cases__filter" role="region" aria-label="<?php esc_attr_e( 'Filter case studies', 'noordev-child' ); ?>">
			<span class="cases__filter-label"><?php esc_html_e( 'Filter', 'noordev-child' ); ?></span>
			<div class="cases__filter-list" data-filter-list>
				<?php foreach ( $filters as $key => $label ) : ?>
					<button type="button" class="chip<?php echo 'all' === $key ? ' is-active' : ''; ?>" data-filter="<?php echo esc_attr( $key ); ?>" aria-pressed="<?php echo 'all' === $key ? 'true' : 'false'; ?>">
						<?php echo esc_html( $label ); ?>
					</button>
				<?php endforeach; ?>
			</div>
			<span class="cases__count"><b><?php echo (int) count( $cases ); ?></b> <?php esc_html_e( 'engagements', 'noordev-child' ); ?></span>
		</div>

		<?php foreach ( $cases as $c ) : ?>
			<?php if ( ! empty( $c['feat'] ) ) : ?>
				<a class="case-feat" href="#" data-discipline="<?php echo esc_attr( $c['discipline'] ); ?>">
					<div class="case-feat__copy">
						<div class="case-feat__tag"><?php echo esc_html( $c['tag'] ); ?></div>
						<div class="case-feat__client"><?php echo esc_html( $c['client'] ); ?></div>
						<h2 class="case-feat__title"><?php echo esc_html( $c['title'] ); ?></h2>
						<p class="case-feat__body"><?php echo esc_html( $c['body'] ); ?></p>
						<div class="case-feat__meta">
							<?php foreach ( $c['metrics'] as $m ) : ?>
								<div>
									<div class="k"><?php echo esc_html( $m['k'] ); ?></div>
									<div class="l"><?php echo esc_html( $m['l'] ); ?></div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="case-feat__visual" aria-hidden="true">
						<span class="case-feat__mark"><?php echo esc_html( $c['mark'] ); ?><span class="dot"></span></span>
					</div>
				</a>
			<?php endif; ?>
		<?php endforeach; ?>

		<div class="case-grid" data-case-grid>
			<?php foreach ( $cases as $c ) : if ( ! empty( $c['feat'] ) ) { continue; } ?>
				<a class="case-card" href="#" data-discipline="<?php echo esc_attr( $c['discipline'] ); ?>">
					<div class="case-card__visual" style="--vx: <?php echo esc_attr( $c['vx'] ); ?>; --vy: <?php echo esc_attr( $c['vy'] ); ?>;" aria-hidden="true">
						<span class="case-card__mark"><?php echo esc_html( $c['mark'] ); ?><span class="dot"></span></span>
					</div>
					<div class="case-card__body">
						<div class="case-card__client"><?php echo esc_html( $c['client'] ); ?></div>
						<h3 class="case-card__title"><?php echo esc_html( $c['title'] ); ?></h3>
						<div class="case-card__metric">
							<span><?php echo esc_html( $c['metric']['l'] ); ?></span>
							<b><?php echo esc_html( $c['metric']['v'] ); ?></b>
						</div>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
	</div>

</main>

<script>
(function(){
	var filters = document.querySelectorAll('[data-filter-list] .chip');
	var grid    = document.querySelector('[data-case-grid]');
	if ( ! filters.length || ! grid ) return;
	filters.forEach(function(btn){
		btn.addEventListener('click', function(){
			var f = btn.getAttribute('data-filter');
			filters.forEach(function(b){
				var active = b === btn;
				b.classList.toggle('is-active', active);
				b.setAttribute('aria-pressed', active ? 'true' : 'false');
			});
			grid.querySelectorAll('.case-card').forEach(function(card){
				card.style.display = ( f === 'all' || card.getAttribute('data-discipline') === f ) ? '' : 'none';
			});
		});
	});
})();
</script>

<?php
get_footer();
