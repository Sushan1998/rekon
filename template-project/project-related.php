<?php
$number = rekon_get_config('number_project_related', 3);
$columns = rekon_get_config('related_project_columns', 3);
$terms = get_the_terms( get_the_ID(), 'project_category' );
$termids =array();

if ($terms) {
    foreach($terms as $term) {
        $termids[] = $term->term_id;
    }
}

$args = array(
    'post_type' => 'project',
    'posts_per_page' => $number,
    'post__not_in' => array( get_the_ID() ),
    'orderby' => 'date',
    'order' => 'DESC',
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'project_category',
            'field' => 'id',
            'terms' => $termids,
            'operator' => 'IN'
        )
    )
);
$loop = new WP_Query( $args );
if( $loop->have_posts() ):
?>
    <div class="related-project">
        <h4 class="title"><span><?php esc_html_e( 'Related Projects', 'rekon' ); ?></span></h4>
        <div class="related-project-content  widget-content">
            <div class="slick-carousel" data-carousel="slick" data-smallmedium="2" data-extrasmall="1" data-items="<?php echo esc_attr($columns); ?>" data-pagination="false" data-nav="true">
                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <?php get_template_part( 'template-project/content-project1' ); ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>