<?php
    global $post;
    $thumbsize = !isset($thumbsize) ? rekon_get_config( 'blog_item_thumbsize', 'full' ) : $thumbsize;
    $thumb = rekon_display_post_thumb($thumbsize);
?>
<article <?php post_class('post post-list-item-small'); ?>>
    <div class="flex-top">
        <?php        
        if ( has_post_thumbnail() ) {            
            $thumb = rekon_display_post_thumb($thumbsize);
        ?>            
            <div class="entry-post-image">
                <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
                    <span class="post-sticky"><?php echo esc_html__('Featured','rekon'); ?></span>
                <?php endif; ?>
                <?php echo trim($thumb); ?>                           
            </div>            
        <?php } ?>    

        <div class=" entry-post-content">            
            <?php if (get_the_title()) { ?>
                <h4 class="entry-title">
                    <a href="<?php the_permalink(); ?>"><?php echo rekon_substring( $post->post_title, 6, '...' ); ?></a>
                </h4>
            <?php } ?>
            <ul class="entry-post-info list-unstyled flex-top">        
                <li class="entry-author"><?php the_author_posts_link(); ?></li>
                <li class="entry-comments">
                    <?php comments_number( '0', '1', '%' ); ?>
                </li>        
            </ul>           
        </div>
    </div>
</article>