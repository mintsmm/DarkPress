<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package DarkPress
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function darkpress_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if (! is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (! is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'darkpress_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function darkpress_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'darkpress_pingback_header');


/**
* Add classes to navigation buttons
*/
add_filter('next_posts_link_attributes', 'darkpress_posts_link_attributes');
add_filter('previous_posts_link_attributes', 'darkpress_posts_link_attributes');
add_filter('next_comments_link_attributes', 'darkpress_comments_link_attributes');
add_filter('previous_comments_link_attributes', 'darkpress_comments_link_attributes');

function darkpress_posts_link_attributes()
{
    return 'class="btn btn-outline-primary mb-4"';
}

function darkpress_comments_link_attributes()
{
    return 'class="btn btn-outline-primary mb-4"';
}

/**
* Return shorter excerpt
*/
function darkpress_get_short_excerpt($length = 40, $post_obj = null)
{
    global $post;
    if (is_null($post_obj)) {
        $post_obj = $post;
    }
    $length = absint($length);
    if ($length < 1) {
        $length = 40;
    }
    $source_content = $post_obj->post_content;
    if (! empty($post_obj->post_excerpt)) {
        $source_content = $post_obj->post_excerpt;
    }
    $source_content = preg_replace('`\[[^\]]*\]`', '', $source_content);
    $trimmed_content = wp_trim_words($source_content, $length, '...');
    return $trimmed_content;
}
