<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Rekon
 * @since Rekon 1.0
 */
$footer = apply_filters( 'rekon_get_footer_layout', 'default' );
?>
	</div><!-- .site-content -->
	<?php if ( !empty($footer) ): ?>
		<?php rekon_display_footer_builder($footer); ?>
	<?php else: ?>
		<footer id="apus-footer" class="apus-footer" role="contentinfo">
			<div class="footer-default">
				<div class="apus-footer-inner">
					<div class="apus-copyright">
						<div class="container">
							<div class="copyright-content clearfix">
								<div class="text-copyright">
									<?php										
										$allowed_html_array = array( 'a' => array('href' => array()) );
										echo wp_kses(sprintf(__('&copy; %s - Rekon. All Rights Reserved. <br/> Powered by <a href="//apusthemes.com">ApusThemes</a>', 'rekon'), date("Y")), $allowed_html_array);
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer><!-- .site-footer -->
	<?php endif; ?>
	
	<?php
	if ( rekon_get_config('back_to_top') ) { ?>
		<a href="#" id="back-to-top" class="add-fix-top">			
			<i class="fas fa-chevron-up"></i>					
		</a>				
	<?php
	}
	?>

	<?php if ( is_active_sidebar( 'contact-sidebar' ) ): ?>
		<div class="contact-sidebar-wrapper">
			<a href="javascript:void(0)" class="contact_close">×</a>
   			<?php dynamic_sidebar( 'contact-sidebar' ); ?>
   		</div>
   	<?php endif; ?>
</div><!-- .site -->
<?php wp_footer(); ?>
</body>
</html>