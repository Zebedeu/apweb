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
 * @package k7themes
 * @since k7themes' 1.0.0
 */
get_header();
?>

<div id="primary" class="content-area">
 <h5 class="archive-title"><?php new Apweb_breadcrumb(); ?></h5>
    <main id="main" class="site-main" role="main">
     <?php if (have_posts()) : ?>
     	  <?php while (have_posts()) : the_post(); ?>
        <!-- onde estas loo_init -->
        <?php do_action('format_init'); ?>
        <?php endwhile; ?>
              <?php apweb_paging_nav(); ?>

    </main><!-- #main -->
    <?php endif; ?>
</div><!-- #primary -->

<?php get_footer(); ?>