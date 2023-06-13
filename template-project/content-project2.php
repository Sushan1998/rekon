<?php
$thumbsize = !isset($thumbsize) ? 'rekon-blog-grid' : $thumbsize;
?>
<article <?php post_class('project-style2'); ?>>	
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="project-thumb">
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
				<?php the_post_thumbnail( $thumbsize, array( 'alt' => get_the_title() ) ); ?>
			</a>
		</div>
	<?php } ?>

	<div class="project-content-box">
		<div class="project-content-box-content">
			<?php
			$icon = get_post_meta( $post->ID, APUS_REKON_PREFIX.'icon', true );
			if ( $icon ) {
				?>
				<div class="project-icon"><i class="<?php echo esc_attr($icon); ?>"></i></div>
				<?php
			}
			?>
			<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>		
			<div class="project-button">
				<a class="btn-link-more" href="<?php the_permalink(); ?>" aria-hidden="true">
					<?php esc_html_e('Read More', 'rekon'); ?>
				</a>
			</div>
		</div>
	</div>
</article>