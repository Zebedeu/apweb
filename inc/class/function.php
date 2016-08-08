<?php
/**
 * The Theme Options page
 *
 * This page is implemented using the Settings API
 * http://codex.wordpress.org/Settings_API
 * 
 * @package APWEB-FRAMWORK 
 * @since Apweb 1.0.2
 */
if (!function_exists('apweb_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    
    
    function apweb_setup() {

        /*         * *** loard APWEB-FRAMWORK theme Options */

        add_filter('show_admin_bar', '__return_false');


        // Remover link RSD ,,  O RSD (Real Simples Discovery) e usado pelo mecanismo de clientes XML-RPC. Se voce nao utiliza servicos como Flickr ou Quora com seu WordPress, considere remove-lo com a linha de codigo abaixo:

        remove_action('wp_head', 'rsd_link');



// Remove os shortlinks dos posts,, Por padrao, o WordPress mostra os links curtos dos artigos no cabecalho. Caso queira, e possivel remover com a seguinte linha de codigo:

        remove_action('wp_head', 'wp_shortlink_wp_head');



// Remove a versao do WordPress do cabecalho,, Para remover isso, adicione o seguinte no seu functions.php.

        remove_action('wp_head', 'wp_generator');



// Remove wlwmanifest_link - Recurso usado pelo Windows Live Writer.,, Este e um recurso para quem utiliza o Windows Live Writer, se nao for seu caso, adicione o seguinte no functions.php:

        remove_action('wp_head', 'wlwmanifest_link');


// Remove estilos da galeria,, A galeria de imagens vem com estilo padrao, o que pode tornar mais complicado fazer a estilizacao por CSS. Caso queira remover o estilo padrao, adicione o seguinte:

        add_filter('use_default_gallery_style', '__return_false');




        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');


        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ));



        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on APWEB-FRAMWORK, use a find and replace
         * to change 'apweb' to the name of your theme in all the template files.
         */
        load_theme_textdomain('apweb', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

         /* Add Post Thumbnails Support and Related Image Sizes */

    add_image_size('blog-page', 732, 9999, false);                  // For Blog Page
    add_image_size('default-page', 9999, 9999, false);              // Default Page and Full Width Page
    add_image_size('blog-post-thumb', 732, 447, true);              // For Home Blog Section and Gallery Slider on Single and Blog Page
    add_image_size('mini-page', 300, 200, false);
        add_image_size( 'video-thumb', 700, 444, 1 );

        // This theme uses wp_nav_menu() in one location.
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary Menu', 'apweb'),
            'secondy' => esc_html__('Secondy Menu', 'apweb'),
            'Footer' => esc_html__('Footer Menu', 'apweb'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        /*
         * Enable support for Post Formats.
         * See https://developer.wordpress.org/themes/functionality/post-formats/
         */
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'audio',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('apweb_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
    }


endif; // apweb_setup
add_action('after_setup_theme', 'apweb_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function apweb_content_width() {
    $GLOBALS['content_width'] = apply_filters('apweb_content_width', 640);
}

add_action('after_setup_theme', 'apweb_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function apweb_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'apweb'),
        'id' => 'sidebar-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Sidebar 2', 'apweb'),
        'id' => 'sidebar-2',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Sidebar 3', 'apweb'),
        'id' => 'sidebar-3',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Sidebar 4', 'apweb'),
        'id' => 'sidebar-4',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'apweb_widgets_init');

/** 
*   Rondom for sidebar 
*
*/

function get_category_id($cat_name){
    $term = get_term_by('name', $cat_name, 'category');
    return $term->term_id;
}


/**
 * Apweb custom stylesheet URI.
 *
 * @since  1.0.2
 *
 * @param  string $uri Default URI.
 * @param  string $dir Stylesheet directory URI.
 *
 * @return string      New URI.
 */

/**
 * Enqueue scripts and styles.
 */

function apweb_scripts() {
    wp_enqueue_style('apweb-style', get_stylesheet_uri());
    wp_enqueue_style('apweb', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style( 'apweb-woo', get_template_directory_uri() . '/assets/css/woo.css');
    wp_enqueue_style('apweb-efect', get_template_directory_uri() . '/assets/css/efect.css');

     // wp_enqueue_style('apwebB', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap-themes.css');
     wp_enqueue_style('apwebC', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap-themes.min.css');
      wp_enqueue_style('apwebD', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css');
       // wp_enqueue_style('apwebE', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.css');


   wp_enqueue_script('apweb-navigations', get_template_directory_uri() . '/assets/bootstrap/jQuery.js');
   wp_enqueue_script('apweb-jsA', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.js');
   wp_enqueue_script('apweb-jsB', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js');
    wp_enqueue_script('apweb-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true);
    wp_enqueue_script('apweb-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'apweb_scripts');




// ***************WP LOGO DE SIGNUP ******************

    function apweb_logo(){
        echo '<style type="text/css">
        h1 a { background-image: url(' . get_stylesheet_uri('stylesheet_directory'). '../images/logo.png) !important;}
        </style>';
    }
    add_action('login_head', 'apweb_logo');
function apweb_Login() {

// Verifica se o usuario esta logado
    if (!is_user_logged_in()) {

        $login = '<a href="' . wp_login_url() . '">login</a>';
        $registre_se = '<a href="' . wp_registration_url() . '">registre-se</a>';

        // Argumentos do formulario de login
        $login_args = array(
            'echo' => true,
            'form_id' => 'loginform',
            'label_username' => 'Username',
            'label_password' => 'Password',
            'label_remember' => 'Remember Me',
            'label_log_in' => 'Log In',
            'id_username' => 'user_login',
            'id_password' => 'user_pass',
            'id_remember' => 'rememberme',
            'id_submit' => 'wp-submit',
            'remember' => true,
            'value_username' => NULL,
            'value_remember' => false
        );

        wp_login_form($login_args);
        } else {?>

         <a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
                            

                           


         <?php }
     }


remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
    echo '<section id="main">';
}

function my_theme_wrapper_end() {
    echo '</section>';
}
/**
 * Query WooCommerce activation
 *
 * @since  1.0.2
 *
 * @return boolean
 */

if ( ! function_exists( 'is_woocommerce_activated' ) ) {
    function is_woocommerce_activated() {
        return class_exists( 'woocommerce' ) ? true : false;
    }
}


if ( is_woocommerce_activated() ) {
    add_theme_support( 'woocommerce' );
    require get_template_directory() . '/inc/woocommerce/hooks.php';
    require get_template_directory() . '/inc/woocommerce/functions.php';
    require get_template_directory() . '/inc/woocommerce/template-tags.php';
}




