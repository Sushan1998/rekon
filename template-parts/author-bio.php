<?php  
$description = get_the_author_meta( 'description' );
?>
<?php if(!empty($description)){ ?>
<div class="author-info">
	<div class="about-container media flex-middle">
		<div class="avatar-img media-left hidden-xs">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ),125 ); ?>
		</div>
		<!-- .author-avatar -->
		<div class="description media-body margin-bottom-0">
			<h4 class="author-title">
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
					<?php echo get_the_author(); ?>
				</a>
			</h4>
			<?php the_author_meta( 'description' ); ?>
		</div>
	</div>
</div>
<?php } ?>