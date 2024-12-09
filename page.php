<?php
/**
 * The template for displaying pages
 */
get_header();
?>

<div class="site-content">
    <?php while (have_posts()): the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php if (!modern_full_width_is_title_hidden()): ?>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>
            <?php endif; ?>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>