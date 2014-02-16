<?php
if(!class_exists('Theme_Relative_Urls')){
  class Theme_Relative_Urls{

    public static function make_relative_url($url){
      preg_match('|https?://([^/]+)(/.*)|i', $url, $matches);
      if(!isset($matches[1]) || !isset($matches[2])){
       return $url; 
      }elseif(($matches[1] === $_SERVER['SERVER_NAME']) || $matches[1] === $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT']) {
       return wp_make_link_relative($url);
      }else{
       return $url;
      }
    }

    public static function init(){
      if(!(is_admin() || in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php')))){
        foreach(array(
          'bloginfo_url',
          'the_permalink',
          'wp_list_pages',
          'wp_list_categories',
          'roots_wp_nav_menu_item',
          'the_content_more_link',
          'the_tags',
          'get_pagenum_link',
          'get_comment_link',
          'month_link',
          'day_link',
          'year_link',
          'tag_link',
          'the_author_posts_link',
          'script_loader_src',
          'style_loader_src'
        ) as $filter){
          add_filter($filter, array('Theme_Relative_Urls', 'make_relative_url'));
        }
      }
    }
  }
}
