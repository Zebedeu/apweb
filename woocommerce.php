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
 <h3><i class="breadcrumb"><?php apweb_get_breadcrumb();?></i></h3>
<div id="primary" class="content-area">
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
