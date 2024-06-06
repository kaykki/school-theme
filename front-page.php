<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );
		endwhile; // End of the loop.
		?>

		<!-- recent news -->
		<section class="recent-news">
        <h2>Recent News</h2>
        <?php
        $recent_posts = new WP_Query(array(
            'posts_per_page' => 3,
            'post_type'      => 'post',
            'post_status'    => 'publish',
        ));

        if ( $recent_posts->have_posts() ) :
            ?>
            <section class="recent-posts">
            <?php
            while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
                ?>
                <div class="recent-post">
                    <a href="<?php esc_url(the_permalink()); ?>">
                        <?php
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail('full');
                        }
                        ?>
                        <div class="recent-post-title">
                            <?php the_title(); ?>
                        </div>
                    </a>
                </div>
                <?php
            endwhile;
            ?>
            </section>
            <p class="all-news-btn">
                <a href="<?php echo esc_url(the_permalink(25)); ?>">See All News</a>
            </p>
            <?php
            wp_reset_postdata();
        else :
            echo '<p>No recent news available.</p>';
        endif;
        ?>
    </section>
	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
