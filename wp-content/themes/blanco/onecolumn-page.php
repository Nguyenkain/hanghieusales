<?php
  /**
   * Template Name: One column, no sidebar
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

    <div class="process_step">
      <?php
        $page_id = get_queried_object_id();
        if ($page_id == 280) {
          echo "<img src='" . get_bloginfo('template_directory') . "/images/order-step-1.png' alt='buoc thanh toan gio hang'>";
        } elseif ($page_id == 281) {
          $query = get_query_var("order-received");
          if (isset($query) && $query) {
            echo "<img src='" . get_bloginfo('template_directory') . "/images/order-step-4.png' alt='buoc thanh toan gio hang'>";
          } else {
            echo "<img src='" . get_bloginfo('template_directory') . "/images/order-step-3.png' alt='buoc thanh toan gio hang'>";
          }
        }
      ?>
    </div>

    <?php
      /* Run the loop to output the posts.
       * If you want to overload this in a child theme then include a file
       * called loop-index.php and that will be used instead.
       */
      get_template_part('loop', 'page');
    ?>
  </div>
  <!-- #content -->
  <div class="clear"></div>
</section><!-- #container -->

<?php get_footer(); ?>
