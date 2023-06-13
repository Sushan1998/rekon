<?php
$thumbsize = !isset($thumbsize) ? 'large' : $thumbsize;
?>
<article <?php post_class('team-style'); ?>>	
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="team-image">
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
				<?php the_post_thumbnail( $thumbsize, array( 'alt' => get_the_title() ) ); ?>
			</a>
		</div>
	<?php } ?>
	<div class="content">
		<div class="team-content-info">
			<?php the_title( '<h3 class="name-team"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>		
			<?php
			$job = get_post_meta( $post->ID, APUS_REKON_TEAM_PREFIX.'job', true );
			if ( !empty($job) ) { ?>
				<div class="team-job"><?php echo trim($job); ?></div>
			<?php } ?>
		</div>

		<?php
		$socials = get_post_meta( $post->ID, APUS_REKON_TEAM_PREFIX.'socials', true );
		if ( !empty($socials) ) {
		    ?>
		    <div class="social-info">
		        <ul class="social">
		            <?php foreach ($socials as $social) {
		                if ( !empty($social['network']) && !empty($social['url']) ) {
		            ?>
			            <li><a href="<?php echo esc_url($social['url']); ?>"><i class="fab fa-<?php echo esc_attr($social['network']); ?>"></i></a></li>
			            <?php } ?>
		            <?php } ?>
		        </ul>
		    </div>
	    <?php } ?>
	</div>
</article>