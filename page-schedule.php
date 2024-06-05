<?php
/**
 * Template Name: Schedule Page
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
    <h1>Course Schedule</h1>
    <p>This is the schedule for the upcoming week of classes. It is updated every Sunday evening. Lorem ipsum cras nec dui sodales, congue lacus quis, aliquam ante. Aenean enim nisi, venenatis eu lectus commodo, tristique posuere ligula. Nam velit erat, mollis tincidunt auctor id, hendrerit eget turpis.</p>
    
    <?php if( have_rows('course') ): ?>
        <table class="schedule-table">
            <caption>Weekly Course Schedule</caption>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Course</th>
                    <th>Instructor</th>
                </tr>
            </thead>
            <tbody>
                <?php while( have_rows('course') ): the_row(); 
                    $course_date = get_sub_field('course_date');
                    $course = get_sub_field('course_name');
                    $instructor = get_sub_field('course_instructor');
                    ?>
                    <tr>
                        <td><?php echo esc_html($course_date); ?></td>
                        <td><?php echo esc_html($course); ?></td>
                        <td><?php echo esc_html($instructor); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No courses found.</p>
    <?php endif; ?>

</main><!-- #main -->

<?php
get_footer();