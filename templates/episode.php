<link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/film.css">
<div class="container">
    <div class="player-wrapper" id="player-wrapper">
        <?php if (!watchUrl()) { ?>
            <div style="background-image: url('<?= op_get_poster_url() ?>'); background-size: cover;" class="player-error-display">
                <div style="background: #000000cf;width: 100%;height: 100%">
                    <i class="icon-alert"></i><span class="player-error-message">Phim đang được cập nhật</span>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php get_sidebar('ophim'); ?>
    <div class="film-info">
        <div class="film-info-header">
            <div class="film-info-action">
                <a data-id="<?= episodeName() ?>" data-link="<?= m3u8EpisodeUrl() ?>" data-type="m3u8"
                   onclick="chooseStreamingServer(this)" class="film-info-server streaming-server">
                    <i class="icon icon-action icon-play"></i>
                    <span>Server #1</span>
                </a>
                <a data-id="<?= episodeName() ?>" data-link="<?= embedEpisodeUrl() ?>" data-type="embed"
                   onclick="chooseStreamingServer(this)" class="film-info-server streaming-server">
                    <i class="icon icon-action icon-play"></i>
                    <span>Server #2</span>
                </a>
            </div>
            <h1 class="film-info-title"><?php the_title(); ?> <?php episodeName()?> </h1>
            <div class="film-info-views">
                <span class="hidden-sx">Lượt xem: <?= op_get_post_view() ?> </span>
                <span class="display-sx"><?= op_get_post_view() ?> xem</span>
            </div>
            <div class="film-raty">
                <input id="hint_current" type="hidden" value=""/>
                <input id="score_current" type="hidden" value="<?= op_get_rating() ?>"/>
                <div id="star" data-score="<?= op_get_rating() ?>"
                     style="cursor: pointer;"></div>
                <span id="hint"></span>
                <div id="div_average" style="">
                    (<span class="average" id="average"><?= op_get_rating() ?></span>
                    đ/<span id="rate_count"> / <?= op_get_rating_count() ?></span> lượt)
                </div>
                <span class="hidden" itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
                <meta itemprop="ratingValue" content="<?= op_get_rating() ?>"/>
                <meta itemprop="ratingcount" content="<?= op_get_rating_count() ?>"/>
                <meta itemprop="bestRating" content="10"/>
                <meta itemprop="worstRating" content="1"/>
            </span>
            </div>

        </div>
        <div class="film-info-tab">
            <div class="info-tab-item tab-information ">Thông tin</div>
            <div
                    class="info-tab-item tab-episode activated">Danh sách tập</div>
            <div class="info-tab-item tab-comment">Bình luận</div>
        </div>
        <div class="film-content hidden">
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
                <?= op_get_tags() ?>
            </div>
        </div>

        <div class="film-episode">
            <div class="episode-list-header">
                <?php foreach (episodeList() as $key => $server) { ?>
                <div
                        class="episode-group-tab tab-<?= $key ?> <?php if($key == episodeSV()  ){ echo 'activated';} ?>"
                        data-tab="<?= $key ?>">
                    <?= $server['server_name'] ?>
                </div>
                <?php } ?>
            </div>
            <div class="episode-list">
                <?php foreach (episodeList() as $key => $server) { ?>
                <div
                        class="episode-group group-<?= $key ?> <?php if($key != episodeSV()  ){ echo 'hidden';} ?>"
                        data-group="<?= $key ?>">

                    <?php foreach ($server['server_data'] as $list) {
                        $current = '';
                        $url = hrefEpisode($list["name"],$key);
                        if (slugify($list['name']) == episodeName()&& episodeSV() == $key) {
                            $current = 'activated';
                        }?>
                        <a class="episode-item episode- <?= $current?>"
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
    </div>


    <?php
    add_action('wp_footer', function () {?>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

        <script src="<?= get_template_directory_uri() ?>/assets/player/js/p2p-media-loader-core.min.js"></script>
        <script src="<?= get_template_directory_uri() ?>/assets/player/js/p2p-media-loader-hlsjs.min.js"></script>
    <?php op_jwpayer_js(); ?>

        <script>
            jQuery(document).ready(function () {
                jQuery('html, body').animate({
                    scrollTop: jQuery('#player-wrapper').offset().top
                }, 'slow');
            });
        </script>

        <script>
            var episode_id = '<?= episodeName() ?>';
            const wrapper = document.getElementById('player-wrapper');
            const vastAds = "<?= get_option('ophim_jwplayer_advertising_file') ?>";

            function chooseStreamingServer(el) {
                const type = el.dataset.type;
                const link = el.dataset.link.replace(/^http:\/\//i, 'https://');
                const id = el.dataset.id;

                episode_id = id;


                Array.from(document.getElementsByClassName('streaming-server')).forEach(server => {
                    server.classList.remove('active');
                })
                el.classList.add('active');

                renderPlayer(type, link, id);
            }

            function renderPlayer(type, link, id) {
                if (type == 'embed') {
                    if (vastAds) {
                        wrapper.innerHTML = `<div id="fake_jwplayer"></div>`;
                        const fake_player = jwplayer("fake_jwplayer");
                        const objSetupFake = {
                            key: "<?= get_option('ophim_jwplayer_license', 'ITWMv7t88JGzI0xPwW8I0+LveiXX9SWbfdmt0ArUSyc=') ?>",
                            aspectratio: "16:9",
                            width: "100%",
                            file: "<?= get_template_directory_uri() ?>/assets/player/1s_blank.mp4",
                            volume: 100,
                            mute: false,
                            autostart: true,
                            advertising: {
                                tag: "<?= get_option('ophim_jwplayer_advertising_file') ?>",
                                client: "vast",
                                vpaidmode: "insecure",
                                skipoffset: <?= get_option('ophim_jwplayer_advertising_skipoffset') ?:  5 ?>, // Bỏ qua quảng cáo trong vòng 5 giây
                                skipmessage: "Bỏ qua sau xx giây",
                                skiptext: "Bỏ qua"
                            }
                        };
                        fake_player.setup(objSetupFake);
                        fake_player.on('complete', function(event) {
                            $("#fake_jwplayer").remove();
                            wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                            fake_player.remove();
                        });

                        fake_player.on('adSkipped', function(event) {
                            $("#fake_jwplayer").remove();
                            wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                            fake_player.remove();
                        });

                        fake_player.on('adComplete', function(event) {
                            $("#fake_jwplayer").remove();
                            wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                            fake_player.remove();
                        });
                    } else {
                        if (wrapper) {
                            wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                        }
                    }
                    return;
                }

                if (type == 'm3u8' || type == 'mp4') {
                    wrapper.innerHTML = `<div id="jwplayer"></div>`;
                    const player = jwplayer("jwplayer");
                    const objSetup = {
                        key: "<?= get_option('ophim_jwplayer_license', 'ITWMv7t88JGzI0xPwW8I0+LveiXX9SWbfdmt0ArUSyc=') ?>",
                        aspectratio: "16:9",
                        width: "100%",
                        image: "<?= op_get_poster_url() ?>",
                        file: link,
                        playbackRateControls: true,
                        playbackRates: [0.25, 0.75, 1, 1.25],
                        sharing: {
                            sites: [
                                "reddit",
                                "facebook",
                                "twitter",
                                "googleplus",
                                "email",
                                "linkedin",
                            ],
                        },
                        volume: 100,
                        mute: false,
                        autostart: true,
                        logo: {
                            file: "<?= get_option('ophim_jwplayer_logo_file') ?>",
                            link: "<?= get_option('ophim_jwplayer_logo_link') ?>",
                            position: "<?= get_option('ophim_jwplayer_logo_position') ?>",
                        },
                        advertising: {
                            tag: "<?= get_option('ophim_jwplayer_advertising_file') ?>",
                            client: "vast",
                            vpaidmode: "insecure",
                            skipoffset: <?= get_option('ophim_jwplayer_advertising_skipoffset') ?:  5 ?>, // Bỏ qua quảng cáo trong vòng 5 giây
                            skipmessage: "Bỏ qua sau xx giây",
                            skiptext: "Bỏ qua"
                        }
                    };

                    if (type == 'm3u8') {
                        const segments_in_queue = 50;

                        var engine_config = {
                            debug: !1,
                            segments: {
                                forwardSegmentCount: 50,
                            },
                            loader: {
                                cachedSegmentExpiration: 864e5,
                                cachedSegmentsCount: 1e3,
                                requiredSegmentsPriority: segments_in_queue,
                                httpDownloadMaxPriority: 9,
                                httpDownloadProbability: 0.06,
                                httpDownloadProbabilityInterval: 1e3,
                                httpDownloadProbabilitySkipIfNoPeers: !0,
                                p2pDownloadMaxPriority: 50,
                                httpFailedSegmentTimeout: 500,
                                simultaneousP2PDownloads: 20,
                                simultaneousHttpDownloads: 2,
                                // httpDownloadInitialTimeout: 12e4,
                                // httpDownloadInitialTimeoutPerSegment: 17e3,
                                httpDownloadInitialTimeout: 0,
                                httpDownloadInitialTimeoutPerSegment: 17e3,
                                httpUseRanges: !0,
                                maxBufferLength: 300,
                                // useP2P: false,
                            },
                        };
                        if (Hls.isSupported() && p2pml.hlsjs.Engine.isSupported()) {
                            var engine = new p2pml.hlsjs.Engine(engine_config);
                            player.setup(objSetup);
                            jwplayer_hls_provider.attach();
                            p2pml.hlsjs.initJwPlayer(player, {
                                liveSyncDurationCount: segments_in_queue, // To have at least 7 segments in queue
                                maxBufferLength: 300,
                                loader: engine.createLoaderClass(),
                            });
                        } else {
                            player.setup(objSetup);
                        }
                    } else {
                        player.setup(objSetup);
                    }


                    const resumeData = 'OPCMS-PlayerPosition-' + id;
                    player.on('ready', function() {
                        if (typeof(Storage) !== 'undefined') {
                            if (localStorage[resumeData] == '' || localStorage[resumeData] == 'undefined') {
                                console.log("No cookie for position found");
                                var currentPosition = 0;
                            } else {
                                if (localStorage[resumeData] == "null") {
                                    localStorage[resumeData] = 0;
                                } else {
                                    var currentPosition = localStorage[resumeData];
                                }
                                console.log("Position cookie found: " + localStorage[resumeData]);
                            }
                            player.once('play', function() {
                                console.log('Checking position cookie!');
                                console.log(Math.abs(player.getDuration() - currentPosition));
                                if (currentPosition > 180 && Math.abs(player.getDuration() - currentPosition) >
                                    5) {
                                    player.seek(currentPosition);
                                }
                            });
                            window.onunload = function() {
                                localStorage[resumeData] = player.getPosition();
                            }
                        } else {
                            console.log('Your browser is too old!');
                        }
                    });

                    player.on('complete', function() {
                        <?php if(nextEpisodeUrl()){ ?>
                        window.location.href = "<?= nextEpisodeUrl() ?>";
                        <?php }?>
                        if (typeof(Storage) !== 'undefined') {
                            localStorage.removeItem(resumeData);
                        } else {
                            console.log('Your browser is too old!');
                        }
                    })

                    function formatSeconds(seconds) {
                        var date = new Date(1970, 0, 1);
                        date.setSeconds(seconds);
                        return date.toTimeString().replace(/.*(\d{2}:\d{2}:\d{2}).*/, "$1");
                    }
                }
            }
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const episode = '<?= episodeName() ?>';
                let playing = document.querySelector(`[data-id="${episode}"]`);
                if (playing) {
                    playing.click();
                    return;
                }

                const servers = document.getElementsByClassName('streaming-server');
                if (servers[0]) {
                    servers[0].click();
                }
            });
        </script>
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

    <?php }); ?>
