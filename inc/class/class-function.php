<?php
add_action('header_init', 'title');

function title() {
    ?>
    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    <?php
}

add_action('page_init', 'page');

function page() {
    get_template_part('template-parts/content', 'page');
}

add_action('loop_init', 'loop');

function loop() {
    while (have_posts()) : the_post();

        do_action('page_init');

        // the_post_navigation();

        do_action('comment_init');

    endwhile; // End of the loop.
}

add_action('format_init', 'format');

function format() {
    get_template_part('template-parts/content', get_post_format());
}

add_action('none_init', 'content_none');

function content_none() {
    get_template_part('template-parts/content', 'none');
}

add_action('content_init', 'content');

function content() {
    the_content();

}

/**
 * @param $val_zero
 * @param $val_max
 */
function apweb_the_excerpt($val_zero, $val_max){
                      $temp_arr_content = explode(" ", substr(strip_tags(get_the_content()), $val_zero, $val_max));
                      $temp_arr_content[count($temp_arr_content) - 1] = "";
                      $display_arr_content = implode(" ", $temp_arr_content);
                      echo $display_arr_content;
    }

add_action('comment_init', 'comments');

function comments() {

    // If comments are open or we have at least one comment, load up the comment template.
    if (comments_open() || get_comments_number()) :
        comments_template();
    endif;
}
function apweb_get_breadcrumb(){
   global $post;
   $show_breadcrumb = "";
   if(isset($post->ID) && is_numeric($post->ID)){
    $show_breadcrumb = get_post_meta( $post->ID, '_apweb_show_breadcrumb', true );
    }
    if($show_breadcrumb == 1 || $show_breadcrumb==""){
    
    /**
    *     echo  '<div class="box-nav breadcrumb"><div class="container"><div class="crumb">';
    *
    */
    
    echo  '<div class="box-nav breadcrumb"><div class=""><div class="crumb">';
    new apweb_breadcrumb;}
    else {
        echo '</div><div class="input hidden apweb-searchform"><form action="'.esc_url(home_url('/')).'" id="cse-search-box"><input type="text" value="Search" onFocus="if(this.value==\'Search\'){this.value=\'\'}" id="s" onBlur="if(this.value==\'\'){this.value=\'Search\'}" name="s" class="search_r_text"><input type="submit" name="sa" class="search-btn" value=""></form></div> <div class="clear"></div></div></div>';
    

    }
}
add_action('posted_on_end_comments', '__posted_on__');
function __posted_on__(){
       if ('post' === get_post_type()) : ?>
                <div class="entry-meta">
                    <?php apweb_posted_on(); ?>
                    <span class="comments_count clearfix entry-comments-link"><?php comments_popup_link(__('0', 'apweb'), __('1', 'apweb'), __('%', 'apweb')); ?></span>
                </div><!-- .entry-meta -->
            <?php endif; 
}


function apweb_romdom_sidebar() {
    $get_blog_id = get_category_id('blog');

    $args = array(
        'post_type' => 'post',
        'cat' => $get_blog_id,
        'posts_per_page' => 2,
        'orderby' => 'rand'
    );
    query_posts($args);
    $x = 0;
    while (have_posts()) : the_post();

        if ($x == 2) {
            ?>
            <p class="last">
                <?php } else { ?>
<!--           <li>-->
            <?php } ?>


             <footer class="entry-footer"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></footer>
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('min-page'); ?></a>
            <p><?php
                $temp_arr_content = explode(" ", substr(strip_tags(get_the_content()), 0, 90));
                $temp_arr_content[count($temp_arr_content) - 1] = "";
                $display_arr_content = implode(" ", $temp_arr_content);
                echo $display_arr_content;
                ?><?php if (strlen(strip_tags(get_the_content())) > 180){ echo "..."; ?></p></li>
                <?php } else { ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/img_404.png" />
                    <?php } ?>

        <?php $x++; ?>
    <?php endwhile; ?>                    
    <?php
    wp_reset_query();
}

add_action('slide', 'apweb_slide');

function apweb_slide(){
     if (is_home() && is_front_page()) {?>
                <section id="home_slider">
          
               <?php
            $sldimages = ''; 
            $sldimages = array(
                        '1' => get_template_directory_uri().'/images/slides/slider1.jpg',
                        '2' => get_template_directory_uri().'/images/slides/slider2.jpg',
                        '3' => get_template_directory_uri().'/images/slides/slider3.jpg',
                        '4' => get_template_directory_uri().'/images/slides/slider1.jpg',
                        '5' => get_template_directory_uri().'/images/slides/slider3.jpg',
            ); ?>
            
            <?php
            $slAr = array();
            $m = 0;
            for ($i=1; $i<6; $i++) {
                if ( get_theme_mod('slide_image'.$i, $sldimages[$i]) != "" ) {
                    $imgSrc     = get_theme_mod('slide_image'.$i, $sldimages[$i]);
                    $imgTitle   = get_theme_mod('slide_title'.$i);
                    $imgDesc    = get_theme_mod('slide_desc'.$i);
                    $imgLink    = get_theme_mod('slide_link'.$i);
                    if ( strlen($imgSrc) > 3 ) {
                        $slAr[$m]['image_src'] = get_theme_mod('slide_image'.$i, $sldimages[$i]);
                        $slAr[$m]['image_title'] = get_theme_mod('slide_title'.$i);
                        $slAr[$m]['image_desc'] = get_theme_mod('slide_desc'.$i);
                        $slAr[$m]['image_link'] = get_theme_mod('slide_link'.$i);
                        $m++;
                    }
                }
            }
            $slideno = array();
            if( $slAr > 0 ){
                $n = 0;?>
                <div class="slider-wrapper theme-default"><div id="slider" class="nivoSlider">
                <?php 
                foreach( $slAr as $sv ){
                    $n++; ?><img src="<?php echo esc_url($sv['image_src']); ?>" alt="<?php echo esc_attr($sv['image_title']);?>" title="<?php echo esc_attr('#slidecaption'.$n) ; ?>" /><?php
                    $slideno[] = $n;
                }
                ?>
                    </div><?php
                foreach( $slideno as $sln ){ ?>
                    <div id="slidecaption<?php echo $sln; ?>" class="nivo-html-caption">
                    <div class="slide_info">
                            <h1><a href="<?php echo esc_url(get_theme_mod('slide_link'.$sln,'#link'.$sln)); ?>"><?php echo get_theme_mod('slide_title'.$sln, 'Slide Title'.$sln); ?></a></h1>
                            <p><?php echo get_theme_mod('slide_desc'.$sln, 'Slide Description'.$sln); ?></p>
                    </div>
                    </div><?php 
                } ?>
                </div>
                <div class="clear"></div><?php 
            }
            ?>
        </section>
        <?php } 
}

if ( ! function_exists( 'apweb_post_audio' ) ) :
    /**
     * Audio playback support for post with the audio format
     *
     * Displays the attached audio files in a HTML5 <audio> tag with flash fallback
     * If more then one attached audio file is found, they are used as fallback to the first one
     * Should work in most if not all browsers :)
     *
     * @uses get_posts() To retrieve attached audio files
     *
     * @since apweb 1.0
     */
    function apweb_post_audio() {
        // Get attached audio files
        $args = array(
            'numberposts' => -1,
            'post_type' => 'attachment',
            'post_mime_type' => 'audio',
            'post_parent' => get_the_ID()
        );
        $attachments = get_posts( $args );
        // Reverse array to display them in chronological form instead of reverse chronological
        $attachments = array_reverse( $attachments );
        if( count( $attachments ) ) :
            // Detect MP3 file to use it as flash fallback
            $mime_types = array();
            foreach( $attachments as $attachment ) :
                if( $attachment->post_mime_type == 'audio/mpeg' )
                    $flash_audio = $attachment;
            endforeach;
        endif;
        if( count( $attachments ) && ! post_password_required() ) : ?>
            <div class="entry-attachment">
                <audio controls id="player">
                    <?php foreach( $attachments as $attachment ) : ?>
                        <source src="<?php echo wp_get_attachment_url( $attachment->ID ); ?>">
                    <?php endforeach; ?>
                </audio>
                <?php if( isset( $flash_audio ) ) :
                    // Display flash fallback ?>
                    <div id="audioplayer"></div>
                    <script type="text/javascript">
                        var audioTag = document.createElement('audio');
                        if( !( !!( audioTag.canPlayType ) && ( <?php foreach( $attachments as $attachment ) : ?>( ( "no" != audioTag.canPlayType( "<?php echo $attachment->post_mime_type; ?>" ) ) && ( "" != audioTag.canPlayType( "<?php echo $attachment->post_mime_type; ?>" ) ) )<?php if( $attachment != end( $attachments ) ) : ?> || <?php endif; ?><?php endforeach; ?> ) ) ) {
                            document.getElementById("player").style.display="none";
                            AudioPlayer.embed("audioplayer", {soundFile: "<?php echo wp_get_attachment_url( $flash_audio->ID ); ?>"});
                        }
                    </script>
                <?php endif; ?>
            </div><!-- .entry-attachment -->
        <?php endif;
    }
endif;
