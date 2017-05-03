<?php
add_filter('show_admin_bar', '__return_false');
add_theme_support( 'post-thumbnails' );

function enqueue_scripts_styles() {
    wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/style-min.css', array(), '1.2.3');
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/js/scripts-min.js', array(), '1.2.4', true);
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts_styles' );

//Typically no need for these, but FYI this is disabling core feature
function disable_wp_emojicons() {
  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );

?>
