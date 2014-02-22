<?php
if(!class_exists('Theme_Setup')){
  class Theme_Setup{

    public static function init(){
      add_action('after_setup_theme', array('Theme_Featured_Image', 'add_image_sizes'));
      add_action('after_setup_theme', array('Theme_Setup', 'load_theme_textdomain'));
      add_action('after_setup_theme', array('Theme_Setup', 'add_theme_support'));
      add_action('after_setup_theme', array('Theme_Setup', 'register_navigation'));
      add_filter('template_include', array('Theme_Template_Wrapper', 'wrap'));
      add_action('wp_enqueue_scripts', array('Theme_Setup', 'register_scripts'));
      add_action('wp_enqueue_scripts', array('Theme_Setup', 'register_styles'));
      self::cleanup_head();
      Theme_Relative_Urls::init();
    }

    public static function cleanup_head(){
      remove_action('wp_head', 'feed_links', 2);
      remove_action('wp_head', 'feed_links_extra', 3);
      remove_action('wp_head', 'rsd_link');
      remove_action('wp_head', 'wlwmanifest_link');
      remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
      remove_action('wp_head', 'wp_generator');
      remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
    }

    public static function load_theme_textdomain(){
      load_theme_textdomain(THEME_NAME, get_template_directory() . '/languages');
    }

    public static function add_theme_support(){
      add_theme_support('post-thumbnails');
//      add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
      add_editor_style('/css/editor-style.min.css');
    }

    public static function register_navigation(){
      register_nav_menus(array(
        'primary_navigation' => __('Primary Navigation', THEME_NAME),
      ));
    }

    public static function register_scripts(){

    }

    public static function register_styles(){
      if(function_exists('wp_register_deferred_style')){
        wp_register_deferred_style('deferred', get_template_directory_uri() . '/css/deferred.min.css', array('priority'), THEME_VERSION, 'all');
        if(function_exists('wp_register_inline_style')){
          wp_register_inline_style('priority', get_template_directory_uri() . '/css/priority.min.css', array(), THEME_VERSION, 'all');
        }else{
          wp_register_style('priority', get_template_directory_uri() . '/css/priority.min.css', array(), THEME_VERSION, 'all');
        }
        wp_enqueue_style('deferred');
      }else{
        wp_register_style('theme-style', get_template_directory_uri() . '/css/style.min.css', array(), THEME_VERSION, 'all');
        wp_enqueue_style('theme-style');
      }
      wp_register_style('print', get_template_directory_uri() . '/css/print.min.css', array(), THEME_VERSION, 'all');
      wp_enqueue_style('print');

    }

  }
}
