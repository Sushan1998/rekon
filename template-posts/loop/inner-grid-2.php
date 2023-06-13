<?php 
    $thumbsize = !isset($thumbsize) ? rekon_get_config( 'blog_item_thumbsize', 'full' ) : $thumbsize;
    $thumb = rekon_display_post_thumb($thumbsize);
?>
<article <?php post_class('post post-grid-2'); ?>>
    <?php
        if ( !empty($thumb) ) {
            ?>
            <div class="image p-relative date-in-thumb">
                <?php echo trim($thumb); ?>
                <div class="entry-date"><?php the_time( get_option('date_format', 'M d, Y') ); ?></div>
            </div>
            <?php
        }
    ?>
    <div class="entry-title-content">
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

        <div class="description"><?php echo rekon_substring( get_the_excerpt(),19, '...' ); ?></div>       
    </div>
</article>