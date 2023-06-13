<?php
extract( $args );
extract( $instance );

$title = apply_filters('widget_title', $instance['title']);

if ( $title ) {
    echo trim($before_title)  . $title . $after_title;
}

?>

<div class="contact-info-widget">

<?php
if ( $phone_icon != '' || $phone_title != '' || $phone_content != '' ) {
    ?>
    <div class="media phone-info pull-right">
        <?php if ( $phone_icon ) { ?>
            <div class="media-left">
                <div class="icon">
                    <i class="<?php echo esc_attr($phone_icon); ?>"></i>
                </div>
            </div>
        <?php } ?>
        <div class="media-body">
            <?php if ($phone_title) { ?>
                <div class="title"><?php echo trim($phone_title); ?></div>
            <?php } ?>
            <?php if ($phone_content) { ?>
                <div class="content"><?php echo trim($phone_content); ?></div>
            <?php } ?>
        </div>
    </div>
    <?php
}
?>

<?php
if ( $email_icon != '' || $email_title != '' || $email_content != '' ) {
    ?>
    <div class="media email-info pull-right">
        <?php if ( $email_icon ) { ?>
            <div class="media-left">
                <div class="icon">
                    <i class="<?php echo esc_attr($email_icon); ?>"></i>
                </div>
            </div>
        <?php } ?>
        <div class="media-body">
            <?php if ($email_title) { ?>
                <div class="title"><?php echo trim($email_title); ?></div>
            <?php } ?>
            <?php if ($email_content) { ?>
                <div class="content"><?php echo trim($email_content); ?></div>
            <?php } ?>
        </div>
    </div>
    <?php
}
?>

<?php
if ( $address_icon != '' || $address_title != '' || $address_content != '' ) {
    ?>
    <div class="media address-info pull-right">
        <?php if ( $address_icon ) { ?>
            <div class="media-left">
                <div class="icon">
                    <i class="<?php echo esc_attr($address_icon); ?>"></i>
                </div>
            </div>
        <?php } ?>
        <div class="media-body">
            <?php if ($address_title) { ?>
                <div class="title"><?php echo trim($address_title); ?></div>
            <?php } ?>
            <?php if ($address_content) { ?>
                <div class="content"><?php echo trim($address_content); ?></div>
            <?php } ?>
        </div>
    </div>
    <?php
}
?>
</div>