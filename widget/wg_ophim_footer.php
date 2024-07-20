<?php
class WG_oPhim_Footer extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'wg_footer', // Base ID
            __( 'Ophim Footer', 'ophim' ), // Name
            array( 'description' => __( 'Mẫu footer', 'ophim' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract($args);
        ob_start();
        echo $instance['footer'] ?? '';
        echo $after_widget;
        $html = ob_get_contents();
        ob_end_clean();
        echo $html;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    function form($instance)
    {
        $instance = wp_parse_args( (array) $instance, array(
            'title' 	=> '',
            'slug' 	=> '#',
            'postnum' 	=> 5,
            'style'		=> '1',
            'status'		=> 'all',
            'orderby'		=> 'new',
            'categories'		=> 'all',
            'actors'		=> 'all',
            'directors'		=> 'all',
            'genres'		=> 'all',
            'regions'		=> 'all',
            'years'		=> 'all',
        ) );
        extract($instance);

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('footer'); ?>"><?php _e('Footer', 'ophim') ?></label>
            <br />
            <textarea class="widefat" rows="10" id="<?php echo $this->get_field_id('footer'); ?>" name="<?php echo $this->get_field_name('footer'); ?>"  ><?php if(isset($instance['footer']) && $instance['footer']){ echo $instance['footer'];}else{ ?>  <section class="bg-black collection">
                    <div class="tray-title has-background"><h5>bộ sưu tập</h5></div>
                    <div class="container">
                    <div class="tray">
                    <div id="tu-khoa" class="tray-collection">
                    <div class="grid-container grid-flow tray-poster tu-khoa">
                    <div class="collection-item"><a href="/tu-khoa/disney-plus"
                    class="grid-item img-responsive"><img
                    src="https://s198.imacdn.com/ff/2021/03/08/a0d904ad483598b6_bcaf2bb0f6a9f95a_55737161520379431.jpg"
                    alt="Disney+"></a>
                    </div>
                    <div class="collection-item"><a href="/tu-khoa/phim-kinh-dien"
                    class="grid-item img-responsive"><img
                    src="https://s198.imacdn.com/ff/2019/10/26/0c2f054dbbcc519e_f5ea1f644016067e_36993157209593121.jpg"
                    alt="phim kinh điển"></a>
                    </div>
                    <div class="collection-item"><a href="/tu-khoa/phim-bom-tan"
                    class="grid-item img-responsive"><img
                    src="https://s198.imacdn.com/ff/2019/10/26/aa4cf62a8a41a8d0_a1bf98941af6ad02_40433157209595111.jpg"
                    alt="phim bom tấn"></a>
                    </div>
                    <div class="collection-item"><a href="/tu-khoa/dc-comics"
                    class="grid-item img-responsive"><img
                    src="https://s198.imacdn.com/ff/2019/10/26/f0de54c9fa04599a_31bb313de0a7d8e2_46641157209606931.jpg"
                    alt="DC Comics"></a>
                    </div>
                    <div class="collection-item"><a href="/tu-khoa/marvel"
                    class="grid-item img-responsive"><img
                    src="https://s198.imacdn.com/ff/2019/10/26/59cd8f092f6dd6fc_3aaacac701101d2a_49148157209609171.jpg"
                    alt="Marvel"></a>
                    </div>
                    <div class="collection-item"><a href="/tu-khoa/phim-bom-xit"
                    class="grid-item img-responsive"><img
                    src="https://s198.imacdn.com/ff/2019/10/26/49b4e06978defb37_8c148f128dc8d81e_41562157209621361.jpg"
                    alt="phim bom xịt"></a>
                    </div>
                    <div class="collection-item"><a href="/tu-khoa/phim-doat-giai-oscar"
                    class="grid-item img-responsive"><img
                    src="https://s198.imacdn.com/ff/2020/12/21/910d5cd341d55be1_e1c9d72b3465ab77_9058160852063491.jpg"
                    alt="phim đoạt giải oscar"></a>
                    </div>
                    <div class="collection-item"><a href="/tu-khoa/netflix-original"
                    class="grid-item img-responsive"><img
                    src="https://s198.imacdn.com/ff/2020/04/25/24875423cf93c11c_7d846b3e82c05490_29652158779284741.jpg"
                    alt="Netflix Original"></a>
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="tray">
                    Xem phim online miễn phí chất lượng cao với phụ đề tiếng việt - thuyết minh - lồng tiếng. Mọt phim có nhiều thể loại phim phong phú, đặc sắc, nhiều bộ phim hay nhất - mới nhất.<br />
                    Website với giao diện trực quan, thuận tiện, tốc độ tải nhanh, thường xuyên cập nhật các bộ phim mới hứa hẹn sẽ đem lại những trải nghiệm tốt cho người dùng.
                    </div>
                    </div>
                    </section><?php } ?></textarea>
        </p>

        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['footer'] = $new_instance['footer'];
        return $instance;
    }

}
function register_new_widget_Footer() {
    register_widget( 'WG_oPhim_Footer' );
}
add_action( 'widgets_init', 'register_new_widget_Footer' );
