<?php
get_header();
?>
<link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/home.css">

<?php if ( is_active_sidebar('widget-slider-poster') ) {
    dynamic_sidebar( 'widget-slider-poster' );
} else {
    _e('This is widget poster. Go to Appearance -> Widgets to add some widgets.', 'ophim');
}
?>
<?php if ( is_active_sidebar('widget-area') ) {
    dynamic_sidebar( 'widget-area' );
} else {
    _e(' Go to Appearance -> Widgets to add some widgets.', 'ophim');
}
?>
<?php
get_footer();
?>
