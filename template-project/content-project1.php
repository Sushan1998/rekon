<?php
global $post;
$thumbsize = !isset($thumbsize) ? 'rekon-blog-grid' : $thumbsize;
?>
<article <?php post_class('project-style1'); ?>>
	<div class="project-container">
		<div class="project-box">
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="project-thumb">
					<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
						<?php the_post_thumbnail( $thumbsize, array( 'alt' => get_the_title() ) ); ?>
					</a>
				</div>
			<?php } ?>
			<div class="project-content-box">
				<div class="project-content-box-content">
					<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>		
					<div class="description"><?php echo rekon_substring( get_the_excerpt(),12, '' ); ?></div>	
				</div>
			</div>
		</div>
	</div>
</article>