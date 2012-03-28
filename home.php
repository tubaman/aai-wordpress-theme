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
	
	<?php if ( is_active_sidebar( 'homepage-sidebar' ) ) { ?>
		<div id="sidebar">
			<?php if ( !dynamic_sidebar('homepage-sidebar') ) : ?>
			<?php endif; ?>
		</div> <!-- #sidebar -->
	<?php } else { ?>
		<?php get_sidebar(); ?>
	<?php } ?>
<?php get_footer(); ?>
