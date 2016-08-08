<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package APWEB-FRAMWORK
 * @since Apweb 1.0.2
 */
get_header();
?>
 <h5 class="archive-title"><?php apweb_get_breadcrumb();?></h5>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 
        <header class="entry-header">
            <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
            <div class="entry-meta">
			    <?php
				$metadata = wp_get_attachment_metadata();
				printf( __( 'Published <span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s" title="Link to full-size image">%4$s &times; %5$s</a> in <a href="%6$s" title="Return to %7$s" rel="gallery">%8$s</a>', 'ascent' ),
				    esc_attr( get_the_date( 'c' ) ),
				    esc_html( get_the_date() ),
				    esc_url( wp_get_attachment_url() ),
				    $metadata['width'],
				    $metadata['height'],
				    esc_url( get_permalink( $post->post_parent ) ),
				    esc_attr( strip_tags( get_the_title( $post->post_parent ) ) ),
				    get_the_title( $post->post_parent )
				);

				edit_post_link( __( 'Edit', 'ascent' ), '<span class="edit-link">', '</span>' );
			    ?>
			</div><!-- .entry-meta -->
            
            <?php if ('post' === get_post_type()) : ?>
                <div class="entry-meta">
                    <?php apweb_posted_on(); ?>
                    <span class="comments_count clearfix entry-comments-link"><?php comments_popup_link(__('0', 'apweb'), __('1', 'apweb'), __('%', 'apweb')); ?></span>
                </div><!-- .entry-meta -->
            <?php endif; ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
                 <div class="entry-attachment">
			    <div class="attachment">
				<?php ascent_the_attached_image(); ?>
			    </div><!-- .attachment -->

			    <?php if ( has_excerpt() ) : ?>
			    <div class="entry-caption">
				 <?php the_excerpt(); ?>
			    </div><!-- .entry-caption -->
			    <?php endif; ?>
			</div><!-- .entry-attachment -->

			<?php
			    the_content(); 
			    apweb_paging_nav(); ?>
        </div><!-- .entry-content -->

</div><!-- casulo -->
</article><!-- #post-## -->

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
