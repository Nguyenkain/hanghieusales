<?php
  /**
   * Template Name: Register Page
   *
   * A custom page template without sidebar.
   *
   * The "Template Name:" bit above allows this to be selectable
   * from a dropdown menu on the edit page screen.
   *
   */
  get_header(); ?>
<section id="main" class="column1">
  <div class="content">
    <?php if (have_posts()) while (have_posts()) : the_post(); ?>
      <?php if (is_user_logged_in()) { ?>
        <?php echo do_shortcode('[woocommerce_my_account]'); ?>
      <?php } else { ?>
        <?php echo do_shortcode('[mq_register form_name="Register"]'); ?>
      <?php } ?>
    <?php endwhile; // end of the loop. ?>
  </div>
  <!-- #content -->
  <div class="clear"></div>
</section><!-- #container -->

<?php get_footer(); ?>
