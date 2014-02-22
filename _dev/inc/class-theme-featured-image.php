<?php
if(!class_exists('Theme_Featured_Image')){
  class Theme_Featured_Image{

    public $attachment_id;
    public $image_data = array();

    public static function add_image_sizes(){
      add_image_size('micro', 4, 4, false);
      add_image_size('favicon', 16, 16, false);
    }

    public function __construct($post_id){
      $this->attachment_id = get_post_thumbnail_id($post_id);
    }

    public function get_image_url($size){
      if(empty($this->attachment_id)){
        return false;
      }
      if(empty($this->image_data[$size])){
        $this->image_data[$size] = wp_get_attachment_image_src($this->attachment_id, $size);
        if(empty($this->image_data[$size])){
          return false;
        }
      }

      return $this->image_data[$size][0];
    }

    public function get_image_data_url($size){
      if(empty($this->attachment_id)){
        return false;
      }
      if(empty($this->image_data[$size])){
        $this->image_data[$size] = wp_get_attachment_image_src($this->attachment_id, $size);
        if(empty($this->image_data[$size])){
          return false;
        }
      }
      if(empty($this->image_data[$size][4])){
        $file = str_replace(get_bloginfo('url'), ABSPATH, $this->image_data[$size][0]);
        $image_type = pathinfo($file, PATHINFO_EXTENSION);
        $image_data = file_get_contents($file);
        $this->image_data[$size][4] = 'data:image/' . $image_type . ';base64,' . base64_encode($image_data);
      }

      return $this->image_data[$size][4];
    }
  }
}
