<?php 
    $thumbsize = !isset($thumbsize) ? rekon_get_config( 'blog_item_thumbsize', 'large' ) : $thumbsize;
    $thumb = rekon_display_post_thumb($thumbsize);
?>
<article <?php post_class('post post-list-item'); ?>>
    <div class="post-list-item-large flex-middle">
        <?php
        $bcol = 12;
        if ( has_post_thumbnail() ) {
            $bcol = 7;
            $thumb = rekon_display_post_thumb($thumbsize);
        ?>
            <div class="entry-post-image-column">
                <div class="entry-post-image date-in-thumb">
                    <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
                        <span class="post-sticky"><?php echo esc_html__('Featured','rekon'); ?></span>
                    <?php endif; ?>
                    <?php echo trim($thumb); ?>   
                </div>
            </div>
        <?php } ?>
        <div class="entry-post-content-column-<?php echo esc_attr($bcol); ?> entry-post-content-column">
            <div class="entry-post-content">
                <?php if (get_the_title()) { ?>
                    <h4 class="entry-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                <?php } ?>
                <ul class="entry-post-info list-unstyled flex-top">    
                    <li class="entry-author"><?php the_author_posts_link(); ?></li>  
                    <li class="entry-comments">
                        <?php comments_number( esc_html__('0 Comments', 'rekon'), esc_html__('1 Comment', 'rekon'), esc_html__('% Comments', 'rekon') ); ?>
                    </li>   
                    <li class="entry-date">
                        <?php the_time( get_option('date_format', 'd M, Y') ); ?>
                    </li>                                                                        
                </ul>               
                <div class="description"><?php echo rekon_substring( get_the_excerpt(),20, '...' ); ?></div>
                <div class="entry-button-link">        
                    <div class="link-button-wrap">
                        <a class="btn-read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'rekon'); ?></a>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</article>