<?php
/**
 * The template for displaying students
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php 
				$args = array(
					'post_type'      => 'school-student',
					'posts_per_page' => -1,
					'orderby'		 => 'title',
					'order'			 => 'ASC',
				);
				
				$query = new WP_Query( $args );
				
				if ( $query->have_posts() ) {
					echo '<section class="students-section">';
					while ( $query->have_posts() ) {
						$query->the_post();
						?>
							<article class='student-card'>
								<a href="<?php the_permalink();  ?>">
									<h2><?php the_title(); ?></h2>
								</a>
								<?php 
								the_post_thumbnail('student-featured-image', array('alt' => get_the_title()));
								the_excerpt(); 

								$terms = wp_get_post_terms( $query->post->ID, 'school-specialty' );
								foreach ( $terms as $term ) :
									$label = get_taxonomy( $term->taxonomy )->labels->singular_name; 
								?>
									<p class="student-specialty">
										<?php echo $label; ?>: 
										<a href="<?php echo get_term_link( $term ); ?>">
											<?php echo esc_html( $term->name ); ?>
										</a>
									</p>
								<?php
								endforeach;
								?>
							</article>
						<?php
					}
					echo '</section>';
					wp_reset_postdata();
				} 
			?>

		<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
