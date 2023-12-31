<?php

$GLOBALS['comment'] = $comment;
$add_below = '';

?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">

	<div class="the-comment">
		<?php if(get_avatar($comment, 90)){ ?>
			<div class="avatar">
				<?php echo get_avatar($comment, 90); ?>
			</div>
		<?php } ?>
		<div class="comment-box">
			<div class="comment-author meta">
				<div class="left-inner">
					<div class="name-author"><strong><?php echo get_comment_author_link() ?></strong></div>			
					<span class="date"><?php printf(esc_html__('%1$s', 'rekon'), get_comment_date()) ?></span>		
				</div>
				<div class="flex-top right-inner">
					<?php edit_comment_link(esc_html__('Edit', 'rekon'),'  ','') ?>
				</div>
			</div>
			<div class="comment-text">
				<?php if ($comment->comment_approved == '0') : ?>
				<em><?php esc_html_e('Your comment is awaiting moderation.', 'rekon') ?></em>
				<br />
				<?php endif; ?>
				<?php comment_text() ?>
			</div>
			<?php comment_reply_link(array_merge( $args, array( 'reply_text' => esc_html__(' Reply', 'rekon'), 'add_below' => 'comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</div>
	</div>
</li>