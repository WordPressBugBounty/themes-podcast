<ul class="site-archive-posts">

	<?php 
	$i = 0; 
	while (have_posts()) : the_post(); 
	$i++;

	$classes = array('site-archive-post'); 
	
	if ( !has_post_thumbnail() ) {
		$classes[] = 'post-nothumbnail';
	} else {
		$classes[] = 'has-post-thumbnail';
	}

	?><li <?php post_class($classes); ?>>

		<div class="site-column-widget-wrapper">
			<?php if ( has_post_thumbnail() ) { ?>
			<div class="entry-thumbnail">
				<?php 
				echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
				the_post_thumbnail('post-thumbnail', array(
					'loading' => 'lazy',
					'sizes' => '(min-width: 460px) 150px, 410px'
				));
				echo '</a>'; ?>
			</div><!-- .entry-thumbnail --><?php } ?>
			<div class="entry-preview">
				<div class="entry-preview-wrapper">
					<?php echo ilovewp_helper_display_postmeta($post); ?>
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<p class="entry-excerpt"><?php echo get_the_excerpt(); ?></p>
				</div><!-- .entry-preview-wrapper -->
			</div><!-- .entry-preview -->
		</div><!-- .site-column-widget-wrapper -->

	</li><!-- .site-archive-post --><?php endwhile; ?>
	
</ul><!-- .site-archive-posts -->

<?php
the_posts_pagination();
?>