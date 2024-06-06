<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-aos="fade-up">
    <header class="entry-header">
        <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <div class="entry-meta">
            <span class="posted-on">Posted on <a href="<?php the_permalink(); ?>"><?php echo get_the_date('F j, Y'); ?></a></span>
            <span class="byline"> by <a href="<?php the_permalink(); ?>"><?php the_author(); ?></a></span>
        </div>
    </header>

    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('full'); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="entry-summary">
        <?php
        $excerpt = get_the_excerpt();
        $excerpt = wp_trim_words($excerpt, 80, '...');
        echo wpautop($excerpt);
        ?>
    </div>

    <div class="category-tag">
        <?php
        $categories_list = get_the_category_list(', ');
        if ($categories_list) {
            printf('<span class="cat-links">Posted in %s</span>', $categories_list);
        }

        $tags_list = get_the_tag_list('', ', ');
        if ($tags_list) {
            printf('<span class="tags-links"> Tagged %s</span>', $tags_list);
        }
        ?>
         <span class="comments-link">
            <a href="<?php the_permalink(); ?>#respond">Leave a Comment</a>
        </span>
    </div>
</article>
