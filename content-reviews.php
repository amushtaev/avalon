<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 */
?>

<?php
$args = array( 'posts_per_page' => 10,
    'category_name' => 'reviews' );
//thumbnail, medium, large или full
$reviews = get_posts( $args );
$size = 'thumbnail';
foreach ( $reviews as $post ) : setup_postdata( $post ); ?>
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
            <span><?php the_content(); ?></span>
        </div>
    </div>
    <?php
endforeach;
wp_reset_postdata(); ?>