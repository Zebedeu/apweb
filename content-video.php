<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package APWEB-FRAMWORK
 * @since Apweb 1.0.2
 */
get_header();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php apweb_post_audio(); ?>
    <?php /*  Active link pages before e after */ ?>
    <?php
    wp_link_pages(array(
        'before' => '<div class="page-links">' . esc_html__('Pages:', 'apweb'),
        'after' => '</div>',
    ));
    ?>

    </div><!-- .entry-content -->

</article><!-- #post-## -->
