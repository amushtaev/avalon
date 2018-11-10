<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 */
?>

<?php
$args = array( 'posts_per_page' => 10,
    'category_name' => 'card' );
//thumbnail, medium, large или full
$card = get_posts( $args );
$size = 'thumbnail';
foreach ( $card as $post ) : setup_postdata( $post ); ?>
    <div class="review">
        <div class="rev_img">
            <?php if (get_the_post_thumbnail_url(get_the_ID(), $size )) : ?>
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), $size ); ?>">
            <?php else : ?>
                <img src="/wp-content/themes/avalon/img/placeholder.jpg">
            <?php endif; ?>
        </div>
        <b><?php echo get_the_title() ?></b>
        <div class="rev_text">
            <span><br></span>
            <span><br></span>
            <span><?php the_content(); ?></span>
        </div>
        <div class="rev_smalltext">
            <span> Description small text.</span>
        </div>
    </div>
    <?php
endforeach;
wp_reset_postdata(); ?>

<div class="card">
    <div class="card_name">Разовое посещение</div>
    <div class="card_service" style="display: block; width: 100%;">
        <img src="./img/1 (3).jpg"  style="max-width: 82%;">
    </div>
    <div class="card_cost">60</div>
</div>
<div class="card">
    <div class="card_name">Абонемент<br />Утро-День</div>
    <div class="card_service">
                        <span>
                            <p><strong>посещение</strong></p>
                            <p>пн-пт 7.00-22.00</p>
                            <p>сб 10.00-20.</p>
                            <p>вс 11.00-18.00</p>
                        </span>
    </div>
    <div class="card_cost">900</div>
</div>
<div class="card">
    <div class="card_name">Абонемент <br />на 3 месяца</div>
    <div class="card_service"  style="display: block; width: 100%;">
                        <span>
                            <p><strong>+15 дней заморозки</strong></p>
                            <img src="./img/1 (4).jpg" style="max-width: 78%;">
                        </span>
    </div>
    <div class="card_cost">900</div>
</div>
<div class="card">
    <div class="card_service" style="top: 30px;">
                        <span>
                            <p>Доплата за тренера разовая <strong>130грн</strong></p>
                            <p>Доплата за 10 занятий/месяц с тренером <strong>1170грн</strong></p>
                            <p>Программа тренировки  или питания <strong>100грн</strong></p>
                            <p>Аренда шкафчика <strong>50грн</strong></p>
                            <p>Поломка или потеря ключа <strong>50грн</strong></p>

                        </span>
    </div>
</div>
