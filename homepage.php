<?php /* Template Name: Home */ 
get_header();
?>
<div class="testimonial">
<?php
  $args = array(
    'post_type'=>'testimonials', 
    'orderby'=>'rand', 
    'posts_per_page'=>'1'
  );

  $testimonials=new WP_Query($args);

  while ($testimonials->have_posts()) : $testimonials->the_post(); 
?>
    <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
	<?php the_excerpt(); // or the_content(); ?>
	<?php the_post_thumbnail(); ?>
	<?php the_field( 'name' ); ?>
	<a href="<?php the_field( 'website_address' ); ?>" target="_blank"><?php the_field( 'url_display' ); ?></a>

<?php 
  endwhile;
  wp_reset_postdata();
?>
</div>
<div class="postgrid">
		<?php // Display blog posts on any page @ https://m0n.co/l
		$temp = $wp_query; $wp_query= null;
		$wp_query = new WP_Query(); $wp_query->query('posts_per_page=3' . '&paged='.$paged);
		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		<article>
		<a href="<?php the_permalink(); ?>"><div class="img-hover-zoom--slowmo"><?php the_post_thumbnail(); ?></div></a>
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
