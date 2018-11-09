<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Avalon
 * @since 1.0
 * @version 1.2
 */

?>

<div id="menu">
    <a href="#block1" id="homebtn"><span> ▲ НАВЕРХ </span></a>
    <?php
    wp_nav_menu( array(
        'theme_location'  => 'top',
        'menu'            => '',
        'container'       => false,
        'container_class' => '',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => 'menu_top',
        'echo'            => true,
        'fallback_cb'     => '',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'           => 0,
        'walker'          => '',
    ) );
    ?>
</div>

