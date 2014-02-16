<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <?php get_template_part('templates/header'); ?>
    <main role="main">
      <?php include(Theme_Template_Wrapper::$main_template_file_path); ?>
    </main>
    <?php get_template_part('templates/footer'); ?>
  </body>
</html>
