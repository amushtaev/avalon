<?php
/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Avalon
 * @since 1.0
 * @version 1.0
 */
echo "header is loads";
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Спортивный клуб "Авалон"</title>
    <meta name="keywords" content="фитнес, тренажёры, харьков, чемпион, спорт">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="icon" href="templates/img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="templates/img/favicon.ico" type="image/x-icon">
    <link rel="StyleSheet" type="text/css" href="/wp-content/themes/avalon/vendor/css/reset.css?ver=4.9.8">
    <link rel="StyleSheet" type="text/css" href="/wp-content/themes/avalon/style.css?ver=4.9.8">
    <link rel="StyleSheet" type="text/css" href="/wp-content/themes/avalon/vendor/css/landing.css?ver=4.9.8">
    <link rel="stylesheet" media="screen and (max-width:800px)" href="/wp-content/themes/avalon/vendor/css/mobile_main.css?ver=4.9.8">
    <link rel="stylesheet" media="screen and (max-width:800px)" href="/wp-content/themes/avalon/vendor/css/mobile_landing.css?ver=4.9.8">
    <link rel="StyleSheet" type="text/css" href="/wp-content/themes/avalon/vendor/css/gallery.css?ver=4.9.8">

    <?php wp_head(); ?>
</head>
<body>
    <div id="free_fixed" style="right: 17px; margin-top: -110px; display: block;">
        <div id="ff_top"><div class="ff_bg"></div></div>
        <div id="ff_center">
            <div class="ff_bg">
                <span>Б<br>Е<br>С<br>П<br>Л<br>А<br>Т<br>Н<br>А<br>Я</span>
                <span>Т<br>Р<br>Е<br>Н<br>И<br>Р<br>О<br>В<br>К<br>А</span>
            </div>
        </div>
        <div id="ff_bottom"><div class="ff_bg"></div></div>
    </div>

    <div id="content">
        <div id="getwidth"></div>

        <?php if ( has_nav_menu( 'top' ) ) : ?>
        <div id="premenuwidth" class="stickytop" style="right: 17px;">
            <div id="premenu">
                <?php get_template_part( 'navigation/navigation', 'top' ); ?>
            </div><!-- .wrap -->
        </div><!-- .navigation-top -->
        <?php endif; ?>

        <section class="cont_block" id="block1">
            <object type="image/svg+xml" data="/wp-content/themes/avalon/img/avalon_logo.svg" id="logo"></object>
            <div id="clubs_link">
                <a href="#"><span></span></a>
            </div>
        </section>