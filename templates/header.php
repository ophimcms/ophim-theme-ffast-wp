<header>
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-header">
                <div class="navbar-brand">
                    <a href="/" title="" class="logo" rel="home">
                        <?php op_the_logo('max-width:50px') ?>
                    </a>
                </div>
                <div class="navbar-menu-toggle" id="navbar-toggle">
                    <i class="icon-menu"></i>
                </div>
            </div>
            <div class="navbar-left" id="navbar-left">
                <form method="GET" id="form-search" action="/" >
                    <div class="navbar-search">
                        <div class="search-box">
                            <input type="text" name="s" placeholder="Tìm kiếm phim..." value="<?php echo "$s"; ?>" autocomplete="off">
                            <i class="icon icon-search"></i>
                        </div>
                    </div>
                </form>
                <div class="navbar-menu">
                    <?php
                    $menu_items = wp_get_menu_array('primary-menu');
                    foreach ($menu_items as $key => $item) : ?>
                        <?php if (empty($item['children'])) { ?>
                            <li class="navbar-menu-item">
                                <a href="<?= $item['url'] ?>">
                                    <i class="icon icon-ribbon"></i> <?= $item['title'] ?> </a>
                            </li>
                        <?php } else { ?>
                            <li class="navbar-menu-item navbar-menu-has-sub">
                                <a href="javascript:void(0);">
                                    <i class="icon icon-book"></i> <?= $item['title'] ?> </a>
                                <ul class="navbar-submenu">
                                    <?php foreach ($item['children'] as $k => $child): ?>
                                        <li class="navbar-submenu-item">
                                            <a class="navbar-menu-ditem"
                                               href="<?= $child['url'] ?>"><?= $child['title'] ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>

                        <?php } ?>
                    <?php endforeach; ?>
                </div>
                <div class="navbar-close">
                    <i class="icon-close"></i>
                </div>
            </div>
        </div>
    </nav>
</header>
