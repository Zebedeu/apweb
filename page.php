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
 * @package apweb
 * @since apweb 1.0.0
 */
get_header();
?>
<div id="primary" class="content-area">
<h5 class="archive-title"><?php apweb_get_breadcrumb();?></h5>

    <main id="main" class="site-main" role="main">
        <!-- onde estas loo_init -->
        <?php do_action('loop_init'); ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
