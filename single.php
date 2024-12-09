<?php
/**
 * The template for displaying single posts
 */
get_header();
?>

<div class="site-content">
    <?php while (have_posts()): the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php if (!modern_full_width_is_title_hidden()): ?>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <div class="entry-meta">
                        <span class="posted-on">
                            Posted on <?php echo get_the_date(); ?>
                        </span>
                        <span class="posted-by">
                            by <?php the_author(); ?>
                        </span>
                    </div>
                </header>
            <?php endif; ?>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>

            <footer class="entry-footer">
                <?php
                $categories_list = get_the_category_list(', ');
                if ($categories_list) {
                    echo '<span class="cat-links">Categories: ' . $categories_list . '</span>';
                }

                $tags_list = get_the_tag_list('', ', ');
                if ($tags_list) {
                    echo '<span class="tags-links">Tags: ' . $tags_list . '</span>';
                }
                ?>
            </footer>
        </article>

        <?php
        if (comments_open() || get_comments_number()):
            comments_template();
        endif;
        ?>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>