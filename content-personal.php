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
    <div itemtype="http://schema.org/Product" itemscope="" style="display:none">
        <meta  content="<?php echo get_the_title() ?>" itemprop="name">
        <div itemtype="http://schema.org/Review" itemscope="">
            <div class="ta_rating_container ta_box_right" style="width:0px;">
                <div id="ta_rating">
                    <div>
                        <div>Review of:
                            <span class="title item fn" itemprop="name">
							<a id="r-title" rel="nofollow" href="https://avalon.kharkov.ua/" title="<?php echo get_the_title() ?>" target="_blank"></a>
						</span>
                        </div>
                        <div class="clear"></div>
                        <dl>
                            <dt>Product by: </dt>
                            <dd>
                                <span>Клуб Авалон</span>
                            </dd>
                        </dl>
                        <div class="clear"></div>
                        <div class="clear_space"></div>
                        <div>Reviewed by:
                            <span class="reviewer author byline vcard hcard">
							<span class="author me fn" itemprop="author">Клуб Авалон</span>
						</span>
                        </div>
                        <dl>
                            <dt>Rating:</dt>
                            <dd>
                                <div class="ta_rating result rating" itemtype="http://schema.org/Rating" itemscope="" itemprop="reviewRating">
                                    <meta content="1" itemprop="worstRating">
                                    <meta content="5" itemprop="ratingValue">
                                    <meta content="5" itemprop="bestRating">
                                    <div class="result" style="width:100%;" title="5">5</div>
                                </div>
                            </dd>
                        </dl>
                        <div class="clear"></div>
                        <div class="ta_headline_meta">On
                            <span class="dtreviewed rating_date">
							<span class="published" title="<?php the_modified_date('F j, Y'); ?>"><?php the_modified_date('F j, Y'); ?></span>
						</span>
                        </div>
                        <div class="ta_headline_meta">Last modified:
                            <span class="dtmodified rating_date" itemprop="dateModified">
							<span class="updated" title="<?php the_modified_date('F j, Y'); ?>"><?php the_modified_date('F j, Y'); ?></span>
						</span>
                        </div>
                        <div class="clear_space"></div>
                        <h3>Summary:</h3>
                        <div class="ta_description summary" itemprop="description">
                            <span id="r-description">
                                <?php
                                $content = get_the_content();
                                echo substr($content, 0, 500);
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div itemprop="reviewBody">
                <div itemtype="http://schema.org/Thing" itemscope="" itemprop="itemReviewed">
                    <meta content="<?php echo get_the_title() ?>" itemprop="name">
                </div>
                <?php
                $content = get_the_content();
                echo substr($content, 0, 1000);
                ?>
            </div>
        </div>
    </div>
<?php
endforeach;
wp_reset_postdata(); ?>