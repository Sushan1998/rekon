<div id="apus-header-mobile" class="header-mobile hidden-lg clearfix">        
    <div class="flex-middle">
        <div class="logo-wrapper">
            <?php
                $logo = rekon_get_config('media-mobile-logo');
            ?>
            <?php if( isset($logo['url']) && !empty($logo['url']) ): ?>
                <div class="logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" >
                        <img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                    </a>
                </div>
            <?php else: ?>
                <div class="logo logo-theme">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" >
                        <img src="<?php echo esc_url_raw( get_template_directory_uri().'/images/logo.png'); ?>" alt="<?php bloginfo( 'name' ); ?>">
                    </a>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="ali-right">
            <?php if ( rekon_get_config('show_searchform') ): ?>
                <div class="apus-search-form box-search">                    
                    <a href="#" class="btn-search-icon">
                        <i class="icon-apus-magnifiying-glass"></i>
                    </a>
                    <?php get_template_part( 'template-parts/searchform' ); ?>                       
                </div>            
            <?php endif; ?>
            <a href="#navbar-offcanvas" class="btn btn-theme btn-showmenu"><i class="icon-apus-menu"></i></a>
        </div>        
    </div>    
</div>