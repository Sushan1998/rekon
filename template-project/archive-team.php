<?php
get_header();
$sidebar_configs = rekon_get_team_layout_configs();

rekon_render_breadcrumbs();
$columns = rekon_get_config('teams_columns', 3);
$bcol  = 12/$columns;
$style = rekon_get_config('teams_style');
?>
<section id="main-container" class="main-content  <?php echo apply_filters('rekon_team_content_class', 'container');?> inner">
	<?php rekon_before_content( $sidebar_configs ); ?>
	<div class="row">
		<?php rekon_display_sidebar_left( $sidebar_configs ); ?>

		<div id="main-content" class="col-sm-12 <?php echo esc_attr($sidebar_configs['main']['class']); ?>">
			<main id="main" class="site-main layout-team <?php echo esc_attr( count($sidebar_configs)>1 ? 'has-sidebar' : '' ); ?>" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header hidden">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<div class="row">
			        <?php $count = 1; while ( have_posts() ) : the_post(); ?>
			            <div class="col-sm-6 col-md-<?php echo esc_attr($bcol); echo esc_attr($columns >= 2?' col-xs-12 ':' col-xs-12 '); ?> <?php echo esc_attr(($count%$columns)==1?'sm-clearfix md-clearfix':''); ?> <?php echo esc_attr($style); ?>">
			                <?php get_template_part( 'template-project/content-team' ); ?>
			            </div>
			        <?php $count++; endwhile; ?>
			    </div>

				<?php

				// Previous/next page navigation.
				rekon_paging_nav();

			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'template-posts/content', 'none' );

			endif;
			?>

			</main><!-- .site-main -->
		</div><!-- .content-area -->
		
		<?php rekon_display_sidebar_right( $sidebar_configs ); ?>
		
	</div>
</section>
<?php get_footer(); ?>