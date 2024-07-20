<link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/film.css">
<div class="container">
    <div class="player-wrapper"
         style="background: url(<?= op_get_thumb_url() ?>;)no-repeat fixed center;  background-size: cover;"
         id="player-wrapper">
        <?php if (!watchUrl()) { ?>
            <div style="background-image: url('<?= op_get_poster_url() ?>'); background-size: cover;"
                 class="player-error-display">
                <div style="background: #000000cf;width: 100%;height: 100%">
                    <i class="icon-alert"></i><span class="player-error-message">Phim đang được cập nhật</span>
                </div>
            </div>
        <?php } ?>
    </div>

    <?php get_sidebar('ophim'); ?>
    <div class="film-info-tab">
        <div class="info-tab-item tab-information activated">Thông tin</div>
        <div
                class="info-tab-item tab-episode ">Danh sách tập</div>
        <div class="info-tab-item tab-comment">Bình luận</div>
    </div>
    <div class="film-content ">
        <?php if (watchUrl()) { ?>
           <a href="<?=watchUrl()?>" style="background-color: #0285b5;
  border: none;
  color: white;
  padding: 15px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;"> Xem Phim</a>
        <?php } ?>
        <div class="film-info-genre">
            Quốc gia:
            <?= op_get_regions(', ') ?>
        </div>
        <div class="film-info-genre">
            Năm phát hành: <?= op_get_years() ?>
        </div>
        <div class="film-info-genre">
            Chất lượng:
            <?= op_get_quality() ?>
        </div>
        <div class="film-info-genre">
            Âm thanh:
            <?= op_get_lang() ?>
        </div>
        <div class="film-info-genre">
            Cập nhật:
            <?= op_get_episode() ?>
        </div>
        <div class="film-info-genre">Tên khác:  <?= op_get_original_title() ?> </div>
        <div class="film-info-genre">
            Thể loại:
            <?= op_get_genres(', ') ?>
        </div>
        <div class="film-info-genre">
            Đạo diễn:
            <?= op_get_directors(10,', ') ?>
        </div>
        <div class="film-info-genre">
            Diễn viên:
            <?= op_get_actors(10,', ') ?>
        </div>
        <div class="film-info-description">
            <p><?php the_content();?></p>
        </div>
        <div class="film-info-tag">
            <?= op_get_tags(', ') ?>
        </div>
    </div>

    <div class="film-episode hidden">
        <div class="episode-list-header">
            <?php foreach (episodeList() as $key => $server) { ?>
                <div
                        class="episode-group-tab tab-<?= $key ?>"
                        data-tab="<?= $key ?>">
                    <?= $server['server_name'] ?>
                </div>
            <?php } ?>
        </div>
        <div class="episode-list">
            <?php foreach (episodeList() as $key => $server) { ?>
                <div
                        class="episode-group group-<?= $key ?> "
                        data-group="<?= $key ?>">

                    <?php foreach ($server['server_data'] as $list) {
                        $url = hrefEpisode($list["name"],$key); ?>
                        <a class="episode-item "
                           href="<?= $url?>">
                            <span
                                    class="episode-name">Tập <?= $list['name'] ?></span>
                            <span class="episode-detail-name"><?= $server['server_name'] ?></span>
                            <div class="episode-play"><i class="icon-play"></i></div>
                        </a>
                        <?php
                    } ?>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="film-comment hidden">
        <div id="comments" class="extcom">
            <div class="fb-comments w-full" data-href="<?= getCurrentUrl() ?>" data-width="100%"
                 data-numposts="5" data-colorscheme="light" data-lazy="true">
            </div>
        </div>
    </div>
</div>


<?php add_action('wp_footer', function () { ?>

    <link href="<?= get_template_directory_uri() ?>/assets/libs/jquery-raty/jquery.raty.css" rel="stylesheet"/>
    <script src="<?= get_template_directory_uri() ?>/assets/libs/jquery-raty/jquery.raty.js"></script>

    <script src="<?= get_template_directory_uri() ?>/assets/js/film.js"></script>
    <script>
        var rated = false;
        jQuery(document).ready(function ($) {
            $('#star').raty({
                number: 10,
                starHalf: '<?= get_template_directory_uri() ?>/assets/libs/jquery-raty/images/star-half.png',
                starOff: '<?= get_template_directory_uri() ?>/assets/libs/jquery-raty/images/star-off.png',
                starOn: '<?= get_template_directory_uri() ?>/assets/libs/jquery-raty/images/star-on.png',
                click: function (score, evt) {
                    if (!rated) {
                        $.ajax({
                            url: '<?php echo admin_url('admin-ajax.php')?>',
                            type: 'POST',
                            data: {
                                action: "ratemovie",
                                rating: score,
                                postid: '<?php echo get_the_ID(); ?>',
                            },
                        }).done(function (data) {
                            alert("Đánh giá của bạn đã được gửi đi!");
                            rated = true;

                        });

                    }
                }
            });
        })
    </script>
<?php }) ?>