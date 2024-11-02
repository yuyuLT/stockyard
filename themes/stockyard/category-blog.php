<?php
get_header();
?>

<main class="blog-archive">
    <section class="archive-header">
        <h1>ブログアーカイブ</h1>
    </section>

    <section class="posts">
        <?php
        $query = new WP_Query(array(
            'category_name' => 'blog'
        ));
        ?>

        <?php if ($query->have_posts()) : ?>
            <div class="post-list">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="post-item">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                        <?php endif; ?>
                        <h2 class="post-title"><?php the_title(); ?></h2>
                        <p class="post-date"><?php echo get_the_date(); ?></p>
                    </a>
                <?php endwhile; ?>
            </div>

            <div class="pagination">
                <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => __('前へ', 'textdomain'),
                    'next_text' => __('次へ', 'textdomain'),
                ));
                ?>
            </div>

        <?php else : ?>
            <p>記事が見つかりませんでした。</p>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>
    </section>
</main>

<?php
get_footer();
?>