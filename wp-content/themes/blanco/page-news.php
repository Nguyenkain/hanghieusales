<?php
  /**
   * Template Name: News template
   *
   * A custom page template without sidebar.
   *
   * The "Template Name:" bit above allows this to be selectable
   * from a dropdown menu on the edit page screen.
   *
   */

  get_header(); ?>
<section id="main" class="column1">
  <div class="title_wrapper">
    <div class="span12">
      <h1 class="page-title text-left">Tin tức &amp; Sự kiện</h1>
    </div>
  </div>
  <div class="content">
    <div class="row-fluid">
      <div id="content-wrapper" class="span9 content-part">
        <?php

          if (get_query_var('paged')) {
            $paged = get_query_var('paged');
          } else if (get_query_var('page')) {
            $paged = get_query_var('page');
          } else {
            $paged = 1;
          }
          $year = get_query_var('year');
          $month = get_query_var('monthnum');
          $i = 0;
          $args = array(
            'post_type' => 'news_info',
            'paged' => $paged,
            'year' => $year,
            'monthnum' => $month,
          );

        ?>
        <?php
          $recent = new WP_Query($args);
          if ($recent->have_posts()) : ?>
            <?php while ($recent->have_posts()):$recent->the_post(); ?>
              <article id="post-<?php echo $post->ID; ?>"
                       class="post-<?php echo $post->ID; ?> post type-post status-publish format-standard hentry category-tin-tuc-su-kien blog-list clearfix">

                <div class="row-fluid">

                  <div class="span2">
                    <div class="post-thumb">
                      <a class="zoom"
                         href="<?php echo get_permalink(); ?>"
                         title="<?php the_title(); ?>">
                        <?php the_post_thumbnail("result-main", array("class" => "mainImage")); ?>
                      </a>
                    </div>
                  </div>

                  <div class="span10">

                    <h3 class="post-title"><a
                        href="<?php echo get_permalink(); ?>"
                        title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>


                    <div class="post-excerpt">
                      <p><?php echo get_the_excerpt(); ?></p>

                      <p><a href="<?php echo get_permalink(); ?>"
                            class="more-link">Read more</a></p>
                    </div>

                  </div>

                </div>

              </article>
            <?php endwhile; ?>
          <?php endif; ?>
      </div>
      <aside id="sidebar-wrapper" class="span3 sidebar">
        <?php get_sidebar('news_info'); ?>
      </aside>
    </div>
  </div>
  <!-- #content -->
  <div class="clear"></div>
</section><!-- #container -->

<?php get_footer(); ?>
