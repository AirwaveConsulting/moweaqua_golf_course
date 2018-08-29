<?php
// THE FRONT-PAGE.PHP FILE
// MAY 2018 AIRWAVE CONSULTING

// consists of the hero banner and other marketing-type things

get_header();
?>

<section class="hero">
	
	<!-- HERO CONTENT WRAP (FOR CENTERING) -->
	<div class="wrap">
		
	<!-- HERO HEADER -->
	<header id="masthead">
	<h1><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png">Moweaqua Golf Course</h1>
	<nav class="topbar">
		<ul>
			<li onClick="scroll_to_section('rates');"><i class="fa fa-dollar-sign"></i>Rates</li>
			<li onClick="scroll_to_section('about');"><i class="fa fa-info-circle"></i>About</li>
			<li onClick="scroll_to_section('calendar');"><i class="fa fa-calendar"></i>Calendar</li>
			<li onClick="scroll_to_section('testimonial');"><i class="fa fa-comment"></i>Reviews</li>
			<li onClick="scroll_to_section('contact');"><i class="fa fa-phone"></i>Contact</li>
		</ul>
	</nav>
	</header>
	<!-- END HEADER -->
	
	<!-- MAIN HERO CONTENT -->
	<div class="content">
	
	<!-- MAIN TEXT CALLOUT -->
	<div class="main_text">
	<div class="contact_box">
	Head Professional: Brad Burcham&nbsp;&nbsp;&mdash;&nbsp;&nbsp;217-768-3411&nbsp;&nbsp;&mdash;&nbsp;&nbsp;2598 E 1900 N RD, Moweaqua, IL
	</div>
	Welcome to Moweaqua Golf Course, located one mile west of Moweaqua, Illinois.  Moweaqua is a public 18 hole golf course that is a great course for golfers of all abilities, as it offers four sets of tees and a maximum yardage of 6,300 yards.  The course is a popular site for golf outings and features a driving range, pro shop, and snack bar.
	</div>
	<!-- END MAIN TEXT -->
	
	<!-- ACTION BUTTONS CALLOUT -->
<!--
	<div class="action_buttons">
	<div class="button">
	<span>BOOK&nbsp;&nbsp;A<br>TEE TIME</span><i class="fa fa-arrow-circle-right"></i>
	</div>
	<div class="button">
	<span>BOOK&nbsp;AN<br>OUTING</span><i class="fa fa-arrow-circle-right"></i>
	</div>
	</div>
-->
	<!-- END ACTION BUTTONS -->
	
	</div>
	<!-- END CONTENT -->
	
	</div>
	<!-- END CONTENT WRAP -->
	
	<div class="nav_callout">
		View More Information<i class="fa fa-angle-down"></i>
	</div>
	
</section>

<section class="deals">
	<div class="left">
		<h1><?php the_field('deals_left_side_title'); ?></h1>
		<p><?php the_field('deals_left_side_text'); ?></p>
	</div>
	<div class="right">
		<h1><?php the_field('deals_right_side_title'); ?></h1>
		<p><?php the_field('deals_right_side_text'); ?></p>
	</div>
</section>

<section id="rates" class="rates">
	<h1>2018 Course Rates</h1>
	<ul class="box">
	<?php
	// get the categories
	$cats = get_categories();
	foreach($cats as $cat){
		echo '<li class="unit">';
		echo '<h2>' . $cat->name . '</h2>';
		echo '<ul>';
		
		// get posts for the cat
		$posts = get_posts(array('category' => $cat->term_id));
		foreach($posts as $post){
			echo '<li><span class="first">' . $post->post_title . '</span><span>' . $post->post_content . '</span></li>';
		}
		
		echo '</ul>';
		if($cat->description != ''){
			echo '<span class="note">' . $cat->description . '</span>';
		}
		echo '</li>';
	}	
	wp_reset_postdata();
	?>
	</ul>
</section>

<section id="about" class="about">
	<h1><?php the_field('about_content_area_title'); ?></h1>
	<?php the_field('about_content_area_content'); ?>
</section>

<section id="calendar" class="calendar">
<h1>Course Calendar</h1>
<?php echo do_shortcode('[my_calendar format="calendar" time="month" above="nav,toggle,jump,timeframe" below="none"]'); ?>
</section>

<section class="outings">
	<h1><?php the_field('outings_content_area_title'); ?></h1>
	<?php the_field('outings_content_area_content'); ?>
</section>

<section id="testimonial" class="testimonial">
	<h1>Reviews</h1>
	<ul>
	<?php
	// CUSTOM LOOP FOR REVIEWS
	$args = array(
		'post_type' => 'reviews',
		'orderby' => 'rand'	
	);
	$review_query = new WP_Query($args);
	if( $review_query->have_posts() ) :
	while( $review_query->have_posts() ) :
	$review_query->the_post();
	?>
	
	<li><?php the_content(); echo '<br>&mdash;&nbsp;&nbsp;'; the_title(); ?></li>
	
	<?php
	wp_reset_postdata();
	endwhile;
	endif;
	?>
	</ul>
</section>

<section id="contact" class="contact">
	<h1>Contact Us</h1>
	<p class="body">
	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</p>
</section>

<?php
get_footer();
?>