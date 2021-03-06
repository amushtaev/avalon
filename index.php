<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Avalon
 * @since Avalon 1.0
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
    <?php get_header(); ?>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="keywords" content="фитнес, тренажёры, харьков, авалон, спорт">
        <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
        <meta name="description" content="Stimul Gym — это процветающий, активно развивающийся клуб, ставящий перед собой цель: максимально качественное предоставление услуг в сфере здорового образа жизни.">

        <link rel="icon" href="/wp-content/themes/avalon/img/favicon.gif" type="image/x-icon">
        <link rel="shortcut icon" href="/wp-content/themes/avalon/img/favicon.gif" type="image/x-icon">
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
            #slider {width: 100%;height: 400px;position: relative;}
            #slider_ani {position: relative;margin: 0;text-align: center; height: 100%;}
            #slider_ani span {display: inline-block;height: 400px; width: 0;vertical-align: middle;padding: 0;margin: 0;}
            #slider_ani a {display: inline-block; vertical-align: middle; padding: 0;margin: 0;height: 100%;}
            #slider_ani object { max-width: 1360px; max-height: 400px; border: none;padding: 0;margin: 0; height: 100%;}
            .back-top{ margin: -13px auto; cursor:pointer; width:100px; height:40px; text-align:center;
                z-index:10000; font-size: 22px; line-height: 40px; background:#960174; -webkit-box-shadow: 0 -5px 15px -5px #000;
                -moz-box-shadow: 0 -5px 15px -5px #000; box-shadow: 0 -5px 15px -5px #000; -webkit-transition: all 300ms linear;
                -moz-transition: all 300ms linear; -o-transition: all 300ms linear; -ms-transition: all 300ms linear; transition: all 300ms linear;
                font-family:Arial, Helvetica, sans-serif; color: #fff; border-radius: 5px; }
            .back-top:hover{background:#c254bb; -webkit-box-shadow: 0 -5px 5px -5px #000;
                -moz-box-shadow: 0 -5px 5px -5px #000;  box-shadow: 0 -5px 5px -5px #000;}
        </style>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-16495942-12"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'AW-1019819457');
            gtag('config', 'UA-16495942-12');
        </script>
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
            <a id="logo" href="<?php echo get_home_url(); ?>" class="svg">
                <svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 124.9 69.3" style="height: 100%;" xml:space="preserve">
                <image style="overflow:visible;enable-background:new    ;" width="632" height="372" xlink:href="/wp-content/themes/avalon/img/Logo.png"  transform="matrix(0.1853 0 0 0.1853 3.4413 0.4671)" />
            </a>
            <div id="clubs_link">
                <a href="#"><span></span></a>
            </div>
        </section>
        <section class="width_block" id="block2">
            <div class="cont_block" style="width: 100%;">
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
        <section class="width_block" id="block5">
            <div class="cont_block">
                <object type="image/svg+xml" data="/wp-content/themes/avalon/img/img_0259-min.svg" id="b5_img1"></object>
                <h3>
                    ПОПРОБУЙТЕ НАШИ ЗАЛЫ<br>
                    <span>БЕСПЛАТНО</span>
                </h3>
                <div id="free_form">
                    <!--<select class="skew_select" id="free_club" data-placeholder="Stimul Gym" data-empty="Выберите удобный день">
                        <option value="понедельник">понедельник</option>
                        <option value="среда">среда</option>
                        <option value="пятница">пятница</option>
                    </select>
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
                    </ul>-->
                    <input id="day" type="hidden" value="" name="day" />
                    <br>
                    <span class="skew_input" id="free_name" data-value="" style="margin-top: 4px;">
                        <input type="text" value="" placeholder="Имя" maxlength="12" name="name" style="width: 294px;">
                    </span>
                    <br>
                    <span class="skew_input" id="free_full_name" data-value="" style="margin-top: 4px;">
                        <input type="text" value="" placeholder="Фамилия" maxlength="12" name="full_name" style="width: 294px;">
                    </span>
                    <br>
                    <span class="skew_input" id="free_phone" data-value="" style="margin-top: 4px;">
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
                    <span>Оставьте свой номер телефона и наш менеджер перезвонит
                    вам в ближайшее время и запишет на удобное для вас время</span>
                </div>
            </div>
        </section>
        <section class="cont_block" id="block3">
            <?php
            if ( have_posts() ) :
                $query_string = '';
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
                    <span>Лояльность к клиенту</span>
                    <object type="image/svg+xml" data="/wp-content/themes/avalon/img/icon5.svg"></object>
                </li>
                <li id="b4_li5">
                    <span>Персональный<br />тренер</span>
                    <object type="image/svg+xml" data="/wp-content/themes/avalon/img/icon4.svg"></object>
                </li>
                <li id="b4_li6">
                    <span>Программы на похудение/<br />набор мышечной массы</span>
                    <object type="image/svg+xml" data="/wp-content/themes/avalon/img/icon6.svg"></object>
                </li>
            </ul>
        </section>
        <section class="cont_block" id="block6" style="display: none">
            <h2>КОМАНДА Stimul Gym</h2>
            <ul class="command" id="command"></ul>
            <div id="b6_text1">
                <button class="center_button" onclick="show_popup('command')">
                    <span>Ещё команда</span>
                </button>
            </div>
        </section>
        <section class="cont_block" id="block13" style="background-color: #f1f1f1;width: 100%; margin-top: -50px">
            <div class="cont_block">
                <object type="image/svg+xml" data="/wp-content/themes/avalon/img/personal_training_photo_640x415.svg"></object>
                <?php
                get_template_part( 'content', 'personal' );
                ?>
            </div>
            <button class="center_button scroll" href="#block5">
                <span>ОСТАВИТЬ ЗАЯВКУ</span>
            </button>
        </section>
        <section class="width_block" id="block7">
            <div class="cont_block">
                <h2>ГАЛЕРЕЯ</h2>
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
                    <span><img src="/wp-content/themes/avalon/img/min_10.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_11.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_12.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_13.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_14.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_15.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_16.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_17.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_18.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_19.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_20.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_21.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_22.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_23.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_24.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_25.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_26.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_27.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_28.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_29.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_30.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_31.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_32.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_33.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_34.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_35.jpg"></span>
                    <span><img src="/wp-content/themes/avalon/img/min_36.jpg"></span>
                </div>
                <div id="b7_text1">
                    <a href="#"></a>
                </div>
            </div>
            <button class="center_button scroll" href="#block5">
                <span>ОСТАВИТЬ ЗАЯВКУ</span>
            </button>
        </section>
        <section class="cont_block" id="block8" style="width: 100%;">
            <h2>НАШИ КЛИЕНТЫ О НАС</h2>
            <div id="reviews" style="max-width: 1290px; margin: auto">
                <?php
                $args = array( 'posts_per_page' => 10,
                    'category_name' => 'review-mains' );
                //thumbnail, medium, large или full
                $review_mains = get_posts( $args );
                $size = 'thumbnail';
                $i = 0;
                foreach ( $review_mains as $post ) : setup_postdata( $post );
                    if($i < 3) :
                    ?>
                    <div class="review">
                        <div class="rev_img">
                            <?php if (get_the_post_thumbnail_url(get_the_ID(), $size )) : ?>
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), $size ); ?>">
                            <?php else : ?>
                                <img src="/wp-content/themes/avalon/img/placeholder.jpg">
                            <?php endif; ?>
                        </div>
                        <div class="rev_text">
                            <span><?php the_content(); ?></span>
                            <b><?php echo get_the_title() ?></b>
                        </div>
                        <div class="rev_smalltext">
                            <span><?php the_content(); ?></span>
                        </div>
                    </div>
                <?php
                    $i++;
                    endif;
                endforeach;
                wp_reset_postdata(); ?>
            </div>
            <div id="b8_text1" style="display: none">
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
                <div id="cards_buyed" style=" /*width: 294px;*/ display: inline-block;  margin-top: 52px;    line-height: 21px;">
                    <div style="color:#7f0082;margin: 10px 0;display: inline-block;margin-left: 40px;">Доплата за тренера разовая <strong style="position: relative; bottom: inherit;right: inherit;font-size: 19px;font-weight: 700;
    color: #7f0082;">160</strong>грн</div>
                    <div style="color:#7f0082;margin: 10px 0;display: inline-block;margin-left: 40px;">Доплата за 8 занятий/месяц с тренером <strong style="position: relative; bottom: inherit;right: inherit;font-size: 19px;font-weight: 700; color: #7f0082;">1040</strong> грн</div>
                    <div style="color:#7f0082;margin: 10px 0;display: inline-block;margin-left: 40px;">Доплата за 12 занятий/месяц с тренером <strong style="position: relative; bottom: inherit;right: inherit;font-size: 19px;font-weight: 700; color: #7f0082;">1560</strong> грн</div>
                    <div style="color:#7f0082;margin: 10px 0;display: inline-block;margin-left: 40px;">Первое посещение - БЕСПЛАТНО</div>
                </div>
            </div>
            <button class="center_button scroll" href="#block5">
                <span>ОСТАВИТЬ ЗАЯВКУ</span>
            </button>
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
                    <object type="image/svg+xml" data="/wp-content/themes/avalon/img/mail.svg" width="18" height="18"></object><span>stimulgym.2@gmail.com</span><br>
                    <object type="image/svg+xml" data="/wp-content/themes/avalon/img/post.svg" width="18" height="18"></object><span>Харьков, 61001, ул. Плехановская, 73<br />м. Спортивная / м. Метростроителей им. Ващенка</span><br>
                    <span style="padding-top: 10px;color: #989898b3">Тренажерный зал Stimul Gym<a href="https://stimul.fitness/"> Стимул официальный сайт</a></span><br>
                </div>
                <div id="socials">
                    <!--<a href="#" target="_blank"><object type="image/svg+xml" data="/wp-content/themes/avalon/img/vk.svg" width="40" height="40"></object></a>-->
                    <a href="https://www.facebook.com/avalon.kharkov/" target="_blank" style="height: auto;cursor: pointer;width: 45px">
                        <a href="https://www.facebook.com/avalon.kharkov/" target="_blank" style="height: auto;cursor: pointer;width: 45px; display: block;"><div style="position: absolute;width: 45px; height: 45px"></div></a><object type="image/svg+xml" data="/wp-content/themes/avalon/img/fb.svg" width="40" height="43" style="cursor: pointer;"></object>
                    </a>
                    <a href="https://www.instagram.com/stimul.fitness_2/" target="_blank" style="height: auto;cursor: pointer;width: 45px">
                        <a href="https://www.instagram.com/stimul.fitness_2/" target="_blank" style="height: auto;cursor: pointer;width: 45px; display: block;"><div style="position: absolute;width: 45px; height: 45px"></div></a><object type="image/svg+xml" data="/wp-content/themes/avalon/img/instagram.svg" width="40" height="43" style="cursor: pointer;"></object>
                    </a>
                </div>
            </div>
        </section>
        <section class="width_block" id="block_rating"  style="display:none">
            <div class="cont_block">
                <?php
                if ( have_posts() ) :
                    query_posts('cat=6&posts_per_page=10');
                    while (have_posts()) : the_post();
                        ?>
                        <div itemtype="http://schema.org/Product" itemscope="">
                            <meta  content="<?php echo get_the_title() ?>" itemprop="name">
                            <div itemtype="http://schema.org/Review" itemscope="">
                                <div class="ta_rating_container ta_box_right" style="width:0px;">
                                    <div id="ta_rating">
                                        <div>
                                            <div>Review of:
                                                <span class="title item fn" itemprop="name">
                            <a id="r-title" rel="nofollow" href="https://avalon.kharkov.ua/" title="<?php echo get_the_title() ?>" target="_blank"></a>
                        </span>
                                            </div>
                                            <div class="clear"></div>
                                            <dl>
                                                <dt>Product by: </dt>
                                                <dd>
                                                    <span>Клуб Stimul Gym</span>
                                                </dd>
                                            </dl>
                                            <div class="clear"></div>
                                            <div class="clear_space"></div>
                                            <div>Reviewed by:
                                                <span class="reviewer author byline vcard hcard">
                            <span class="author me fn" itemprop="author">Клуб Stimul Gym</span>
                        </span>
                                            </div>
                                            <dl>
                                                <dt>Rating:</dt>
                                                <dd>
                                                    <div class="ta_rating result rating" itemtype="http://schema.org/Rating" itemscope="" itemprop="reviewRating">
                                                        <meta content="1" itemprop="worstRating">
                                                        <meta content="5" itemprop="ratingValue">
                                                        <meta content="5" itemprop="bestRating">
                                                        <div class="result" style="width:100%;" title="5">5</div>
                                                    </div>
                                                </dd>
                                            </dl>
                                            <div class="clear"></div>
                                            <div class="ta_headline_meta">On
                                                <span class="dtreviewed rating_date">
                            <span class="published" title="<?php the_modified_date('F j, Y'); ?>"><?php the_modified_date('F j, Y'); ?></span>
                        </span>
                                            </div>
                                            <div class="ta_headline_meta">Last modified:
                                                <span class="dtmodified rating_date" itemprop="dateModified">
                            <span class="updated" title="<?php the_modified_date('F j, Y'); ?>"><?php the_modified_date('F j, Y'); ?></span>
                        </span>
                                            </div>
                                            <div class="clear_space"></div>
                                            <h3>Summary:</h3>
                                            <div class="ta_description summary" itemprop="description">
                            <span id="r-description">
                                <?php
                                $content = get_the_content();
                                echo substr($content, 0, 500);
                                ?>
                            </span>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div itemprop="reviewBody">
                                    <div itemtype="http://schema.org/Thing" itemscope="" itemprop="itemReviewed">
                                        <meta content="<?php echo get_the_title() ?>" itemprop="name">
                                    </div>
                                    <?php
                                    $content = get_the_content();
                                    echo substr($content, 0, 1000);
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php the_content();
                    endwhile;
                endif;
                wp_reset_query();
                ?>
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
            <object type="image/svg+xml" data="/wp-content/themes/avalon/img/Logo.svg" id="mobile_logo"></object>
        </a>
        <div id="clubs_btn">
            <span>Меню</span>
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

<script type="text/javascript">
    jQuery(".center_button.scroll").click(function() {
        jQuery([document.documentElement, document.body]).animate({
            scrollTop: jQuery("#block5").offset().top
        }, 1000);
    });
</script>
