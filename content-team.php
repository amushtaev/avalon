<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 */
?>


<?php
$args = array( 'posts_per_page' => 10,
    'category_name' => 'team' );
//thumbnail, medium, large или full
$team = get_posts( $args );
$i = 0;
$size = 'thumbnail';
foreach ( $team as $post ) : setup_postdata( $post ); ?>
    <li style="top: <?php echo $i % 3 * 30; ?>px">
        <div style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_ID(), $size ); ?>');"></div>
        <b><?php echo get_the_title() ?></b>
        <span><?php the_content(); ?></span>
    </li>
<?php
    $i++;
endforeach;
wp_reset_postdata(); ?>