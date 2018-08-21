<?php
// THE INDEX.PHP FILE
// MAY 2018 AIRWAVE CONSULTING

get_header();

// LOOP
while(have_posts()) : the_post();
?>

<section class="main">
<?php the_title(); ?>
<?php the_content(); ?>
</section>

<?php
	
// END LOOP
endwhile;

get_footer();
?>
