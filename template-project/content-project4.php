<?php
$thumbsize = !isset($thumbsize) ? 'rekon-project-large' : $thumbsize;
?>
<article <?php post_class('project-style4'); ?>>	
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="project-thumb">
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
				<?php the_post_thumbnail( $thumbsize, array( 'alt' => get_the_title() ) ); ?>
			</a>
		</div>
	<?php } ?>
	<div class="project-content-box">
		<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
		
		<?php if ( has_excerpt() ) { ?>
			<div class="description"><?php echo rekon_substring( get_the_excerpt(), 30, '...' ); ?></div>
		<?php } ?>

		<div class="project-button">
			<a class="btn-project" href="<?php the_permalink(); ?>" aria-hidden="true">
				<?php esc_html_e('Read More', 'rekon'); ?>
			</a>
		</div>
	</div>
</article>
