<?php
get_header();
?>

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
        <a href="<?php echo get_home_url(); ?>" class="svg">
            <object type="image/svg+xml" data="/wp-content/themes/avalon/img/avalon_logo.svg" id="logo"></object>
        </a>
    </section>
    <section class="width_block" id="block2">
        <div class="cont_block">
            <div id="slider">
                <div id="slider_ani">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large' ); ?>" style="max-width: 1000px; max-height: 400px;">
                </div>>
            </div>
            <style>
                #slider {width: 1000px;height: 400pxposition: relative;}
                #slider_ani {position: relative;width: 1000px;margin: 0;text-align: center;}
                #slider_ani span {display: inline-block;height: 400px; width: 0;vertical-align: middle;padding: 0;margin: 0;}
                #slider_ani a {display: inline-block; vertical-align: middle; padding: 0;margin: 0;}
                #slider_ani object { max-width: 1000px; max-height: 400px; border: none;padding: 0;margin: 0; height: 100%;}
            </style>
        </div>
    </section>
    <?php if (have_posts()) the_post(); ?>
    <article class="cont_block" id="post-<?php the_ID(); ?>">
        <div>
            <div>
                <h1 style="text-align: center; font-size: 32px; margin-top: 30px;"><?php echo get_the_title() ?></h1>
                <span style="padding: 40px;display: block;line-height: 20px;"><?php the_content(); ?></span>
            </div>
        </div>
    </article>
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
<script type="text/ecmascript" async defer>
    var uri = "<?php echo get_home_url(); ?>";
    jQuery(".menu li a").on("click", function(){
        var link = jQuery(this).attr("href");
        window.location.href = uri + link
    })
</script>
<?php get_footer(); ?>
