<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
$sidebar_configs = rekon_get_project_layout_configs();


rekon_render_breadcrumbs();
?>
<section id="main-container" class="main-content  <?php echo apply_filters('rekon_project_content_class', 'container');?> inner">
	<?php rekon_before_content( $sidebar_configs ); ?>
	<div class="row">
		<?php rekon_display_sidebar_left( $sidebar_configs ); ?>

		<div id="main-content" class="col-sm-12 <?php echo esc_attr($sidebar_configs['main']['class']); ?>">
			<main id="main" class="site-main detail-project <?php echo esc_attr( (count($sidebar_configs)>1)?'has-sidebar':'' ); ?>" role="main">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
					global $post;
					?>
					<div class="row">
						<div class="col-md-8 col-sm-12 col-xs-12">
							<div class="project-info-detail">
								<!-- gallery -->
								<?php
								$gallery = get_post_meta( $post->ID, APUS_REKON_PREFIX.'gallery', true );
								if ( !empty($gallery) ) {
								?>
									<div class="gallery">
										<div class="slick-carousel project-gallery" data-carousel="slick" data-items="1" data-smallmedium="1" data-extrasmall="1" data-pagination="true" data-nav="true">
											<?php foreach ($gallery as $image_id => $url) { ?>
												<a href="<?php echo esc_url($url); ?>">
													<?php echo wp_get_attachment_image( $image_id, 'full' ); ?>
												</a>
											<?php } ?>
										</div>
									</div>
								<?php } ?>
								<h3 class="entry-title-detail"><?php esc_html_e('Description', 'rekon'); ?></h3>
								<div class="entry-description">
					                <?php the_content(); ?>
					            </div>
							</div>
							<?php 
								get_template_part( 'template-project/project-related' );
							?>							
						</div>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<div class="project-detail-flex">
								<div class="project-detail">
									<h3 class="title"><?php esc_html_e('Project Description', 'rekon'); ?></h3>		
									<?php if ( has_excerpt() ) { ?>
										<p class="project-description"><?php echo rekon_substring( get_the_excerpt(), 11, '...' ); ?></p>
									<?php } ?>
									<div class="project-detail-container">
										<?php
									    	$date = get_post_meta( $post->ID, APUS_REKON_PREFIX.'date', true );
									    	$client = get_post_meta( $post->ID, APUS_REKON_PREFIX.'client', true );
									    	$director = get_post_meta( $post->ID, APUS_REKON_PREFIX.'director', true );

								    	if ( $date ) {
							    		?>
								    		<div class="project-detail-item pro-date">
								    			<h4 class="project-detail-title">
								    				<i class="icon-hours"></i>
								    				<?php esc_html_e('Release Date:', 'rekon'); ?>								    					
								    			</h4>
								    			<div class="project-detail-desc">
								    				<?php echo trim($date); ?>
								    			</div>
							    			</div>
							    		<?php
								    	}
								    	if ( $client ) {
							    		?>
								    		<div class="project-detail-item pro-client">
								    			<h4 class="project-detail-title">
								    				<i class="icon-travel"></i>
								    				<?php esc_html_e('Client:', 'rekon'); ?>								    					
								    			</h4>
								    			<div class="project-detail-desc">
								    				<?php echo trim($client); ?>
								    			</div>
							    			</div>
							    		<?php
								    	}
								    	$post_terms = get_the_terms( $post, 'project_category' );
									        if ( $post_terms && ! is_wp_error( $post_terms ) ) {
									    ?>
								        	<div class="project-detail-item pro-category">
								    			<h4 class="project-detail-title"><i class="icon-apus-soil"></i><?php esc_html_e('Category:', 'rekon'); ?></h4>
								    			<div class="project-detail-desc">
									            	<?php
									            	$i = 1;
									                foreach ($post_terms as $term) {
									                    ?>
									                    <a href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo trim($term->name); ?></a><?php echo trim($i < count($post_terms) ? ', ' : '');
									                    
									                    $i++;
									                }
									                ?>
									            </div>
								            </div>
								        <?php }
								    	if ( $director ) {
							    		?>
								    		<div class="project-detail-item pro-director">
								    			<h4 class="project-detail-title"><i class="icon-apus-repair"></i><?php esc_html_e('Author:', 'rekon'); ?></h4>
								    			<div class="project-detail-desc">
								    				<?php echo trim($director); ?>
								    			</div>
							    			</div>
							    		<?php
								    	}
									    ?>
									</div>									
					        		<div class="tag-social">
					                    <?php 
					                    	get_template_part( 'template-parts/sharebox' );
					                    ?>
					        		</div>			           
								</div>
							</div>
						</div>
					</div>
					<?php

				// End the loop.
				endwhile;
			?>

			</main><!-- .site-main -->
		</div><!-- .content-area -->
		
		<?php rekon_display_sidebar_right( $sidebar_configs ); ?>
		
	</div>
</section>
<?php get_footer(); ?>