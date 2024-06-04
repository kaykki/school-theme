<?php
/**
 * Template Name: Staff Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
	
	
	<h1>Staff</h1>
    <p>Our dedicated staff is here to help our students succeed. You will find the faculty and administrative staff listed below. Please contact the appropriate individual with any questions. Vestibulum pretium neque leo, nec euismod ex interdum vitae. Etiam viverra, lorem sed lobortis mattis, lectus enim eleifend nisi, non dapibus nulla purus malesuada risus. Donec consectetur neque turpis, vitae varius lectus commodo vel.</p>
	
	<section class="staff-section" id="administrative">
		<h2>Administrative</h2>
		<div id="admin-wrapper">
		<?php
		$admin_args = array(
			'post_type' => 'staff',
			'tax_query' => array(
				array(
					'taxonomy' => 'department',
					'field'    => 'slug',
					'terms'    => 'administrative',
				),
			),
		);
		$admin_query = new WP_Query($admin_args);
	
		if ($admin_query->have_posts()) :
			while ($admin_query->have_posts()) : $admin_query->the_post();
				$short_bio = get_field('short_staff_biography');
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h3><?php the_title(); ?></h3>
					<?php if ($short_bio) : ?>
						<p><?php echo esc_html($short_bio); ?></p>
					<?php endif; ?>
				</article>
				<?php
			endwhile;
			wp_reset_postdata();
			?>
			</div>
			<?php
		else :
			?>
			<p>No administrative members found.</p>
			<?php
		endif;
		?>
	</section>


    <section class="staff-section faculty">
		<h2>Faculty</h2>
		<div class="faculty-wrapper">
        <?php
        $faculty_args = array(
            'post_type' => 'staff',
            'tax_query' => array(
                array(
                    'taxonomy' => 'department',
                    'field'    => 'slug',
                    'terms'    => 'faculty',
                ),
            ),
        );
        $faculty_query = new WP_Query($faculty_args);

        if ($faculty_query->have_posts()) :
            while ($faculty_query->have_posts()) : $faculty_query->the_post();
                $short_bio = get_field('short_staff_biography');
                $courses_teaching = get_field('course_teaching');
                $instructor_website = get_field('instructor_website');
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h3><?php the_title(); ?></h3>
                    <?php if ($short_bio) : ?>
                        <p><?php echo esc_html($short_bio); ?></p>
						<?php endif; ?>
						<?php if ($courses_teaching) : ?>
							<p><strong>Courses:</strong> <?php echo esc_html($courses_teaching); ?></p>
                    <?php endif; ?>
                    <?php if ($instructor_website) : ?>
                        <p><a href="<?php echo esc_url($instructor_website); ?>" target="_blank">Instructor's Website</a></p>
                    <?php endif; ?>
                </article>
			</div>
                <?php
            endwhile;
            wp_reset_postdata();
        else :
            ?>
            <p>No faculty members found.</p>
            <?php
        endif;
        ?>
    </section>

</main>

<?php
get_footer();