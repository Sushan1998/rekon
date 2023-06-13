<?php 
    $thumbsize = !isset($thumbsize) ? rekon_get_config( 'blog_item_thumbsize', 'full' ) : $thumbsize;
    $thumb = rekon_display_post_thumb($thumbsize);
?>
<article <?php post_class('post post-list-item post-list-small'); ?>>
    <div class="row post-list-item-large flex-top">
        <?php
        $bcol = 12;
        if ( has_post_thumbnail() ) {
            $bcol = 7;
            $thumb = rekon_display_post_thumb($thumbsize);
        ?>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                <div class="entry-post-image date-in-thumb">
                    <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
                        <span class="post-sticky"><?php echo esc_html__('Featured','rekon'); ?></span>
                    <?php endif; ?>
                    <?php echo trim($thumb); ?>       
                    <div class="entry-date">
                        <span class="day"><?php the_time( 'd' ); ?></span>
                        <span class="month"><?php the_time( 'M' ); ?></span>    
                    </div>                                              
                </div>
            </div>
        <?php } ?>
        <div class="col-sm-<?php echo esc_attr($bcol); ?> col-xs-12">
            <div class="entry-post-content">
                <?php if (get_the_title()) { ?>
                    <h4 class="entry-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                <?php } ?>
                <ul class="entry-post-info list-unstyled flex-top">    
                    <li class="entry-author"><?php echo esc_html__('By ','rekon') ?><?php the_author_posts_link(); ?></li>  
                    <li class="entry-comments">
                        <?php comments_number( esc_html__('0 Comments', 'rekon'), esc_html__('1 Comment', 'rekon'), esc_html__('% Comments', 'rekon') ); ?>
                    </li>                             
                </ul>
                <div class="description"><?php echo rekon_substring( get_the_excerpt(),12, '...' ); ?></div>
            </div>
        </div>
    </div>
</article>