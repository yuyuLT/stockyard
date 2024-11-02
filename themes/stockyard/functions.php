<?php

function my_theme_enqueue_styles()
{
    wp_enqueue_style('my-theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

function register_menu()
{
    register_nav_menu('header-menu', __('header-menu', 'theme-slug'));
}
add_action('after_setup_theme', 'register_menu');
