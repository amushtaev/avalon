<?php
/**
* Основной шаблон сайта
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package WordPress
* @subpackage Avalon
* @since 1.0
*/

foreach (get_the_category() as $category) {
$post_type = $category->slug;
}
if ( have_posts()) :
$categories = get_the_category();
$category_id = $categories[0]->cat_ID;
endif;
?>
    <!DOCTYPE html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="keywords" content="фитнес, тренажёры, харьков, чемпион, спорт">
        <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">

        <link rel="icon" href="templates/img/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="templates/img/favicon.ico" type="image/x-icon">
    <link defer async rel="StyleSheet" type="text/css" href="/wp-content/themes/avalon/css/reset.css?ver=4.9.8">
    <link defer async rel="StyleSheet" type="text/css" href="/wp-content/themes/avalon/style.css?ver=4.9.8">
    <link defer async rel="StyleSheet" type="text/css" href="/wp-content/themes/avalon/css/landing.css?ver=4.9.8">
    <link defer async rel="StyleSheet" type="text/css" href="/wp-content/themes/avalon/css/gallery.css?ver=4.9.8">
    <style>
        body {font-size:14px; font-family:Arial, Helvetica, sans-serif;}
        strong {font-weight: bold;}
        #content {position:fixed; left:0; top:0; width:100%; bottom:0; overflow:auto; background-color:#fff;}
        .width_block {width:100%; min-width:1000px; position:relative; z-index:1;}
        .cont_block {width:1000px; box-sizing:border-box; margin:0 auto; position:relative; z-index:1;}
        h2 {font-size:38px; font-family:Arial, Helvetica, sans-serif; text-align:center; width:100%;}
        h3 {font-size:24px; font-family:Arial, Helvetica, sans-serif; text-align:center; width:100%;}
        #slider {width: 1000px;height: 400px;position: relative;}
        #slider_ani {position: relative;width: 1000px;margin: 0;text-align: center; height: 100%;}
        #slider_ani span {display: inline-block;height: 400px; width: 0;vertical-align: middle;padding: 0;margin: 0;}
        #slider_ani a {display: inline-block; vertical-align: middle; padding: 0;margin: 0;height: 100%;}
        #slider_ani object { max-width: 1000px; max-height: 400px; border: none;padding: 0;margin: 0; height: 100%;}
        .back-top{ margin: -13px auto; cursor:pointer; width:100px; height:40px; text-align:center;
            z-index:10000; font-size: 22px; line-height: 40px; background:#960174; -webkit-box-shadow: 0 -5px 15px -5px #000;
            -moz-box-shadow: 0 -5px 15px -5px #000; box-shadow: 0 -5px 15px -5px #000; -webkit-transition: all 300ms linear;
            -moz-transition: all 300ms linear; -o-transition: all 300ms linear; -ms-transition: all 300ms linear; transition: all 300ms linear;
            font-family:Arial, Helvetica, sans-serif; color: #fff; border-radius: 5px; }
        .back-top:hover{background:#c254bb; -webkit-box-shadow: 0 -5px 5px -5px #000;
            -moz-box-shadow: 0 -5px 5px -5px #000;  box-shadow: 0 -5px 5px -5px #000;}
    </style>
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
        <div id="ff_bottom">
            <div class="ff_bg"></div>
        </div>
    </div>
    <div id="content">
        <div id="getwidth"></div>

            <?php if ( has_nav_menu( 'top' ) ) : ?>
                <div id="premenuwidth" class="stickytop" style="right: 17px;">
                    <div id="premenu">
                        <?php get_template_part( 'navigation/navigation', 'top' ); ?>
                    </div>
                </div>
            <?php endif; ?>

        <section class="cont_block" id="block1">
            <a href="https://avalon.stimul.fitness/" class="svg">
                <object type="image/svg+xml" data="/wp-content/themes/avalon/img/avalon_logo.svg" id="logo"></object>
            </a>
            <div id="clubs_link">
                <a href="#"><span></span></a>
            </div>
        </section>
        <section class="width_block" id="block2">
            <div class="cont_block">
                <div id="slider">
                    <a rel="nofollow" data-target="_blank" href="javascript:show_popup('selectclub')">
                        <div id="slider_ani">
                            <object type="image/svg+xml" data="/wp-content/themes/avalon/img/header_slider.svg" onclick="show_popup('selectclub')"></object>
                        </div>
                    </a>
                    <div id="slider_buts">
                        <div onclick="bn_anishow('slider',1)" class="slider_now_but"></div>
                    </div>
                </div>

            </div>
        </section>
        <section id="mobile_banner">
            <a href="javascript:show_popup('selectclub')">
                <object type="image/svg+xml" data="/wp-content/themes/avalon/img/header_slider.svg"></object>
            </a>
        </section>
        <section class="cont_block" id="block3">
            <?php
            if ( have_posts() ) :
                query_posts_for_main($query_string, 'about-us', '1');
            endif;
            ?>
        </section>
        <section class="cont_block" id="block4">
            <h2>ПОЧЕМУ ВЫБИРАЮТ НАС?</h2>
            <ul id="b4_ul1">
                <li id="b4_li1">
                    <object type="image/svg+xml" data="/wp-content/themes/avalon/img/icon1.svg"></object>
                    <span>Расположение<br />близко к центру</span>
                </li>
                <li id="b4_li2">
                    <object type="image/svg+xml" data="/wp-content/themes/avalon/img/icon2.svg"></object>
                    <span>Чистота и порядок<br />во всем</span>
                </li>
                <li id="b4_li3">
                    <object type="image/svg+xml" data="/wp-content/themes/avalon/img/icon3.svg"></object>
                    <span>Дружелюбный<br />и приветливый коллектив</span>
                </li>
            </ul>
            <ul id="b4_ul2">
                <li id="b4_li4">
                    <span>Лояльность к клиенту<br />и клубная жизнь (мероприятия)</span>
                    <object type="image/svg+xml" data="/wp-content/themes/avalon/img/icon5.svg"></object>
                </li>
                <li id="b4_li5">
                    <span>Наличие доп услуг<br />на територии клуба</span>
                    <object type="image/svg+xml" data="/wp-content/themes/avalon/img/icon4.svg"></object>
                </li>
                <li id="b4_li6">
                    <span>Индивидуальный<br />тренинг Fit&Gym</span>
                    <object type="image/svg+xml" data="/wp-content/themes/avalon/img/icon6.svg"></object>
                </li>
            </ul>
        </section>
        <section class="width_block" id="block5">
            <div class="cont_block">
                <object type="image/svg+xml" data="/wp-content/themes/avalon/img/img_0259-min.svg" id="b5_img1"></object>
                <h3>
                    ПОПРОБУЙТЕ НАШИ ЗАЛЫ<br>
                    <span>БЕСПЛАТНО</span>
                </h3>
                <div id="free_form">
                        <span class="skew_select empty" id="free_club" data-change="undefined" data-value="">
                            <span>Авалон</span>
                            <div>Выберите удобный день</div>
                            <ul>
                                <li data-value="понедельник">
                                    <span>понедельник</span>
                                </li>
                                <li data-value="среда">
                                    <span>среда</span>
                                </li>
                                <li data-value="пятница">
                                    <span>пятница</span>
                                </li>
                            </ul>
                            <input id="day" type="hidden" value="" name="day" />
                        </span>
                    <br><br>
                    <span class="skew_input" id="free_phone" data-value="">
                            <span>+380</span>
                            <input type="text" value="" placeholder="__ ___-__-__" maxlength="12" name="phone">
                        </span>
                    <br><br>
                    <button class="skew_button" onclick="send_freetraining(this)">
                        <span>ОСТАВИТЬ ЗАЯВКУ</span>
                        <input class="submit-button" type="submit" value="Отправить" style="width: 100%;height: inherit;opacity: 0; position: relative; top: -18px;"/>
                        <img src="/wp-content/themes/avalon/img/loader.gif">
                    </button>
                </div>
                <div id="b5_text1">
                    <span>Оставьте свой номер телефона и наш администратор перезвонит
                    вам в ближайшее время и запишет на удобное для вас время</span>
                </div>
            </div>
        </section>
        <section class="cont_block" id="block6">
            <h2>КОМАНДА АВАЛОН</h2>
            <ul class="command" id="command"></ul>
            <div id="b6_text1">
                <button class="center_button" onclick="show_popup('command')">
                    <span>Ещё команда</span>
                </button>
            </div>
        </section>
        <section class="cont_block" id="block13" style="background-color: #f1f1f1;width: 100%; margin-top: 100px">
            <div class="cont_block">
                <object type="image/svg+xml" data="/wp-content/themes/avalon/img/personal_training_photo_640x415.svg"></object>
                <?php
                    get_template_part( 'content', 'personal' );
                ?>
            </div>
        </section>
        <section class="width_block" id="block7">
            <div class="cont_block">
                <h2>ГАЛЛЕРЕЯ</h2>
                <div id="photos">
                    <span><img src="/wp-content/themes/avalon/img/min_1.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_2.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_3.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_4.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_5.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_6.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_7.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_8.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_9.jpg"></span>
                </div>
                <div id="b7_text1">
                    <a href="#"></a>
                </div>
            </div>
        </section>
        <section class="cont_block" id="block8">
            <h2>НАШИ КЛИЕНТЫ О НАС</h2>
            <div id="reviews"></div>
            <div id="b8_text1">
                <button class="center_button" onclick="show_popup('reviews')"><span>Ещё отзывы &gt;</span></button>
            </div>
        </section>
        <section class="width_block" id="block9">
            <div class="cont_block">
                <h2>Стоимость тренажерного зала</h2>
                <div id="b9_button1">
                    <button class="center_button scroll red_button" href="#block5" top="250"><span>Попробовать бесплатно</span></button>
                </div>
                    <?php get_template_part( 'content', 'card' ); ?>
                <div id="cards_buyed">
                    <span style="color:#7f0082;">Первое посещение - БЕСПЛАТНО</span>
                </div>
            </div>
        </section>
        <section class="cont_block" id="block12">
            <h2>Новости клуба</h2>
            <ul>
                <?php
                get_template_part( 'content', 'news' );
                ?>
            </ul>
        </section>
        <section class="width_block" id="block10">
            <div class="cont_block">
                <div id="club_links">
                    <div>
                        <span><a href="tel:+380577375840">(057) 737-58-40</a></span>
                    </div>
                    <hr>
                    <div>
                        <span><a href="tel:+380637678038">(063) 767-80-38</a></span>
                    </div>
                </div>
                <div id="contacts">
                    <object type="image/svg+xml" data="/wp-content/themes/avalon/img/mail.svg" width="18" height="18"></object><span>avalonsport@gmail.com</span><br>
                    <object type="image/svg+xml" data="/wp-content/themes/avalon/img/post.svg" width="18" height="18"></object><span>Харьков, 61001, ул. Плехановская, 73<br />м. Спортивная / м. Метростроителей им. Ващенка</span><br>
                    <span style="padding-top: 10px;color: #989898b3">Тренажерный зал Авалон Стимул официальный сайт</span><br>
                </div>
                <div id="socials">
                    <a href="#" target="_blank"><object type="image/svg+xml" data="/wp-content/themes/avalon/img/vk.svg" width="40" height="40"></object></a>
                    <a href="#" target="_blank"><object type="image/svg+xml" data="/wp-content/themes/avalon/img/fb.svg" width="40" height="43"></object></a>
                    <a href="#" target="_blank"><object type="image/svg+xml" data="/wp-content/themes/avalon/img/instagram.svg" width="40" height="43"></object></a>
                </div>
            </div>
        </section>

        <section class="width_block" id="block11" title="Открыть карту" onclick="show_popup('selectclub')" style="cursor: pointer">
            <div class="back-top">карта</div>
        </section>
    </div>
    <div id="mobile_header">
        <?php if ( has_nav_menu( 'mobile' ) ) : ?>
            <?php get_template_part( 'navigation/navigation', 'mobile' ); ?>
        <?php endif; ?>
        <a href="https://avalon.stimul.fitness/" class="svg">
            <object type="image/svg+xml" data="/wp-content/themes/avalon/img/avalon_logo.svg" id="mobile_logo"></object>
        </a>
        <div id="clubs_btn">
            <span>Меню</span>
            <object type="image/svg+xml" data="/wp-content/themes/avalon/img/clubs_btn.svg" width="17" height="20"></object>
            <div>
            </div>
        </div>
    </div>
<?php
get_template_part( 'content', 'popup' );
?>
    <link defer async rel="stylesheet" media="screen and (max-width:800px)" href="/wp-content/themes/avalon/css/mobile_main.css?ver=4.9.8">
    <link defer async rel="stylesheet" media="screen and (max-width:800px)" href="/wp-content/themes/avalon/css/mobile_landing.css?ver=4.9.8">
</body>
</html>
<?php
function query_posts_for_main($query_string, $slug, $n){
    query_posts($query_string .'category_name='. $slug .'&posts_per_page='. $n .'');
    while ( have_posts() ) : the_post();
        get_template_part( 'content', $slug );
    endwhile;
}
?>