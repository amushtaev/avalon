<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 */
?>

<article class="col col-xs-12 col-sm-6 <?php echo implode( ' ', get_post_class() ) ?>" id="post-<?php the_ID(); ?> content-area">
	<span class="date"><?php echo get_the_date('d'); ?>.<small><?php echo get_the_date('m.Y'); ?></small></span>
	<strong><a href="<?php the_permalink() ?>" style="font-size: 18pt;"><?php the_title() ?></a></strong>
	<p><?php echo str_replace('[&hellip;]', '&hellip;', get_the_excerpt()); ?></p>
	<a href="<?php the_permalink() ?>"><?php _e('Read more...', 'mirax'); ?></a>
</article>