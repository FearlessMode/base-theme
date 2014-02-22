<?php
$featured_image = new Theme_Featured_Image(get_the_ID());
?>
<article <?php post_class(); ?>>
  <header<?php
    echo false !== $featured_image->get_image_data_url('favicon') ? ' style="background-image: url(' . $featured_image->get_image_data_url('favicon') . '); background-size: cover; min-height: 15em; background-position: center center;"' : '';
    echo false !== $featured_image->get_image_url('full') ? ' data-featured-image="' . $featured_image->get_image_url('full') . '"' : '';
  ?>>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php get_template_part('templates/entry-meta'); ?>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
</article>
