<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package School_Theme
 */

?>

	<footer id="colophon" class="site-footer">
	<div class="footer-content">
            <div class="footer-logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php include get_template_directory() . '/images/head-gear-logo.php'; ?>
                </a>
            </div>
            <div class="footer-credits">
				<h2>Credits</h2>
                <p>Created by <strong><a href="#">Kaki Kagatan & Danny Kim.</a></strong></p>
				<p>Photos courtesy of <strong><a href="#">Burst.</a></strong></p>
            </div>
            <div class="footer-links">
				<h2>Links</h2>
                <a href="<?php echo esc_url( home_url( '/schedule' ) ); ?>">Schedule Page</a>
                <a href="<?php echo esc_url( home_url( '/news' ) ); ?>">News Page</a>
            </div>
        </div>
    </footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
