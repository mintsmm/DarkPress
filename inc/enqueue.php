<?php 

/**
 * Enqueue All the Stylesheets and Scripts for the WordPress Dark Mode.
 * @package DarkPress
 * @author Tristan Elliott
 */
/**
 * Frontend Scripts & Styles.
 *
 * @return void
 */
if(! function_exists('darkpress_scripts') ) :
    /**
     * Load All the Scripts & Styles For the frontend of the theme.
     *
     * @return void
     */
    function darkpress_scripts()
    {
        wp_enqueue_style('darkpress-style', get_stylesheet_uri());
        wp_enqueue_style('darkpress-css', get_template_directory_uri() . '/assets/dist/css/dark.css', array(), '1.0.0', 'all');
        wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/dist/css/bootstrap.min.css', array(), '4.3.1', 'all');
        wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/dist/js/bootstrap.min.js', array( 'jquery' ), '4.3.1', true);
        wp_enqueue_script('darkpress-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
endif;
add_action('wp_enqueue_scripts', 'darkpress_scripts');