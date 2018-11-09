<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Avalon
 * @since 1.0
 * @version 1.2
 */

?>

    <div id="mobile_header">
        <?php if ( has_nav_menu( 'mobile' ) ) : ?>
            <?php get_template_part( 'navigation/navigation', 'mobile' ); ?>
        <?php endif; ?>
        <object type="image/svg+xml" data="/wp-content/themes/avalon/img/avalon_logo.svg" id="mobile_logo"></object>
        <div id="clubs_btn">
            <span>Меню</span>
            <object type="image/svg+xml" data="/wp-content/themes/avalon/img/clubs_btn.svg"></object>
            <div>
            </div>
        </div>
    </div>
<?php wp_footer(); ?>

</body>
</html>