<?php
get_header();
?>
<link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/list.css">
<link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/list_filter.css">
<div class="container">
    <div class="filterMovies">
        <form id="form-search" class="filterForm" method="GET" action="/">
            <div class="filterItems">
                <select class="filterSelect" id="category" name="filter[genres]" form="form-search">
                    <option value="">Tất cả thể loại</option>
                    <?php $genres = get_terms(array('taxonomy' => 'ophim_genres', 'hide_empty' => false,));?>
                    <?php foreach($genres as $genre) { ?>
                        <option value='<?php echo $genre->name; ?>' ><?php echo $genre->name ; ?> </option>
                    <?php } ?>
                </select>
            </div>
            <div class="filterItems">
                <select class="filterSelect" name="filter[regions]" form="form-search">
                    <option value="">Tất cả quốc gia</option>
                    <?php $regions = get_terms(array('taxonomy' => 'ophim_regions', 'hide_empty' => false,));?>
                    <?php foreach($regions as $region) { ?>
                        <option value='<?php echo $region->name; ?>' ><?php echo $region->name ; ?> </option>
                    <?php } ?>
                </select>
            </div>
            <div class="filterItems">
                <select class="filterSelect" name="filter[years]" form="form-search">
                    <option value="">Tất cả năm</option>
                    <?php $years = get_terms(array('taxonomy' => 'ophim_years', 'hide_empty' => false,));?>
                    <?php foreach($years as $year) { ?>
                        <option value='<?php echo $year->name; ?>'><?php echo $year->name ; ?> </option>
                    <?php } ?>
                </select>
            </div>
            <div class="filterItems">
                <select class="filterSelect" id="type" name="filter[categories]" form="form-search">
                    <option value="">Mọi định dạng</option>
                    <?php $categories = get_terms(array('taxonomy' => 'ophim_categories', 'hide_empty' => false,));?>
                    <?php foreach($categories as $category) { ?>
                        <option value='<?php echo $category->name; ?>' ><?php echo $category->name ; ?> </option>
                    <?php } ?>
                </select>
            </div>
            <div class="filterItems">
                <button class="filterButtonSubmit" form="form-search" type="submit">Lọc Phim</button>
            </div>
            <div class="clearfix"></div>
        </form>
    </div>

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
                        <div class="tray-item" id="film-id-<?= get_the_ID() ?>">
                            <a href="<?php the_permalink(); ?>">
                                <img class="tray-item-thumbnail"
                                     src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                     data-src="<?= op_get_thumb_url() ?>" alt="<?php the_title(); ?>">
                                <div class="tray-item-description">
                                    <span class="tray-item-quality"><?= op_get_quality() ?></span>
                                    <div class="tray-item-title"><?php the_title(); ?></div>
                                    <div class="tray-item-meta-info">
                                        <div class="tray-film-views"><?= op_get_post_view() ?> xem</div>
                                        <div class="tray-film-likes">
                                            <?= op_get_episode() ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tray-item-play-button">
                                    <i class="icon-play"></i>
                                </div>
                                <div class="tray-item-audio"><?= op_get_lang() ?></div>
                            </a>
                            <?php if(op_get_trailer_url()): ?>
                                <div class="tray-item-trailer" data-id="<?= get_the_ID() ?>" title="Xem trailer">
                                    <i class="icon-youtube"></i>
                                </div>
                            <?php endif ?>
                        </div>
                        <?php
                    } wp_reset_postdata();  }
                else { ?>
                    <p>Rất tiếc, không có nội dung nào trùng khớp yêu cầu</p>
                <?php } ?>
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
