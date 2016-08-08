<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package APWEB-FRAMWORK
 * @since Apweb 1.0.2
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">


        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>

        <div id="base">
            <div id="page" class="hfeed site">
                <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'apweb'); ?></a>
                     <form role="search" method="get" class="sform-inline" action="<?php echo esc_url(home_url('/')); ?>">
                        <label>
                            <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'apweb'); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" title="<?php _ex('Search for:', 'label', 'apweb'); ?>">
                        </label>
                        <input type="submit" class="search-submit" value="<?php echo esc_attr_x('Search', 'submit button', 'apweb'); ?>">
                    </form>

                <header id="masthead" class="site-header" role="banner">


                    <?php

                    /** if (get_theme_mod('contact_add')) { ?>
                        <div class="add-icon"></div><!-- add-icon --><div class="add-content"><?php echo get_theme_mod('contact_add', __('Dummy Donec Rutrum, 1234 N Duis lacinia vel.', 'apweb')); ?></div><!-- add-content --><div class="clear"></div>
                    <?php } ?>
                    <?php if (get_theme_mod('contact_no')) { ?>
                        <div class="phone-icon"></div><!-- phone-icon --><div class="phone-content"><?php echo get_theme_mod('contact_no', __('+123 456 7890', 'apweb')); ?></div><!-- phone-content --><div class="clear"></div>
                    <?php } ?>
                    <?php if (get_theme_mod('contact_mail')) { ?>
                        <div class="mail-icon"></div><!-- mail-icon --><div class="mail-content"><a href="mailto:<?php echo get_theme_mod('contact_mail', 'contact@company.com'); ?>"><?php echo get_theme_mod('contact_mail', 'contact@company.com'); ?></a></div><!-- mail-content --><div class="clear"></div>
                    <?php } ?>
                    */
                    ?>
                    <div class="site-branding">
                       
    <h1 id="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                            <div class="site-description"><?php bloginfo('description'); ?></div>

                    </div><!-- .site-branding -->
                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><div class="glyphicon glyphicon-th-list"></div></button>
                        <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu')); ?>
                    </nav><!-- #site-navigation -->
                   
                </header><!-- #masthead -->
                <?php do_action('slide'); ?>
                <div id="content" class="site-content">
