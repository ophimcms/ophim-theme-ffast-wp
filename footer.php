<?php
if ( is_active_sidebar('widget-footer') ) {
    dynamic_sidebar( 'widget-footer' );
} else {
    _e('This is widget footer. Go to Appearance -> Widgets to add some widgets.', 'ophim');
}
?>
<div class="modal-trailer">
    <div class="modal-trailer-content">
        <div class="modal-trailer-close"><i class="icon-close"></i></div>
        <div class="loading"></div>
        <div class="modal-player"></div>
        <div class="modal-info"></div>
    </div>
</div>
<div class="floating-action">
    <div class="action-item action-toggle"><i class="icon-assistive"></i></div>
    <div class="action-item action-home"><i class="icon-home"></i></div>
    <div class="action-item action-menu"><i class="icon-menu"></i></div>
    <div class="action-item action-top"><i class="icon-up"></i></div>
</div>
<script>
    var _GLOBAL_URL = "/"
</script>
<script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/bhome.js"></script>
<?php wp_footer(); ?>
</html>