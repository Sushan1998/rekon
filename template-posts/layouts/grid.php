<?php
	$columns = rekon_get_config('blog_columns', 1);
	$bcol = floor( 12 / $columns );
	$count = 1;
?>
<div class="layout-blog">
    <div class="row">
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="col-sm-6 col-md-<?php echo esc_attr($bcol); echo esc_attr($columns >= 2?' col-xs-12 ':' col-xs-12 '); ?> <?php echo esc_attr(($count%$columns)==1?'sm-clearfix md-clearfix':''); ?>">
                <?php get_template_part( 'template-posts/loop/inner-grid' ); ?>
            </div>
        <?php $count++; endwhile; ?>
    </div>
</div>