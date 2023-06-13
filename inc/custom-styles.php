<?php
if ( !function_exists ('rekon_custom_styles') ) {
	function rekon_custom_styles() {
		global $post;	
		
		ob_start();	
		?>
		
			<?php
				$main_font = rekon_get_config('main_font');
				$main_font = isset($main_font['font-family']) ? $main_font['font-family'] : false;
			?>
			<?php if ( $main_font ): ?>
				/* Main Font */
				body
				{
					font-family: 
					<?php echo '\'' . $main_font . '\','; ?> 
					sans-serif;
				}
			<?php endif; ?>
			
			<?php
				$heading_font = rekon_get_config('heading_font');
				$heading_font = isset($heading_font['font-family']) ? $heading_font['font-family'] : false;
			?>
			<?php if ( $heading_font ): ?>
				/* Heading Font */
				h1, h2, h3, h4, h5, h6, .widget-title,.widgettitle
				{
					font-family:  <?php echo '\'' . $heading_font . '\','; ?> sans-serif;
				}			
			<?php endif; ?>


			<?php if ( rekon_get_config('main_color') != "" ) : ?>
				/* seting background main */			
				.btn,
				.btn:hover,
				.btn:focus,
				.btn:active,
				.post-grid .image:after,
				.overlay-icon a:before,
				.user .title:after,
				.apus-heading .heading-title:after,
				.date-in-thumb .entry-date:after,
				.package-wrapper .price-wrapper,
				.package-wrapper .button:hover,
				.package-wrapper .button:focus,
				.package-wrapper .button:active,
				.page-404 .btn-to-back,
				.apus-heading .wt-separator-outer .wt-separator > span,
				.slick-carousel .slick-dots li.slick-active,
				.widget-projects.mansory .tab-content-top.style2 ul li a:hover,
				.widget-projects.mansory .tab-content-top.style2 ul li a:focus,
				.widget-projects.mansory .tab-content-top.style2 ul li a:active,
				.button, button, input[type="button"], input[type="reset"], input[type="submit"],
				.widget-projects.mansory .tab-content-top.style2 ul li a.active,
				.widget-features-box.style3 .features-box-content .title:after,
				.widget-features-box.style4 .features-box-image.icon,
				form.lost_reset_password button[type="submit"],
				.post.post-list-small .date-in-thumb .entry-date,
				.widget-features-box.style6 .features-box-image.icon,
				.woocommerce div.product form.cart .button,
				.details-product .apus-social-share span:hover,
				.details-product .apus-social-share span:focus,
				.details-product .apus-social-share span:active,
				.woocommerce-tabs .nav-tabs > li.active > a:before,
				.related.products .widget-title:after,
				.detail-project .project-detail,
				.btn-project,
				.btn-project:hover,
				.btn-project:focus,
				.btn-project:active,
				.related-project .title:after,
				.tagcloud a:before,
				.related-project .slick-carousel .slick-arrow:hover,
				.related-project .slick-carousel .slick-arrow:focus,
				.related-project .slick-carousel .slick-arrow:active,
				.apus-pagination > span.current, .apus-pagination > a.current,
				.apus-pagination > span:hover, .apus-pagination > a:hover,
				.apus-pagination > span:focus, .apus-pagination > a:focus,
				.apus-pagination > span:active, .apus-pagination > a:active,
				.detail-post .entry-tags-list a:before,
				.widget.widget_apus_socials_widget ul li a:hover,
				.widget.widget_apus_socials_widget ul li a:focus,
				.widget.widget_apus_socials_widget ul li a:active,
				.post-navigation .nav-links .nav-previous a:before,
				.post-navigation .nav-links > *.nav-next a:before,
				.post-navigation .nav-links a:after,
				.related-posts .title:after,
				.widget-features-box.style2 .item:hover:before, .widget-features-box.style2 .item:hover:after,
				.woocommerce .return-to-shop .button, .woocommerce .track_order .button, .woocommerce #respond input#submit,
				.product-block-list .add-cart .added_to_cart, .product-block-list .add-cart .added_to_cart, .product-block-list .add-cart a.button,
				.product-block.grid .groups-button .add-cart .added_to_cart, .product-block.grid .groups-button .add-cart .button, .product-block.grid .groups-button .add-cart .added,
				.sidebar .widget-search .btn, .sidebar .widget-search .viewmore-products-btn, .apus-sidebar .widget-search .btn, .apus-sidebar .widget-search .viewmore-products-btn,
				.sidebar .widget .widget-title:after, .sidebar .widget .widgettitle:after, .sidebar .widget .widget-heading:after, .apus-sidebar .widget .widget-title:after, .apus-sidebar .widget .widgettitle:after, .apus-sidebar .widget .widget-heading:after,
				.product-block.grid .groups-button .add-cart .added_to_cart:hover, .product-block.grid .groups-button .add-cart .button:hover, .product-block.grid .groups-button .add-cart .added:hover,
				.product-block.grid .groups-button .add-cart .added_to_cart:focus, .product-block.grid .groups-button .add-cart .button:focus, .product-block.grid .groups-button .add-cart .added:focus,
				.product-block.grid .groups-button .add-cart .added_to_cart:active, .product-block.grid .groups-button .add-cart .button:active, .product-block.grid .groups-button .add-cart .added:active,
				.elementor-widget-heading.has-separator h1.elementor-heading-title:after, .elementor-widget-heading.has-separator h2.elementor-heading-title:after, .elementor-widget-heading.has-separator h3.elementor-heading-title:after, .elementor-widget-heading.has-separator h4.elementor-heading-title:after, .elementor-widget-heading.has-separator h5.elementor-heading-title:after, .elementor-widget-heading.has-separator h6.elementor-heading-title:after,
				.apus-pagination .page-numbers li > span:hover, .apus-pagination .page-numbers li > span.current, .apus-pagination .page-numbers li > a:hover, .apus-pagination .page-numbers li > a.current, .apus-pagination .pagination li > span:hover, .apus-pagination .pagination li > span.current, .apus-pagination .pagination li > a:hover, .apus-pagination .pagination li > a.current
				{				
					background-color: <?php echo esc_html( rekon_get_config('main_color') ) ?>;					
				}
				
				.detail-project .project-detail
				{				
					background-image: linear-gradient(to right, <?php echo esc_html( rekon_get_config('main_color') ) ?>, <?php echo esc_html( rekon_get_config('main_color') ) ?> 50%, <?php echo esc_html( rekon_get_config('main_color') ) ?> 50%);
				}

				/* setting color*/
				a:hover, 
				a:focus,
				.btn-link,
				.text-theme,		
				.add-fix-top,						
				.entry-author a:hover,
				.entry-author a:focus,
				.entry-author a:active,
				.megamenu > li.active > a,
				.apus-copyright-builder a,
				.date-in-thumb .entry-date,
				.apus-footer a:hover,
				.apus-footer a:focus,
				.apus-footer a:active,
				.detail-team .team-job,
				.megamenu li .dropdown-menu li > a:hover,
				.megamenu li .dropdown-menu li > a:focus,
				.megamenu li .dropdown-menu li > a:active,
				.comment-list .comment-reply-link:hover,
				.comment-list .comment-reply-link:focus,
				.comment-list .comment-reply-link:active,
				.megamenu > li:hover > a,
				.megamenu > li:focus > a,
				.megamenu > li:active > a,
				.megamenu > li > a:hover,
				.megamenu > li > a:focus,
				.megamenu > li > a:active,
				.shopping_cart_content .total,
				.megamenu > li.active > a .caret,
				.team.team-style1 .social li a:hover,
				.team.team-style1 .social li a:focus,
				.team.team-style1 .social li a:active,
				.widget-features-box .features-box-image.icon,				
				.widget-projects .project-style1 .project-close-icon,
				.widget-projects .project-style1 .project-icon > *,
				.megamenu li .dropdown-menu li.active > a,
				.megamenu > li:hover > a .caret,
				.page-404 .title-big,
				.btn-read-more,
				.post-navigation .nav-links a:hover,
				.post-navigation .nav-links a:focus,
				.post-navigation .nav-links a:active,
				.posts-list .top-info a:hover,
				.posts-list .top-info a:focus,
				.posts-list .top-info a:active,
				.package-wrapper .description ul li i,
				.details-product .product_meta a:hover,
				.details-product .product_meta a:focus,
				.details-product .product_meta a:active,
				.widget-projects.mansory .isotope-filter li a:hover,
				.widget-projects.mansory .isotope-filter li a:focus,
				.widget-projects.mansory .isotope-filter li a:active,
				.apus-breadscrumb-inner .breadcrumb li:first-child a,
				.top-info-post-detail > *.entry-author:hover,
				.top-info-post-detail > *.entry-author:focus,
				.top-info-post-detail > *.entry-author:active,
				.apus-breadscrumb-inner .breadcrumb li a:hover,
				.apus-breadscrumb-inner .breadcrumb li a:focus,
				.apus-breadscrumb-inner .breadcrumb li a:active,
				.top-info-post-detail > *.entry-author:hover:before,
				.top-info-post-detail > *.entry-date:hover,
				.top-info-post-detail > *.entry-date:focus,
				.top-info-post-detail > *.entry-date:active,
				.top-info-post-detail > *.entry-date:hover:before,
				.detail-post .apus-social-share a:hover,
				.detail-post .apus-social-share a:focus,
				.detail-post .apus-social-share a:active,
				.comment-list #cancel-comment-reply-link,
				.woocommerce div.product p.price, .woocommerce div.product span.price,
				.widget_meta ul li.current-cat-parent:hover, .widget_meta ul li.current-cat:hover, .widget_meta ul li a:hover, .widget_archive ul li.current-cat-parent:hover, .widget_archive ul li.current-cat:hover, .widget_archive ul li a:hover, .widget_recent_entries ul li.current-cat-parent:hover, .widget_recent_entries ul li.current-cat:hover, .widget_recent_entries ul li a:hover, .widget_categories ul li.current-cat-parent:hover, .widget_categories ul li.current-cat:hover, .widget_categories ul li a:hover, .widget_pages ul li.current-cat-parent:hover, .widget_pages ul li.current-cat:hover, .widget_pages ul li a:hover, .widget_nav_menu ul li.current-cat-parent:hover, .widget_nav_menu ul li.current-cat:hover, .widget_nav_menu ul li a:hover,
				.widget_meta ul li.current-cat-parent:active, .widget_meta ul li.current-cat:active, .widget_meta ul li a:active, .widget_archive ul li.current-cat-parent:active, .widget_archive ul li.current-cat:active, .widget_archive ul li a:active, .widget_recent_entries ul li.current-cat-parent:active, .widget_recent_entries ul li.current-cat:active, .widget_recent_entries ul li a:active, .widget_categories ul li.current-cat-parent:active, .widget_categories ul li.current-cat:active, .widget_categories ul li a:active, .widget_pages ul li.current-cat-parent:active, .widget_pages ul li.current-cat:active, .widget_pages ul li a:active, .widget_nav_menu ul li.current-cat-parent:active, .widget_nav_menu ul li.current-cat:active, .widget_nav_menu ul li a:active,
				.widget_meta ul li.current-cat-parent:focus, .widget_meta ul li.current-cat:focus, .widget_meta ul li a:focus, .widget_archive ul li.current-cat-parent:focus, .widget_archive ul li.current-cat:focus, .widget_archive ul li a:focus, .widget_recent_entries ul li.current-cat-parent:focus, .widget_recent_entries ul li.current-cat:focus, .widget_recent_entries ul li a:focus, .widget_categories ul li.current-cat-parent:focus, .widget_categories ul li.current-cat:focus, .widget_categories ul li a:focus, .widget_pages ul li.current-cat-parent:focus, .widget_pages ul li.current-cat:focus, .widget_pages ul li a:focus, .widget_nav_menu ul li.current-cat-parent:focus, .widget_nav_menu ul li.current-cat:focus, .widget_nav_menu ul li a:focus				
				{
					color: <?php echo esc_html( rekon_get_config('main_color') ) ?>;
				}

				.text-theme{
					color: <?php echo esc_html( rekon_get_config('main_color') ) ?> !important;
				}

				/* setting border color*/	
				.btn,
				.btn:hover,
				.btn:focus,
				.btn:active,
				.add-fix-top,				
				.overlay-icon a:hover,
				.overlay-icon a:focus,
				.overlay-icon a:active,				
				.team.team-style1 .social li a:hover,
				.team.team-style1 .social li a:focus,
				.team.team-style1 .social li a:active,	
				.package-wrapper .button:hover,
				.package-wrapper .button:focus,
				.package-wrapper .button:active,
				.page-404 .btn-to-back,
				form.lost_reset_password button[type="submit"],	
				.page-404 input[type="text"]:hover,
				.page-404 input[type="text"]:focus,
				.page-404 input[type="text"]:active,
				.details-product .apus-social-share span:hover,
				.details-product .apus-social-share span:focus,
				.details-product .apus-social-share span:active,
				.widget-projects .project-style1 .project-container:hover .project-content-box,										
				.button, button, input[type="button"], input[type="reset"], input[type="submit"],
				.comment-form-cookies-consent [type="checkbox"]:checked ~ label:before,
				.widget-projects.mansory .tab-content-top.style2 ul li a.active,
				.widget-projects.mansory .tab-content-top.style2 ul li a:hover,
				.widget-projects.mansory .tab-content-top.style2 ul li a:focus,
				.widget-projects.mansory .tab-content-top.style2 ul li a:active,
				.apus-pagination > span.current, .apus-pagination > a.current,
				.apus-pagination > span:hover, .apus-pagination > a:hover,
				.apus-pagination > span:focus, .apus-pagination > a:focus,
				.apus-pagination > span:active, .apus-pagination > a:active,
				.detail-post .apus-social-share a:hover,
				.detail-post .apus-social-share a:focus,
				.detail-post .apus-social-share a:active,
				.woocommerce .return-to-shop .button, .woocommerce .track_order .button, .woocommerce #respond input#submit,
				.sidebar .widget-search .form-control:hover, .apus-sidebar .widget-search .form-control:hover,
				.sidebar .widget-search .form-control:focus, .apus-sidebar .widget-search .form-control:focus,
				.sidebar .widget-search .form-control:active, .apus-sidebar .widget-search .form-control:active,
				.details-product .apus-woocommerce-product-gallery-thumbs .slick-slide .thumbs-inner:before,
				.post.no-results .widget-search form input[type=text]:hover, .post.no-results .widget-search form input[type=password]:hover, .post.no-results .widget-search form input[type=number]:hover,
				.post.no-results .widget-search form input[type=text]:focus, .post.no-results .widget-search form input[type=password]:focus, .post.no-results .widget-search form input[type=number]:focus,
				.post.no-results .widget-search form input[type=text]:active, .post.no-results .widget-search form input[type=password]:active, .post.no-results .widget-search form input[type=number]:active,
				input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="search"]:focus, input[type="number"]:focus, input[type="tel"]:focus, input[type="range"]:focus, input[type="date"]:focus, input[type="month"]:focus, input[type="week"]:focus, input[type="time"]:focus, input[type="datetime"]:focus, input[type="datetime-local"]:focus, input[type="color"]:focus, textarea:focus,
				input[type="text"]:hover, input[type="email"]:hover, input[type="url"]:hover, input[type="password"]:hover, input[type="search"]:hover, input[type="number"]:hover, input[type="tel"]:hover, input[type="range"]:hover, input[type="date"]:hover, input[type="month"]:hover, input[type="week"]:hover, input[type="time"]:hover, input[type="datetime"]:hover, input[type="datetime-local"]:hover, input[type="color"]:hover, textarea:hover,
				input[type="text"]:active, input[type="email"]:active, input[type="url"]:active, input[type="password"]:active, input[type="search"]:active, input[type="number"]:active, input[type="tel"]:active, input[type="range"]:active, input[type="date"]:active, input[type="month"]:active, input[type="week"]:active, input[type="time"]:active, input[type="datetime"]:active, input[type="datetime-local"]:active, input[type="color"]:active, textarea:active,
				input[type="text"]:focus-within, input[type="email"]:focus-within, input[type="url"]:focus-within, input[type="password"]:focus-within, input[type="search"]:focus-within, input[type="number"]:focus-within, input[type="tel"]:focus-within, input[type="range"]:focus-within, input[type="date"]:focus-within, input[type="month"]:focus-within, input[type="week"]:focus-within, input[type="time"]:focus-within, input[type="datetime"]:focus-within, input[type="datetime-local"]:focus-within, input[type="color"]:focus-within, textarea:focus-within,
				.product-block.grid .groups-button .add-cart .added_to_cart, .product-block.grid .groups-button .add-cart .button, .product-block.grid .groups-button .add-cart .added,
				.product-block.grid .groups-button .add-cart .added_to_cart:hover, .product-block.grid .groups-button .add-cart .button:hover, .product-block.grid .groups-button .add-cart .added:hover,
				.product-block.grid .groups-button .add-cart .added_to_cart:focus, .product-block.grid .groups-button .add-cart .button:focus, .product-block.grid .groups-button .add-cart .added:focus,
				.product-block.grid .groups-button .add-cart .added_to_cart:active, .product-block.grid .groups-button .add-cart .button:active, .product-block.grid .groups-button .add-cart .added:active,
				.apus-pagination .page-numbers li > span:hover, .apus-pagination .page-numbers li > span.current, .apus-pagination .page-numbers li > a:hover, .apus-pagination .page-numbers li > a.current, .apus-pagination .pagination li > span:hover, .apus-pagination .pagination li > span.current, .apus-pagination .pagination li > a:hover, .apus-pagination .pagination li > a.current
				{
					border-color: <?php echo esc_html( rekon_get_config('main_color') ) ?>;
				}

			<?php endif; ?>

			<?php if ( rekon_get_config('button_color') != "" ) : ?>
				/* seting background main */
				.btn-theme
				{
					background-color: <?php echo esc_html( rekon_get_config('button_color') ) ?> ;
					border-color: <?php echo esc_html( rekon_get_config('button_color') ) ?> ;
				}			
			<?php endif; ?>

			<?php if ( rekon_get_config('button_hover_color') != "" ) : ?>
				/* seting background main */
				.btn-theme.btn-outline:focus{
					border-color: <?php echo esc_html( rekon_get_config('button_hover_color') ) ?> ;
					background-color: <?php echo esc_html( rekon_get_config('button_hover_color') ) ?> ;
				}
			<?php endif; ?>
	<?php
		$content = ob_get_clean();
		$content = str_replace(array("\r\n", "\r"), "\n", $content);
		$lines = explode("\n", $content);
		$new_lines = array();
		foreach ($lines as $i => $line) {
			if (!empty($line)) {
				$new_lines[] = trim($line);
			}
		}		
		return implode($new_lines);
	}
}