<?php
/**
 * The main template file
 */
get_header();
?>

<div class="site-content">
    <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if (!modern_full_width_is_title_hidden()): ?>
                    <header class="entry-header">
                        <?php if (is_singular()): ?>
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                        <?php else: ?>
                            <h2 class="entry-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                        <?php endif; ?>
                    </header>
                <?php endif; ?>

                <div class="entry-content">
                    <?php
                    if (is_singular()) {
                        the_content();
                    } else {
                        the_excerpt();
                    }
                    ?>
                </div>
            </article>
        <?php endwhile; ?>

        <?php
        the_posts_navigation(array(
            'prev_text' => '← Older posts',
            'next_text' => 'Newer posts →',
        ));
        ?>
    <?php else: ?>
        <p><?php esc_html_e('No posts found.', 'modern-full-width'); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>