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
    <h3 class="breadcrumb"><?php woocommerce_breadcrumb(); ?></h3>
    <main id="main" class="site-main" role="main">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
       
    </header><!-- .entry-header -->

            <div class="entry-content">
                <?php woocommerce_content(); ?>
            </div><!-- .entry-content -->

            <footer class="entry-footer">
                
            </footer><!-- .entry-footer -->
        </article><!-- #post-## -->

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

