<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package apweb
 * @since apweb 1.0.0
 */
?>

</div><!-- #content -->

<footer id="colophon">
<div class="site-footer" role="contentinfo">
    <div class="about-footer">
            <div class="cols"><h2><?php echo get_theme_mod('contact_title',__('Contact apweb','apweb')); ?></h2>
                <?php if( get_theme_mod('contact_desc') ) { ?>
                    <p><?php echo get_theme_mod('contact_desc',__('If you have any questions don\'t hesitate to contact us','apweb')); ?></p>
                <?php } ?>
                <?php if( get_theme_mod('contact_add')){ ?>
                    <div class="add-icon"></div><!-- add-icon --><div class="add-content"><?php echo get_theme_mod('contact_add',__('Rua Diolinda Rodrigues, Bairro Comercial, Huila, Lubango','apweb')); ?></div><!-- add-content --><div class="clear"></div>
                <?php } ?>
                <?php if( get_theme_mod('contact_no')){ ?>
                    <div class="phone-icon"></div><!-- phone-icon --><div class="phone-content"><?php echo get_theme_mod('contact_no',__('+123 456 7890','apweb')); ?></div><!-- phone-content --><div class="clear"></div>
                <?php } ?>
                <?php if( get_theme_mod('contact_mail')){ ?>
                    <div class="mail-icon"></div><!-- mail-icon --><div class="mail-content"><a href="mailto:<?php echo get_theme_mod('contact_mail','contacto@artphoweb.com'); ?>"><?php echo get_theme_mod('contact_mail','contacto@artphoweb.com'); ?></a></div><!-- mail-content --><div class="clear"></div>
                <?php } ?>
            </div><!-- cols -->
      
    </div> <!-- about-footer -->            
    <div class="category-footer">
    <div class="cols">
        <?php if ('' !== get_theme_mod('recent_title')) { ?>
            <h2><?php echo esc_attr_e(get_theme_mod('recent_title', __('Recent Posts', 'apweb'))); ?></h2><br/>
        <?php } ?>
        <?php
        $args = array('posts_per_page' => 4, 'post__not_in' => get_option('category_name'), 'orderby' => 'date', 'order' => 'desc');
        $the_query = new WP_Query($args);
        ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <div class="recent-post">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </div>
        <?php endwhile; ?>
        <?php dynamic_sidebar('sidebar-3'); ?>

                </div><!-- cols -->
    </div> <!-- category-footer -->
    <div class="social-footer">
            <div class="cols">
            <h2><?php _e('Follow Us','apweb'); ?></h2>
                    <div class="social">
                        <?php if ( get_theme_mod('fb_link') != "") { ?>
                         <a target="_blank" href="<?php echo esc_url(get_theme_mod('fb_link','#facebook')); ?>" title="Facebook" ><div class="fb icon"></div><span><?php _e('Facebook','apweb'); ?></span></a>
                         <?php } ?>
                        <?php if ( get_theme_mod('twitt_link') != "") { ?>
                         <a target="_blank" href="<?php echo esc_url(get_theme_mod('twitt_link','#twitter')); ?>" title="Twitter" ><div class="twitt icon"></div><span><?php _e('Twitter','apweb'); ?></span></a>
                         <?php } ?>
                         <?php if ( get_theme_mod('gplus_link') != "") { ?>
                         <a target="_blank" href="<?php echo esc_url(get_theme_mod('gplus_link','#gplus')); ?>" title="Google Plus" ><div class="gplus icon"></div><span><?php _e('Google +','apweb'); ?></span></a>
                         <?php } ?>
                         <?php if ( get_theme_mod('linked_link') != "") { ?>
                         <a target="_blank" href="<?php echo esc_url(get_theme_mod('linked_link','#linkedin')); ?>" title="Linkedin" ><div class="linkedin icon"></div><span><?php _e('Linkedin','apweb'); ?></span></a>
                         <?php } ?>
                         
                </div><!-- social -->
            </div><!-- cols -->
      <?php  dynamic_sidebar('sidebar-4'); ?>
    </div> <!-- social-footer -->
</div><!-- site-footer -->

    <div class="site-info">
    <p><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a> &copy; <?php echo date( 'Y' ); ?> - <?php printf( esc_html__( 'All rights reserved', 'apweb' ), 'apweb'); ?><br/>
        <a href="<?php echo esc_url(__('https://github.com/Zebedeu/fw-apweb', 'apweb')); ?>"><?php printf(esc_html__('Proudly powered by %s', 'apweb'), 'ARTPHOTOGRAFIE'); ?></a>
        <?php printf(esc_html__('Theme: %1$s by %2$s.', 'apweb'), 'apweb', '<a href="https://github.com/Zebedeu/fw-apweb" rel="designer">Marcio Zebedeu</a>'); ?><br/>
        <?php echo get_theme_mod('footer_right',  __('<a href="https://github.com/Zebedeu/fw-apweb">Home</a> | <a href="http://artphoweb.com/contactos/">Contact Us</a> | <a href="#">Sitemap</a>','apweb')); ?></p>

        
    </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer();
?>
</div><!-- #base -->

</body>
</html>
