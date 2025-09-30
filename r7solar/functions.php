<?php 
function enqueue_global_scripts()
{
    wp_enqueue_style(handle: 'global-style', src: get_template_directory_uri() . '/layout.css');
    wp_enqueue_script(handle: 'global-script', src: get_template_directory_uri() . '/script.js', args: ['strategy' => 'defer', 'in_footer' => true]);
}

add_action('wp_enqueue_scripts', 'enqueue_global_scripts');
