<?php get_header(); ?>

<?php if ( is_home() && get_option('aggregate_featured') == 'on' ) include(TEMPLATEPATH . '/includes/featured.php'); ?>

<?php if ( is_active_sidebar( 'homepage-recentfrom-area-1' ) || is_active_sidebar( 'homepage-recentfrom-area-2' ) || is_active_sidebar( 'homepage-recentfrom-area-3' ) ) { ?>
	<?php if ( is_active_sidebar( 'homepage-recentfrom-area-1' ) && !dynamic_sidebar('homepage-recentfrom-area-1') ) : ?> 
	<?php endif; ?>
	
	<?php if ( is_active_sidebar( 'homepage-recentfrom-area-2' ) && !dynamic_sidebar('homepage-recentfrom-area-2') ) : ?> 
	<?php endif; ?>
	
	<?php if ( is_active_sidebar( 'homepage-recentfrom-area-3' ) && !dynamic_sidebar('homepage-recentfrom-area-3') ) : ?> 
	<?php endif; ?>
	
	<div class="clear"></div>
<?php } ?>


<div id="main-content" class="clearfix">
	<div id="left-area">
		<h4 class="main-title"><?php _e('Most Recent Articles','Aggregate'); ?></h4>
		<div id="entries">
			<?php
				$args=array(
					'showposts'=>get_option('aggregate_homepage_posts'),
					'paged'=>$paged,
					'category__not_in' => get_option('aggregate_exlcats_recent'),
				);
				if (get_option('aggregate_duplicate') == 'false') $args['post__not_in'] = $ids;
				query_posts($args);
				global $paged;
				$i = 0;
			?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php include(TEMPLATEPATH . '/includes/entry.php'); ?>
			<?php endwhile; ?>
				<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
				else { ?>
					 <?php include(TEMPLATEPATH . '/includes/navigation.php'); ?>
				<?php } ?>
			<?php else : ?>
				<?php include(TEMPLATEPATH . '/includes/no-results.php'); ?>
			<?php endif; wp_reset_query(); ?>
		</div> <!-- end #entries -->
	</div> <!-- end #left-area -->
	
	<?php if ( is_active_sidebar( 'homepage-sidebar' ) ) { ?>
		<div id="sidebar">
			<?php if ( !dynamic_sidebar('homepage-sidebar') ) : ?>
			<?php endif; ?>
		</div> <!-- #sidebar -->
	<?php } else { ?>
		<?php get_sidebar(); ?>
	<?php } ?>
<?php get_footer(); ?>
