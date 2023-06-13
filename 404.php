<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage rekon
 * @since rekon 1.0
 */
/*
*Template Name: 404 Page
*/
get_header();
rekon_render_breadcrumbs();

?>
<section class="page-404">
	<div id="main-container" class="inner">
		<div id="main-content" class="main-page">
			<section class="error-404 not-found clearfix">
				<div class="container">
					<div class="row flex-middle-sm">
						<div class="col-sm-12 col-lg-6 col-md-6 col-xs-12">
							<div class="slogan">
								<?php if(!empty(rekon_get_config('404_title', '404')) ) { ?>
									<h4 class="title-big"><?php echo wp_kses_post(rekon_get_config('404_title', 'we’re sorry...')); ?></h4>
								<?php } ?>
							</div>
							<div class="page-content">
								<div class="description">
									<?php echo wp_kses_post(rekon_get_config('404_description', 'You’ll probably be able to find the information you are looking for by using our search or visiting these links.')); ?>
								</div>
								<?php get_search_form(); ?>								
								<div class="return">
									<a class="btn-to-back" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__('Back to home','rekon') ?></a>
								</div>
							</div><!-- .page-content -->
						</div>
						<div class="col-sm-12 col-lg-6 col-md-6 col-xs-12">
							<div class="error_bg"></div>
						</div>
					</div>
				</div>
			</section><!-- .error-404 -->
		</div><!-- .content-area -->
	</div>
</section>
<?php get_footer(); ?>