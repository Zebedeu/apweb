<?php
/**
 * The Theme Options page
 *
 * This page is implemented using the Settings API
 * http://codex.wordpress.org/Settings_API
 *
 * @package apweb
 * @since apweb 1.0.0
 *
*
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */

    add_theme_support("title-tag");
    /*
     * This is an example of how to add custom scripts to the options panel.
     * This one shows/hides the an option when a checkbox is clicked.
     *
     * You can delete it if you not using that option
     */


load_template( trailingslashit( get_template_directory() ) . '/inc/class/function.php');
load_template( trailingslashit( get_template_directory() ) . '/inc/class/class-function.php');
load_template( trailingslashit( get_template_directory() ) . '/inc/class/class-breadcrumb.php');

/**
 * Implement the Custom Header feature.
 */

/**
 * Custom template tags for this theme.
 */
load_template( trailingslashit( get_template_directory() ) . '/inc/structure/template-tags.php');

/**
 * Custom functions that act independently of the theme templates.
 */
load_template( trailingslashit( get_template_directory() ) . '/inc/structure/extras.php');
load_template( trailingslashit( get_template_directory() ) . '/inc/structure/hooks.php');

load_template( trailingslashit( get_template_directory() ) . '/inc/custom/custom-header.php');
load_template( trailingslashit( get_template_directory() ) . '/inc/custom/customizer.php');


function apweb_font_url(){
        $font_url = '';
        
        /* Translators: If there are any character that are
        * not supported by Roboto, translate this to off, do not
        * translate into your own language.
        */
        $roboto = _x('on', 'Roboto font:on or off','apweb');
        
        /* Translators: If there are any character that are not
        * supported by Oswald, trsnalate this to off, do not
        * translate into your own language.
        */
        $oswald = _x('on','Oswald:on or off','apweb');
        
        /* Translators: If there has any character that are not supported 
        *  by Scada, translate this to off, do not translate
        *  into your own language.
        */
        $scada = _x('on','Scada:on or off','apweb');
        
        if('off' !== $roboto || 'off' !== $oswald){
            $font_family = array();
            
            if('off' !== $roboto){
                $font_family[] = 'Roboto:300,400,600,700,800,900';
            }
            if('off' !== $oswald){
                $font_family[] = 'Oswald:300,400,600,700';
            }
            if('off' !== $scada){
                $font_family[] = 'Scada:300,400,600,700';
            }
            $query_args = array(
                'family'    => urlencode(implode('|',$font_family)),
            );
            
            $font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
        }
        
    return $font_url;
    }

if ( ! function_exists( 'apweb_END_register_scripts' ) ) :
    /**
     * Register theme scripts
     *
     * @uses wp_register_scripts() To register scripts
     *
     * @since apweb 1.0.1
     */
    function apweb_END_register_scripts() {
        // Add HTML5 support to older versions of IE
        wp_register_script( 'html5', get_template_directory_uri() . '/scripts/html5.js', false, '1.5.1' );
        wp_register_script( 'audio-player', get_template_directory_uri() . '/scripts/audio-player.js', array( 'swfobject' ), '2.2' );
        wp_register_script( 'kwicks', get_template_directory_uri() . '/scripts/kwicks.js', array( 'jquery' ), '1.5.1' );
        wp_register_script( 'colorbox', get_template_directory_uri() . '/scripts/colorbox.js', array( 'jquery' ), '1.3.16' );
        wp_register_script( 'apweb', get_template_directory_uri() . '/scripts/apweb.js', array( 'kwicks' ), '1.0' );
    }
endif;

add_action( 'init', 'apweb_END_register_scripts' );

if ( ! function_exists( 'apweb_END_enqueue_scripts' ) ) :
    /**
     * Enqueue theme scripts
     *
     * @uses wp_enqueue_scripts() To enqueue scripts
     *
     * @since apweb 1.0
     */
    function apweb_END_enqueue_scripts() {
        // Add HTML5 support to older versions of IE
        if( isset( $_SERVER['HTTP_USER_AGENT'] ) &&
            ( false !== strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE' ) ) &&
            ( false === strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE 9' ) ) )
            wp_enqueue_script( 'html5' );
        wp_enqueue_script( 'kwicks' );
        if ( is_singular() && get_option( 'thread_comments' ) )
            wp_enqueue_script( 'comment-reply' );
        if ( is_single() && has_post_format( 'video' ) )
            wp_enqueue_script( 'swfobject' );
        if ( is_single() && has_post_format( 'audio' ) )
            wp_enqueue_script( 'audio-player' );
        if ( is_single() )
            wp_enqueue_script( 'colorbox' );
        wp_enqueue_script( 'apweb' );
    }
endif;

add_action( 'wp_enqueue_scripts', 'apweb_END_enqueue_scripts' );

function apweb_scripts_() {
    wp_enqueue_style('apweb-font', apweb_font_url(), array());
    wp_enqueue_style( 'apweb-basic-style', get_stylesheet_uri() );
    wp_enqueue_style( 'apweb-editor-style', get_template_directory_uri()."/editor-style.css" );
    wp_enqueue_style( 'apweb-nivoslider-style', get_template_directory_uri()."/css/nivo-slider.css" );
    wp_enqueue_style( 'apweb-main-style', get_template_directory_uri()."/css/main.css" );
    wp_enqueue_style( 'apweb-base-style', get_template_directory_uri()."/css/style_base.css" );
    wp_enqueue_script( 'apweb-nivo-script', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
    wp_enqueue_script( 'apweb-custom_js', get_template_directory_uri() . '/js/custom.js' );
    wp_enqueue_script( 'apweb-custom_brinc', get_template_directory_uri() . '/js/brincando.js' );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'apweb_scripts_' );

function apweb_ie_stylesheet(){
    global $wp_styles;
    
    /** Load our IE-only stylesheet for all versions of IE.
    *   <!--[if lt IE 9]> ... <![endif]-->
    *
    *  Note: It is also possible to just check and see if the $is_IE global in WordPress is set to true before
    *  calling the wp_enqueue_style() function. If you are trying to load a stylesheet for all browsers
    *  EXCEPT for IE, then you would HAVE to check the $is_IE global since WordPress doesn't have a way to
    *  properly handle non-IE conditional comments.
    */
    wp_enqueue_style('apweb-ie', get_template_directory_uri().'/css/ie.css', array('apweb-style'));
    $wp_styles->add_data('apweb-ie','conditional','IE');
    }
add_action('wp_enqueue_scripts','apweb_ie_stylesheet');



define('SKT_URL','http://artphotografie.com');
define('SKT_THEME_URL','http://artphotografie.com/themes');
define('SKT_THEME_URL_DIRECT','http://artphotografie.com/shop/apweb-corporate-wordpress-theme/');
define('SKT_THEME_DOC','http://artphotografie.com/documentation/apweb-documentation/');
define('SKT_PRO_THEME_URL','http://artphotografie.com/shop/apweb-corporate-wordpress-theme/');
define('SKT_THEME_FEATURED_SET_VIDEO_URL','https://www.youtube.com/...');



/**
 * Customizer additions.
 */




/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack/jetpack.php';


