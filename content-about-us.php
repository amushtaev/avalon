<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 */
global $post;
?>
    <?php
    the_title( '<h2 id="b3_text1">', '</h2>' );
    ?>
    <div id="video">
        <div>
            <object type="image/svg+xml" data="/wp-content/themes/avalon/img/avalon_about.svg"></object>
            <div id="play_btn"></div>
        </div>
    </div>
    <div id="b3_text2">
        <p>
            <?php the_content(); ?>
        </p>
    </div>