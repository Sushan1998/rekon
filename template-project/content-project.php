<?php
global $post;
$thumbsize = !empty($thumbsize) ? $thumbsize : 'rekon-blog-grid';
?>
<article <?php post_class('project-style project-style-default'); ?>>	
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="project-thumb">
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
				<?php the_post_thumbnail( $thumbsize ); ?>
			</a>
		</div>
	<?php } ?>
	<div class="project-content-box">
		<div class="overlay-icon">
			<a href="<?php the_permalink(); ?>">	        
				<i class="icon-apus-heart"></i>
		    </a>
		    <a href="<?php echo esc_url(get_the_post_thumbnail_url($post)); ?>" class="mfp-link">
	            <i class="icon-apus-full-screen"></i>
	        </a>
	    </div>		
	</div>
</article>