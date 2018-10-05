<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package apweb
 * @since apweb 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="casulo "><div class="casulo2">
        <header class="entry-header">
            <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
            <?php do_action('posted_on_end_comments'); ?>
            
        </header><!-- .entry-header -->

        <div class="entry-content">
                  <div class="apweb_the_excerpt">
                      <?php apweb_the_excerpt(0, 300); ?>
                  </div>

            <?php $format = get_post_format($post->ID); ?>
            <?php if (has_post_thumbnail($post->ID)): ?>
                <?php
                $image_id = get_post_thumbnail_id();
                $full_image_url = wp_get_attachment_url($image_id);
                ?>
                <?php if ( get_the_post_thumbnail() != ''): ?>
                        <a class="swipessbox" href="<?php echo $full_image_url; ?>" title="<?php echo the_title(); ?>">
                            
                             <a  href="<?php the_permalink(); ?>" class="img-responsive" > <?php the_post_thumbnail('default-page'); ?>

                        </a>
<?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/img_404.png" />
                <?php endif; ?>
                 <?php else : ?>
                    <img style="padding-left: 13%;" src="<?php echo get_template_directory_uri(); ?>/images/img_404.png" />
            <?php endif; ?>


            <?php /*  Active link pages before e after */ ?>
            <?php 
              wp_link_pages(array(
              'before' => '<div class="page-links">' . esc_html__('Pages:', 'apweb'),
              'after' => '</div>',
              ));
             ?>

        </div><!-- .entry-content -->
        </div>
</div><!-- casulo -->
</article><!-- #post-## -->
