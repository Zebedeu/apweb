<?php

/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package APWEB-FRAMWORK
 * @since Apweb 1.0.2
 */



if (!function_exists('apweb_posted_on')) :

    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function apweb_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf($time_string, esc_attr(get_the_date('c')), esc_html(get_the_date()), esc_attr(get_the_modified_date('c')), esc_html(get_the_modified_date())
        );

        $posted_on = sprintf(
                esc_html_x('Posted on %s', 'post date', 'apweb'), '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
        );

        $byline = sprintf(
                esc_html_x('by %s', 'post author', 'apweb'), '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
        );

        echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
    }

endif;

if (!function_exists('apweb_entry_footer')) :

    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function apweb_entry_footer() {
        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(esc_html__(', ', 'apweb'));
            if ($categories_list && apweb_categorized_blog()) {
                printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'apweb') . '</span>', $categories_list); // WPCS: XSS OK.
            }

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', esc_html__(', ', 'apweb'));
            if ($tags_list) {
                printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'apweb') . '</span>', $tags_list); // WPCS: XSS OK.
            }
        }

        if (!is_single() && !post_password_required() && ( comments_open() || get_comments_number() )) {
            echo '<span class="comments-link">';
            comments_popup_link(esc_html__('Leave a comment', 'apweb'), esc_html__('1 Comment', 'apweb'), esc_html__('% Comments', 'apweb'));
            echo '</span>';
        }

        edit_post_link(esc_html__('Edit', 'apweb'), '<span class="edit-link">', '</span>');
    }

endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function apweb_categorized_blog() {
    if (false === ( $all_the_cool_cats = get_transient('apweb_categories') )) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories(array(
            'fields' => 'ids',
            'hide_empty' => 1,
            // We only need to know if there is more than one category.
            'number' => 2,
        ));

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count($all_the_cool_cats);

        set_transient('apweb_categories', $all_the_cool_cats);
    }

    if ($all_the_cool_cats > 1) {
        // This blog has more than 1 category so apweb_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so apweb_categorized_blog should return false.
        return false;
    }
}

function apweb_pagination( $mid = 2, $end = 1, $show = false, $query = null ) {

    // Prevent show pagination number if Infinite Scroll of JetPack is active.
    if ( ! isset( $_GET[ 'infinity' ] ) ) {

        global $wp_query, $wp_rewrite;

        $total_pages = $wp_query->max_num_pages;

        if ( is_object( $query ) && null != $query ) {
            $total_pages = $query->max_num_pages;
        }

        if ( $total_pages > 1 ) {
            $url_base = $wp_rewrite->pagination_base;
            $big = 999999999;

            // Sets the paginate_links arguments.
            $arguments = apply_filters( 'apweb_pagination_args', array(
                    'base'      => esc_url_raw( str_replace( $big, '%#%', get_pagenum_link( $big, false ) ) ),
                    'format'    => '',
                    'current'   => max( 1, get_query_var( 'paged' ) ),
                    'total'     => $total_pages,
                    'show_all'  => $show,
                    'end_size'  => $end,
                    'mid_size'  => $mid,
                    'type'      => 'list',
                    'prev_text' => __( '&laquo; Previous', 'apweb' ),
                    'next_text' => __( 'Next &raquo;', 'apweb' ),
                )
            );

            $pagination = '<div class="pagination-wrap">' . paginate_links( $arguments ) . '</div>';

            // Prevents duplicate bars in the middle of the url.
            if ( $url_base ) {
                $pagination = str_replace( '//' . $url_base . '/', '/' . $url_base . '/', $pagination );
            }

            return $pagination;
        }
    }
}

if ( ! function_exists( 'apweb_paging_nav' ) ) {

    /**
     * Print HTML with meta information for the current post-date/time and author.
     *
     * @since 2.2.0
     */
    function apweb_paging_nav() {
        $mid  = 2;     // Total of items that will show along with the current page.
        $end  = 1;     // Total of items displayed for the last few pages.
        $show = false; // Show all items.

        echo apweb_pagination( $mid, $end, false );
    }
}


/**
 * Flush out the transients used in apweb_categorized_blog.
 */
function apweb_category_transient_flusher() {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient('apweb_categories');
}

add_action('edit_category', 'apweb_category_transient_flusher');
add_action('save_post', 'apweb_category_transient_flusher');
