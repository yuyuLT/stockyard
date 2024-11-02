<?php
get_header();
?>

<main class="single-post">
    <article>
        <header class="post-header">
            <h1 class="post-title"><?php the_title(); ?></h1>
            <p class="post-date"><?php echo get_the_date(); ?></p>
        </header>

        <?php if (has_post_thumbnail()) : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail('large'); ?>
            </div>
        <?php endif; ?>

        <div class="post-content">
            <?php the_content(); ?>
        </div>

        <footer class="post-footer">
            <h2>関連記事</h2>
            <div class="related-posts">
                <?php
                $related_posts = new WP_Query(array(
                    'posts_per_page' => 3,
                    'post__not_in' => array(get_the_ID()),
                    'category__in' => wp_get_post_categories(get_the_ID()),
                ));
                if ($related_posts->have_posts()) :
                    while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                        <a href="<?php the_permalink(); ?>" class="related-post-item">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="related-thumbnail">
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                </div>
                            <?php endif; ?>
                            <h3 class="related-title"><?php the_title(); ?></h3>
                        </a>
                <?php endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>
        </footer>
    </article>
</main>

<?php
get_footer();
?>