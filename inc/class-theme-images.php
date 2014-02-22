<?php
if(!class_exists('Theme_Images')){
  class Theme_Images{
    public static function add_image_sizes(){
      add_image_size('mini', 4, 10, false);
    }
    public static function get_image_data_url($post_id, $size){
      $image_attachment_id = get_post_thumbnail_id($post_id);
      if(empty($image_attachment_id)){
        return false;
      }
      $image_attachment_data = wp_get_attachment_image_src($image_attachment_id, $size);
      $file = str_replace(get_bloginfo('url'), ABSPATH, $image_attachment_data[0]);
      $image_type = pathinfo($file, PATHINFO_EXTENSION);
      $image_data = file_get_contents($file);
      $base64_url = 'data:image/' . $image_type . ';base64,' . base64_encode($image_data);

      return $base64_url;
    }
  }
}
