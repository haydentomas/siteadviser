<?php /* Template Name: Home */ 
get_header();
?>



<div class="portfolio">

<?php
  $args = array(
    'post_type'=>'Portfolio', 
    'orderby'=>'rand', 
    'posts_per_page'=>'2'
  );

  $testimonials=new WP_Query($args);

  while ($testimonials->have_posts()) : $testimonials->the_post(); 
?>

<div class="pitem">
<div class="excerpt">
<a href="<?php the_field( 'page_url' ); ?>"><?php the_post_thumbnail(); ?></a>
	<h2><a href="<?php the_field( 'page_url' ); ?>"><?php the_title(); // or the_content(); ?></a></h2>
	<?php the_excerpt(); // or the_content(); ?> <a href="<?php the_field( 'page_url' ); ?>">View project...</a>
	
	</div>

</div>
	

<?php 
  endwhile;
  wp_reset_postdata();
?>
</div>






<?php
  $args = array(
    'post_type'=>'testimonials', 
    'orderby'=>'rand', 
    'posts_per_page'=>'1'
  );

  $testimonials=new WP_Query($args);

  while ($testimonials->have_posts()) : $testimonials->the_post(); 
?>
<div class="testimonial">
	<div class="excerpt">
	<?php the_excerpt(); // or the_content(); ?>
	</div>
<div class="details">
<div class="author">
	<?php the_post_thumbnail(); ?>
	</div>
	<div class="details">
	<p><?php the_field( 'name' ); ?></p>
	<p><a href="<?php the_field( 'website_address' ); ?>" target="_blank"><?php the_field( 'url_display' ); ?></a></p>
	</div>
</div>
	
</div>
<?php 
  endwhile;
  wp_reset_postdata();
?>

<div class="postgrid">
		<?php // Display blog posts on any page @ https://m0n.co/l
		$temp = $wp_query; $wp_query= null;
		$wp_query = new WP_Query(); $wp_query->query('posts_per_page=3' . '&paged='.$paged);
		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		<article>
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
		<h4 class="para">Found in: <?php the_category(); ?></h4>
		<h2><a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></h2>
	
		<?php the_excerpt(); ?>
		</article>
		<?php endwhile; ?>

		<?php if ($paged > 1) { ?>

		<nav id="nav-posts">
			<div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
			<div class="next"><?php previous_posts_link('Newer Posts &raquo;'); ?></div>
		</nav>

		<?php } else { ?>

		<nav id="nav-posts">
			<div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
		</nav>

		<?php } ?>

		<?php wp_reset_postdata(); ?>

	
</div>
	
<?php

get_footer();
