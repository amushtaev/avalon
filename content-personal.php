<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 */
?>

<?php
$args = array( 'posts_per_page' => 10,
    'category_name' => 'personal-trainer' );
//thumbnail, medium, large или full
$news = get_posts( $args );
$i = 0;
$size = 'thumbnail';
foreach ( $news as $post ) : setup_postdata( $post ); ?>
    <span class="personal">
        <h2><?php echo get_the_title() ?></h2>
        <span><?php the_content(); ?></span>
    </span>
<?php
endforeach;
wp_reset_postdata(); ?>