<?php
get_template_part('templates/page', 'header');
if(!have_posts()):
  get_template_part('templates/nothing');
endif;

while(have_posts()) : the_post();
  get_template_part('templates/content', get_post_format());
endwhile;

if($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <?php
      echo paginate_links(array(
        'base' => str_replace(99999999, '%#%', get_pagenum_link(99999999)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'prev_text' => __('&larr; Newer Entries'),
        'next_text' => __('Older Entries &rarr;'),
        'end_size' => 3,
        'mid_size' => 3,
        'total' => $wp_query->max_num_pages
      ));
    ?>
  </nav>
<?php endif;
