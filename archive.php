<?php if ( ! empty( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) == 'xmlhttprequest' && get_query_var( 'paged' ) ) : ?>
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'blocks/content-teaser', get_post_type() ); ?>
		<?php endwhile; ?>
		<?php if ( $next = get_next_posts_link( '' ) ) : ?>
			<a class="load-more" href="<?php echo next_posts(); ?>"><?php _e( 'Load more', 'base' ); ?></a>
		<?php endif; ?>
	<?php endif; ?>
<?php else: ?>
<?php get_header(); ?>
	<div id="content">
		<?php if ( have_posts() ) : ?>
			<div class="load-more-holder">
				<div class="title">
					<?php the_archive_title( '<h1>', '</h1>' ); ?>
				</div>
				<div class="new-content-target">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'blocks/content-teaser', get_post_type() ); ?>
					<?php endwhile; ?>
				</div>
				<?php if ( $next = get_next_posts_link( '' ) ) : ?>
					<a class="load-more" href="<?php echo next_posts(); ?>"><?php _e( 'Load more', 'base' ); ?></a>
				<?php endif; ?>
			</div>
		<?php else: ?>
			<?php get_template_part( 'blocks/not_found' ); ?>
		<?php endif; ?>
	</div>
<?php get_footer(); ?>
<?php endif; ?>