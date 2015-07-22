<?php
  /**
   * The Sidebar containing the primary and secondary widget areas.
   *
   */
?>
<section id="recent-posts-2" class="widget widget_recent_entries">
  <h3 class="widget-title">
    <span>Thông Báo</span></h3>
  <ul>
    <?php $recent = new WP_Query('post_type=news_info&category_info=thong-bao&posts_per_page=-1&order=ASC');
      while ($recent->have_posts()) : $recent->the_post(); ?>
    <li>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </li>
      <?php endwhile;wp_reset_postdata(); ?>
  </ul>
</section>
<style>
.widget-title{font-size:14px;font-weight: bold;}
.widget ul li
{
    list-style:none;
    padding:5px 0px;
    position:relative;
    padding-left:10px;
}
.widget ul li:before
{
    background-color:#FF5D2A;
    content:"";
    display:block;
    position:absolute;
    height:3px;
    top:0px;
    top:14px;
    width:3px;
    left:0px;
}
.widget ul li a:hover
{
    text-decoration: underline;
}
</style>
