<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
$sidebar_configs = rekon_get_team_layout_configs();


rekon_render_breadcrumbs();
?>
<section id="main-container" class="main-content  <?php echo apply_filters('rekon_team_content_class', 'container');?> inner">
	<?php rekon_before_content( $sidebar_configs ); ?>
	<div class="row">
		<?php rekon_display_sidebar_left( $sidebar_configs ); ?>

		<div id="main-content" class="col-sm-12 <?php echo esc_attr($sidebar_configs['main']['class']); ?>">
			<main id="main" class="site-main detail-team <?php echo esc_attr( (count($sidebar_configs)>1)?'has-sidebar':'' ); ?>" role="main">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
					global $post;
					?>

					<div class="detail-team-top">
						<div class="row single-team-flex flex-middle">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="team-social">
									<!-- gallery -->
									<?php if ( has_post_thumbnail() ) { ?>
										<div class="project-thumb">
											<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
												<?php the_post_thumbnail( 'large', array( 'alt' => get_the_title() ) ); ?>
											</a>
										</div>
									<?php } ?>

									<?php
									$socials = get_post_meta( $post->ID, APUS_REKON_TEAM_PREFIX.'socials', true );
									if ( !empty($socials) ) {
									    ?>
									    <div class="team-detail-socials">
									        <ul class="list list-unstyled">
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
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12">		
								<div class="single-team-meta">
									<h3 class="entry-title-detail">
										<?php echo esc_html__("Description",'rekon'); ?>								
								    </h3>

									<div class="entry-description">
						                <?php the_content(); ?>
						            </div>

						            <?php
									$job = get_post_meta( $post->ID, APUS_REKON_TEAM_PREFIX.'job', true );
									if ( $job ) {
										?>
										<div class="team-job"><?php echo trim($job); ?></div>
										<?php
									}
									?>
								</div>
							</div>
						</div>						
					</div>
					
					<div class="team-detail">
						<div class="row">
							<div class="col-sm-6">
								<h3 class="title"><?php esc_html_e('Our Activities', 'rekon'); ?></h3>
								<?php
								$activities = get_post_meta( $post->ID, APUS_REKON_TEAM_PREFIX.'activities', true );
								if ( !empty($activities) ) {
								    ?>
								    <div class="team-detail-activities">
								        <div class="panel-group" id="accordion-activity">
								            <?php $i=1; foreach ($activities as $activity) {
								                if ( !empty($activity['title']) && !empty($activity['description']) ) {
								            ?>
												  	<div class="panel panel-default">
													    <div class="panel-heading">
													      	<h4 class="panel-title">
													        	<a data-toggle="collapse" data-parent="#accordion-activity" href="#activity-collapse<?php echo esc_attr($i); ?>">
													        		<?php if ( !empty($activity['icon']) ) { ?>
													        			<span><i class="<?php echo esc_attr($activity['icon']); ?>"></i></span>
													        		<?php } ?>
													        		<?php if ( !empty($activity['title']) ) { ?>
													        			<?php echo trim($activity['title']); ?>
													        		<?php } ?>
													        	</a>
													      	</h4>
													    </div>
													    <div id="activity-collapse<?php echo esc_attr($i); ?>" class="panel-collapse collapse <?php echo esc_attr($i == 1 ? 'in' : '');?>">
													      	<div class="panel-body">
													      		<?php if ( !empty($activity['description']) ) { ?>
												        			<?php echo trim($activity['description']); ?>
												        		<?php } ?>
													      	</div>
													    </div>
												  	</div>
												<?php $i++; } ?>
								            <?php } ?>
								        </div>
								    </div>
							    <?php } ?>
							</div>
							<div class="col-sm-6">
								<h3 class="title"><?php esc_html_e('Our Skills', 'rekon'); ?></h3>
								<?php
								$description = get_post_meta( $post->ID, APUS_REKON_TEAM_PREFIX.'description', true );
								if ( $description ) {
									?>
									<div class="team-description"><?php echo trim($description); ?></div>
									<?php
								}
								$skills = get_post_meta( $post->ID, APUS_REKON_TEAM_PREFIX.'skills', true );
								if ( !empty($skills) ) {
								    ?>
								    <div class="team-detail-skills">
								        <div class="panel-group" id="accordion-activity">
								            <?php $i=1; foreach ($skills as $skill) {
								                if ( !empty($skill['title']) && !empty($skill['value']) ) {
								            ?>
												  	<div class="clearfix">
									                    <div class="valuation-label pull-left"><?php echo empty( $skill['title'] ) ? '' : esc_attr( $skill['title'] ); ?></div>
									                    <span class="percentage-valuation pull-right"><?php echo empty( $skill['value'] ) ? '' : esc_attr( $skill['value'] ); ?> <?php esc_html_e('%', 'rekon'); ?></span>
									                </div>
									                <div class="property-valuation-item progress" >
									                    <div class="bar-valuation progress-bar progress-bar-success progress-bar-striped"
									                         style="width: <?php echo esc_attr( $skill[ 'value' ] ); ?>%"
									                         data-percentage="<?php echo empty( $skill['value'] ) ? '' : esc_attr( $skill['value'] ); ?>">
									                    </div>
									                </div><!-- /.property-valuation-item -->
									                
												<?php $i++; } ?>
								            <?php } ?>
								        </div>
								    </div>
							    <?php } ?>
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