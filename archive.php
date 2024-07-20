<?php get_header(); ?>
<link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/list.css">
<link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/list_filter.css">
<div class="container">


    <section class="tray ">
        <div class="tray-title">
            <span class="icon icon-cinema"></span>
            <h5><?= single_tag_title(); ?></h5>
        </div>
        <div class="tray-content">
            <div class="tray-left">
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post(); ?>
                        <div class="row" style="margin-bottom: 20px">
                            <div class="col-md-12 blogShort">

                                <a href="<?php the_permalink(); ?>"><img style="width: 150px;margin-right: 15px" src="<?= op_remove_domain(get_the_post_thumbnail_url()) ?>"
                                                                         alt="<?php the_title(); ?>" class="pull-left img-responsive thumb margin10 img-thumbnail"></a>
                                <br>
                                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                <article>
                                    <p>
                                        <?php the_excerpt(); ?>
                                    </p></article>
                                <a class="btn btn-blog pull-right marginBottom10" href="<?php the_permalink(); ?>">Xem thêm</a>
                            </div>

                        </div>
                    <?php }
                    wp_reset_postdata();
                } ?>
            </div>
            <div class="tray-right"></div>
        </div>
        <nav>
            <?php ophim_pagination(); ?>
    </section>
</div>
<?php
get_footer();
?>
