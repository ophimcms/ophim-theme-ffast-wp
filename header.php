<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <link rel="profile" href="http://gmgp.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap&subset=vietnamese"
          rel="stylesheet">
</head>
<body>
<?php include_once THEME_URL.'/templates/header.php' ?>
<?php if(get_option('ophim_is_ads') == 'on') { ?>
<div class="container">
    <div id="sponsor-header" class="banner-masthead hidden">
        <div id=top_addd style="text-align: center"></div>
    </div>
</div>
<?php } ?>
