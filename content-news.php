<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 */
?>

<?php
$args = array( 'posts_per_page' => 10,
    'category_name' => 'news' );
//thumbnail, medium, large или full
$news = get_posts( $args );
$i = 0;
$size = 'thumbnail';
foreach ( $news as $post ) : setup_postdata( $post ); ?>
    <li style="top: <?php echo $i % 3 * 30; ?>px">
        <h2><?php echo get_the_title() ?></h2>
        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), $size ); ?>"/>
        <span><?php the_content(); ?></span>
    </li>
<?php
    $i++;
endforeach;
wp_reset_postdata(); ?>