<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package apweb
 * @since apweb 1.0.0
 */
get_header();
?>
<div id="primary" class="content-area">
 <h5 class="archive-title"><?php apweb_get_breadcrumb();?></h5>

    <main id="main" class="site-main" role="main">

        <?php do_action('loop_init'); ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
