<?php
get_header();
?>
<link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/home.css">
<div class="container">
    <?php
    while ( have_posts() ) : the_post();
        ?>
        <div class="group-film">
            <h1><?php the_title(); ?></h1>
            <div class="content">
                <?php  the_content(); ?>
            </div>
        </div>
    <?php
    endwhile;
    ?>
</div>
<?php
get_footer();
?>
