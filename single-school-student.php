<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package School_Theme
 */

get_header();
?>
	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', get_post_type() );

			// get current post id
			$post_id  = get_the_ID();

			// define the taxonomy
			$taxonomy = 'school-specialty';

			// get all the terms from the current post
			$terms = wp_get_post_terms($post_id, $taxonomy);
			
			// check if it exits and no errors
			if ( $terms && ! is_wp_error($terms)) {
				foreach ($terms as $term) {
					$args = array(
						'post_type' => 'school-student',
						'post_per_page' => -1,
						'order'         => 'ASC',
						'orderby'		=> 'title',
						'post__not_in' => array($post_id), // exclues the current post
						'tax_query'		=> array(
							array(
								'taxonomy' => $taxonomy,
								'field'	   => 'slug',
								'terms'    => $term->slug,
							),
						),
					);
					$query = new WP_Query( $args );

					if ( $query -> have_posts() ) {
						?>
						<section class="other-students">
                            <h2>Meet other <?php echo $term->name ?> students:</h2>
                            <ul>
                                <?php
                                while ( $query -> have_posts() ) {
                                    $query -> the_post();
                                    ?>
                                        <li>
                                            <a href="<?php echo esc_url(get_permalink()) ?>"> 
                                                <?php echo get_the_title() ?>
                                            </a>
                                        </li>
                                    <?php
                                }
                                ?>
                            </ul>
						</section>
						<?php
						wp_reset_postdata();
					}
				}
			} else {
				echo 'No terms fround from this post.';
			}
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
