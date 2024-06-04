<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <h2>News</h2>

        <?php
        $news_query = new WP_Query(array(
            'posts_per_page' => 5,
            'post_type' => 'post'
        ));

        if ($news_query->have_posts()) :
            while ($news_query->have_posts()) : $news_query->the_post();
                get_template_part('template-parts/content', 'news');
            endwhile;
        else :
            echo '<p>No news posts found.</p>';
        endif;

        wp_reset_postdata();
        ?>
    </main>

    <aside id="secondary" class="widget-area">
        <?php get_sidebar(); ?>
    </aside>

</div>

<?php get_footer(); ?>