<?php
/**
 * Template Name: Noordev — About
 *
 * Story rail, principles strip, team grid, locations strip.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$principles = array(
	array(
		'title' => __( 'Senior', 'noordev-child' ),
		'span'  => __( 'always', 'noordev-child' ),
		'body'  => __( 'No staff augmentation, no rotating juniors. The person on the kickoff is the person on the last call.', 'noordev-child' ),
	),
	array(
		'title' => __( 'Fixed scope,', 'noordev-child' ),
		'span'  => __( 'honest scope', 'noordev-child' ),
		'body'  => __( 'We will tell you what is in, what is out, and what we are not sure about. Change orders are a conversation, not a surprise.', 'noordev-child' ),
	),
	array(
		'title' => __( 'Outcomes,', 'noordev-child' ),
		'span'  => __( 'not outputs', 'noordev-child' ),
		'body'  => __( 'Every engagement carries a number we will be measured on. We will publish it monthly until it moves.', 'noordev-child' ),
	),
	array(
		'title' => __( 'Audit-grade', 'noordev-child' ),
		'span'  => __( 'by default', 'noordev-child' ),
		'body'  => __( 'Documentation, change logs, and access controls that survive a real audit — because most of our clients eventually get one.', 'noordev-child' ),
	),
);

$team = array(
	array( 'init' => 'NS', 'name' => 'Noor Sadiqi',    'role' => __( 'Managing partner', 'noordev-child' ), 'loc' => 'Montréal', 'mx' => '40%', 'my' => '40%' ),
	array( 'init' => 'AB', 'name' => 'Aïcha Bensaïd',  'role' => __( 'Design director', 'noordev-child' ),  'loc' => 'Toronto',  'mx' => '60%', 'my' => '30%' ),
	array( 'init' => 'JR', 'name' => 'Julien Roy',     'role' => __( 'Engineering lead', 'noordev-child' ), 'loc' => 'Montréal', 'mx' => '30%', 'my' => '60%' ),
	array( 'init' => 'KM', 'name' => 'Karim Mansouri', 'role' => __( 'Odoo partner', 'noordev-child' ),     'loc' => 'Rabat',    'mx' => '70%', 'my' => '50%' ),
	array( 'init' => 'EL', 'name' => 'Elena Loubet',   'role' => __( 'Security lead', 'noordev-child' ),    'loc' => 'Montréal', 'mx' => '50%', 'my' => '20%' ),
	array( 'init' => 'DR', 'name' => 'Diego Reyes',    'role' => __( 'Growth lead', 'noordev-child' ),      'loc' => 'Miami',    'mx' => '55%', 'my' => '70%' ),
	array( 'init' => 'SK', 'name' => 'Sara Khalil',    'role' => __( 'Brand & content', 'noordev-child' ),  'loc' => 'Toronto',  'mx' => '35%', 'my' => '45%' ),
	array( 'init' => 'TL', 'name' => 'Théo Lacombe',   'role' => __( 'Client partner', 'noordev-child' ),   'loc' => 'Montréal', 'mx' => '65%', 'my' => '55%' ),
);

$locations = array(
	array( 'city' => __( 'Montréal', 'noordev-child' ),       'note' => __( 'HQ', 'noordev-child' ),     'addr' => __( '475 Place d\'Armes, Suite 401, Montréal QC H2Y 2W7', 'noordev-child' ), 'phone' => '(450) 990-0134' ),
	array( 'city' => __( 'Toronto', 'noordev-child' ),         'note' => __( 'Studio', 'noordev-child' ), 'addr' => __( '20 Bay Street, Toronto ON M5J 2N8', 'noordev-child' ),                  'phone' => '(450) 990-0134' ),
	array( 'city' => __( 'Miami', 'noordev-child' ),           'note' => __( 'Office', 'noordev-child' ), 'addr' => __( '1110 Brickell Avenue, Suite 400, Miami FL 33131', 'noordev-child' ),    'phone' => '(877) 477-4146' ),
	array( 'city' => __( 'Rabat', 'noordev-child' ),           'note' => __( 'Office', 'noordev-child' ), 'addr' => __( '13 Rue Patrice Lumumba, Hassan, Rabat 10010', 'noordev-child' ),         'phone' => '0661 86 39 92' ),
);
?>

<main id="content" class="site-main" role="main">

	<section class="page-hero">
		<div class="page-hero__inner">
			<div>
				<div class="page-hero__crumbs">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Noordev', 'noordev-child' ); ?></a>
					<span class="sep">/</span>
					<span><?php esc_html_e( 'About', 'noordev-child' ); ?></span>
				</div>
				<div class="page-hero__eyebrow"><?php esc_html_e( 'Who we are', 'noordev-child' ); ?></div>
				<h1>
					<?php esc_html_e( 'A senior team', 'noordev-child' ); ?><br>
					<span class="italic"><?php esc_html_e( 'across four cities', 'noordev-child' ); ?></span><span class="accent-dot" aria-hidden="true"></span>
				</h1>
			</div>
			<div>
				<p class="page-hero__lede"><?php esc_html_e( 'Noordev is an independent digital practice founded in Montréal in 2012. We work as a single senior team across Montréal, Toronto, Miami, and Rabat — building marketing systems, Odoo platforms, and security programs for organizations that need adults in the room.', 'noordev-child' ); ?></p>
				<div class="page-hero__meta">
					<div class="page-hero__meta-item"><div class="l"><?php esc_html_e( 'Founded', 'noordev-child' ); ?></div><div class="v">2012</div></div>
					<div class="page-hero__meta-item"><div class="l"><?php esc_html_e( 'Practitioners', 'noordev-child' ); ?></div><div class="v">28</div></div>
					<div class="page-hero__meta-item"><div class="l"><?php esc_html_e( 'Cities', 'noordev-child' ); ?></div><div class="v">4</div></div>
				</div>
			</div>
		</div>
	</section>

	<section class="rail">
		<header>
			<div class="rail__label"><?php esc_html_e( 'Our story', 'noordev-child' ); ?></div>
			<h2 class="rail__title"><?php esc_html_e( 'Started in 2012.', 'noordev-child' ); ?> <span class="italic"><?php esc_html_e( 'Still independent.', 'noordev-child' ); ?></span></h2>
		</header>
		<div class="rail__body">
			<p><?php esc_html_e( 'We started Noordev to do the work most agencies had stopped doing — taking long engagements, owning operational systems, and being on call when something broke at midnight. Thirteen years in, we are still independent, still senior-led, and still small enough that you will recognize every face on the call.', 'noordev-child' ); ?></p>
			<p><?php esc_html_e( 'Our practice has grown around three disciplines that keep showing up together: the marketing surface that earns attention, the Odoo system that runs the business behind it, and the security posture that keeps both intact. We refused to specialize in only one of them because real engagements rarely give you that option.', 'noordev-child' ); ?></p>
			<p><strong><?php esc_html_e( 'We work where our clients work.', 'noordev-child' ); ?></strong> <?php esc_html_e( 'Studios in Montréal, Toronto, Miami, and Rabat let us hand work off across time zones without subcontractors and keep relationships within driving distance of every account.', 'noordev-child' ); ?></p>
		</div>
	</section>

	<section class="principles" aria-labelledby="prin-title">
		<div class="principles__inner">
			<div class="section__head" style="margin-bottom:0">
				<div>
					<div class="section__eyebrow"><?php esc_html_e( 'How we operate', 'noordev-child' ); ?></div>
					<h2 id="prin-title" class="section__title"><?php esc_html_e( 'Four principles', 'noordev-child' ); ?> <span class="italic"><?php esc_html_e( 'we will not negotiate', 'noordev-child' ); ?></span></h2>
				</div>
				<p class="section__body"><?php esc_html_e( 'Everything else is a conversation. These four are why our clients stay.', 'noordev-child' ); ?></p>
			</div>
			<div class="principles__grid">
				<?php $i = 1; foreach ( $principles as $p ) : ?>
					<article class="principle">
						<div class="principle__n">0<?php echo (int) $i; ?> &middot; <?php esc_html_e( 'Principle', 'noordev-child' ); ?></div>
						<h3 class="principle__title"><?php echo esc_html( $p['title'] ); ?> <span class="italic"><?php echo esc_html( $p['span'] ); ?></span></h3>
						<p class="principle__body"><?php echo esc_html( $p['body'] ); ?></p>
					</article>
				<?php $i++; endforeach; ?>
			</div>
		</div>
	</section>

	<section class="team" aria-labelledby="team-title">
		<div class="section__head">
			<div>
				<div class="section__eyebrow"><?php esc_html_e( 'The team', 'noordev-child' ); ?></div>
				<h2 id="team-title" class="section__title"><?php esc_html_e( 'Senior practitioners,', 'noordev-child' ); ?> <span class="italic"><?php esc_html_e( 'every seat', 'noordev-child' ); ?></span></h2>
			</div>
			<p class="section__body"><?php esc_html_e( 'A sample of the people you will actually meet. The full bench is twenty-eight strong across the four studios.', 'noordev-child' ); ?></p>
		</div>
		<div class="team__grid">
			<?php foreach ( $team as $m ) : ?>
				<div class="member">
					<div class="member__photo" aria-hidden="true" style="--mx: <?php echo esc_attr( $m['mx'] ); ?>; --my: <?php echo esc_attr( $m['my'] ); ?>;">
						<span class="member__initials"><?php echo esc_html( $m['init'] ); ?><span class="dot"></span></span>
					</div>
					<div class="member__name"><?php echo esc_html( $m['name'] ); ?></div>
					<div class="member__role"><?php echo esc_html( $m['role'] ); ?></div>
					<div class="member__loc"><?php echo esc_html( $m['loc'] ); ?></div>
				</div>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="locs-strip" aria-labelledby="locs-title">
		<div class="locs-strip__inner">
			<div class="section__head" style="margin-bottom:0">
				<div>
					<div class="section__eyebrow" style="color: var(--navy-300)"><?php esc_html_e( 'Where to find us', 'noordev-child' ); ?></div>
					<h2 id="locs-title" class="section__title" style="color: white"><?php esc_html_e( 'Four studios.', 'noordev-child' ); ?> <span class="italic" style="color: var(--navy-200)"><?php esc_html_e( 'One team', 'noordev-child' ); ?></span></h2>
				</div>
				<p class="section__body" style="color: var(--navy-300)"><?php esc_html_e( 'Hours follow the local zone, but the team is reachable from 7am Atlantic to 7pm Pacific by design.', 'noordev-child' ); ?></p>
			</div>
			<div class="locs-strip__grid">
				<?php foreach ( $locations as $l ) : ?>
					<div class="loc">
						<h3 class="loc__city"><?php echo esc_html( $l['city'] ); ?> <span class="italic">&middot; <?php echo esc_html( $l['note'] ); ?></span></h3>
						<p class="loc__addr"><?php echo esc_html( $l['addr'] ); ?></p>
						<div class="loc__phone"><?php echo esc_html( $l['phone'] ); ?></div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
