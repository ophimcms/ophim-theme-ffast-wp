<?php

//ajax search
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
    ?>
    <script type="text/javascript">
        function fetch(){

            $("#result").html('');
            key = jQuery('#query_search').val();
            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: { action: 'search_film', keyword:key ,limit : 5 },
                success: function(res) {
                    $("#result").html('<br><br><br>');
                    let data = JSON.parse(res);
                    $.each(data, function(key, value){
                        $('#result').append('<p class=""> <a href="'+value.slug+'"><img src="'+value.image+'" height="40" width="40" class="img-thumbnail" /> '+value.title+' <br> <span class="text-muted">'+value.original_title+'</span>| <span class="text-muted">'+value.year+'</span></a><hr></p>')
                    });
                }
            });

        }
    </script>

    <?php
}

//search fim
function mySearchFilter($query) {
    if ($query->is_search) {
        if (!isset($_GET['filter'])){
            $_GET['filter']['categories'] ='';
            $_GET['filter']['genres'] ='';
            $_GET['filter']['regions'] ='';
            $_GET['filter']['years'] ='';
        }
        $categories = $_GET['filter']['categories'];
        $years = $_GET['filter']['years'];
        $genres = $_GET['filter']['genres'];
        $regions = $_GET['filter']['regions'];
        $query->set('post_type', 'ophim');
        $args = array();
        if($categories) {
            $args[] = array(
                'taxonomy' => 'ophim_categories',
                'field' => 'slug',
                'terms' => $categories,
            );
        }
        if($years) {
            $args[] = array(
                'taxonomy' => 'ophim_years',
                'field' => 'slug',
                'terms' => $years,
            );
        }
        if($genres) {
            $args[] = array(
                'taxonomy' => 'ophim_genres',
                'field' => 'slug',
                'terms' => $genres,
            );
        }
        if($regions) {
            $args[] = array(
                'taxonomy' => 'ophim_regions',
                'field' => 'slug',
                'terms' => $regions,
            );
        }
        $query->set('tax_query',$args);
    };
    return $query;
};

add_filter('pre_get_posts','mySearchFilter');
