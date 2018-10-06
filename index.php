<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package k7themes
 * @since k7themes' 1.0.0
 */
get_header();
?>

<div id="primary" class="content-area">

    <main id="main" class="site-main" role="main">
        <?php if (have_posts()) : 

            if (is_home() && !is_front_page()) : ?>
                <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                </header>
            <?php endif; 


                 /* Start the Loop */ 
             while (have_posts()) : the_post();
                
                 do_action('format_init');

             endwhile; 
              apweb_paging_nav();



        else : 

             do_action('none_init');

         endif; ?>



    </main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar();
  get_footer(); ?>
