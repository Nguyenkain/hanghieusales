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
      <div class="breadcrumb">
        <a href="<?php echo home_url(); ?>" title="Trang chủ" class="home"><i class="icon-home"></i>&nbsp;&nbsp; /</a>
        <span>Tin tức sự kiện</span>
      </div>
  <div class="content">
    <div class="row-fluid">
      <div id="content-wrapper" class="span9 content-part">
        <?php
          if (have_posts()) : ?>
            <?php while (have_posts()):the_post(); ?>
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
                      <p><a href="<?php echo get_permalink(); ?>" class="more-link"><i class="icon-circle-arrow-right"></i>&nbsp;&nbsp;Read more</a></p>
                    </div>

                  </div>

                </div>

              </article>
            <?php endwhile; ?>
            <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
          <?php endif; ?>
      </div>
      <aside id="sidebar-wrapper" class="span3 sidebar">
        <?php get_sidebar('news'); ?>
      </aside>
    </div>
  </div>
  <!-- #content -->
  <div class="clear"></div>
</section><!-- #container -->

<?php get_footer(); ?>
</div>
