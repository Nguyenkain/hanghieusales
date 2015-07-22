<?php
  /**
   * The Sidebar containing the primary and secondary widget areas.
   *
   */
?>
<section id="recent-posts-2" class="widget widget_recent_entries">
  <h3 class="widget-title">
    <span>Tin tức &amp; sự kiện</span></h3>
  <ul>
    <?php
      $args = array(
        'post_type' => 'news_info',
        "posts_per_page" => "-1",
        "nopaging" => true,
        'showposts' => '-1',
        'order' => 'ASC'
      );
    ?>
    <?php $recent = new WP_Query($args);
      while ($recent->have_posts()) : $recent->the_post(); ?>
    <li>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </li>
      <?php endwhile; ?>
  </ul>
</section>
