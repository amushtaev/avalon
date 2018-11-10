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
        <object type="image/svg+xml" data="/wp-content/themes/avalon/img/avalon_logo.svg" id="logo"></object>
        <div id="clubs_link">
            <a href="#"><span></span></a>
        </div>
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
    <article class="cont_block" id="post-<?php the_ID(); ?>">
        <div>
            <div>
                <h1 style="text-align: center; font-size: 32px; margin-top: 30px;"><?php echo get_the_title() ?></h1>
                <span><?php the_content(); ?></span>
                <br/>
            </div>
        </div>
    </article>
</div>
<?php get_footer(); ?>
