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

get_header();
foreach (get_the_category() as $category) {
    $post_type = $category->slug;
}
if ( have_posts()) :
    $categories = get_the_category();
    $category_id = $categories[0]->cat_ID;
endif;
?>
    <section class="width_block" id="block2">
        <div class="cont_block">
            <div id="slider">
                <div id="slider_ani">
                    <a rel="nofollow" data-target="_blank" href="javascript:show_popup('selectclub')">
                        <object type="image/svg+xml" data="/wp-content/themes/avalon/img/header_slider.svg"></object>
                    </a>
                </div>
                <div id="slider_buts">
                    <div onclick="bn_anishow('slider',1)" class="slider_now_but"></div>
                </div>
            </div>
            <style>

                #slider {
                    width: 1000px;
                    height: 400px;
                    position: relative;
                }

                #slider_ani {
                    position: relative;
                    width: 1000px;
                    margin: 0;
                    text-align: center;
                }

                #slider_ani span {
                    display: inline-block;
                    height: 400px;
                    width: 0;
                    vertical-align: middle;
                    padding: 0;
                    margin: 0;
                }

                #slider_ani a {
                    display: inline-block;
                    vertical-align: middle;
                    padding: 0;
                    margin: 0;
                }

                #slider_ani object {
                    max-width: 1000px;
                    max-height: 400px;
                    border: none;
                    padding: 0;
                    margin: 0;
                    height: 100%;
                }
            </style>
        </div>
    </section>
    <section id="mobile_banner">
        <a href="javascript:show_popup('selectclub')">
            <object type="image/svg+xml" data="/wp-content/themes/avalon/img/header_slider.svg"></object>
        </a>
    </section>
    <?php
    if ( have_posts() ) :
        query_posts_for_main($query_string, 'about-us', '1');
    endif;
    ?>
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
                            <li data-value="ek">
                                <span>понедельник</span>
                            </li>
                            <li data-value="kn">
                                <span>среда</span>
                            </li>
                            <li data-value="kr">
                                <span>пятница</span>
                            </li>
                        </ul>
                    </span>
                <br><br>
                <span class="skew_input" id="free_phone" data-value="">
                        <span>+380</span>
                        <input type="text" value="" placeholder="__ ___-__-__" maxlength="12">
                    </span>
                <br><br>
                <button class="skew_button" onclick="send_freetraining(this)">
                    <span>ОСТАВИТЬ ЗАЯВКУ</span>
                    <img src="./img/loader.gif">
                </button>
            </div>
            <div id="b5_text1">
                <span>Оставьте свой номер телефона и наш администратор перезвонит
                вам в ближайшее время и запишет на удобное для вас время</span>
            </div>
        </div>
    </section>

<?php
//get_template_part('content', 'about-us');
get_footer();

function query_posts_for_main($query_string, $slug, $n){
    query_posts($query_string .'category_name='. $slug .'&posts_per_page='. $n .'');
        while ( have_posts() ) : the_post();
            get_template_part( 'content', $slug );
        endwhile;
}
?>