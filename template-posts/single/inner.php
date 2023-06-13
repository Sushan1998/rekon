<?php
$post_format = get_post_format();
global $post;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="top-info-detail">
        <?php if( $post_format == 'link' ) {
            $format = rekon_post_format_link_helper( get_the_content(), get_the_title() );
            $title = $format['title'];
            $link = rekon_get_link_attributes( $title );
            $thumb = rekon_post_thumbnail('', $link);
            echo trim($thumb);
        } else { ?>
            <div class="entry-thumb <?php echo  (!has_post_thumbnail() ? 'no-thumb' : ''); ?>">
                <?php
                    $thumb = rekon_post_thumbnail();
                    echo trim($thumb);
                ?>
            </div>
        <?php } ?>

    </div>
	<div class="entry-content-detail">
        <?php the_title('<h1 class="entry-title-detail">', '</h1>'); ?>
        <div class="top-info-post-detail">
            <a class="entry-author" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a>
            <div class="entry-category">
                <?php rekon_post_categories($post); ?>
            </div>   
            <div class="entry-date">
                <?php the_time( get_option('date_format', 'd M, Y') ); ?>
            </div>         
        </div>
    	<div class="single-info info-bottom">
            <div class="entry-description">
                <?php the_content(); ?>
            </div><!-- /entry-content -->
    		<?php
    		wp_link_pages( array(
    			'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'rekon' ) . '</span>',
    			'after'       => '</div>',
    			'link_before' => '<span>',
    			'link_after'  => '</span>',
    			'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'rekon' ) . ' </span>%',
    			'separator'   => '',
    		) );
    		?>
            <?php  
                $posttags = get_the_tags();
            ?>
            <?php if( !empty($posttags) || rekon_get_config('show_blog_social_share', false) ){ ?>
        		<div class="tag-social clearfix">
                    <?php rekon_post_tags(); ?>
        			<?php if( rekon_get_config('show_blog_social_share', false) ) {
        				get_template_part( 'template-parts/sharebox' );
        			} ?>
        		</div>
            <?php } ?>
            <?php
                //Previous/next post navigation.
                the_post_navigation( array(
                    'next_text' => '<span class="meta-nav" aria-hidden="true"><span class="navi">' . esc_html__( 'Next post', 'rekon' ) . '</span> <i class="fas fa-angle-right"></i></span> ' .
                        '<span class="inner">'.
                        '<span class="title-direct">%title</span></span>',
                    'prev_text' => '<span class="meta-nav" aria-hidden="true"><i class="fas fa-angle-left"></i><span class="navi"> ' . esc_html__( 'Previous post', 'rekon' ) . '</span></span> ' .
                        '<span class="inner">'.
                        '<span class="title-direct">%title</span></span>',
                ) );
            ?>
    	</div>
    </div>
</article>