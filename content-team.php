<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 */
?>

<?php
if ( have_posts() ) :
    query_posts($query_string .'category_name=team&posts_per_page=10');
    while ( have_posts() ) : the_post();
    //thumbnail, medium, large или full
        $size = 'thumbnail';
    ?>
        <script id="command-content">
            command = [
                {
                    name : <?php echo get_the_title() ?>,
                    photo: <?php echo get_the_post_thumbnail_url(get_the_ID(), $size ); ?>,
                    post: [],
                    club: '',
                    desc : [<?php the_content(); ?>]
                }
        </script>
    <?php
    endwhile;
endif;
?>