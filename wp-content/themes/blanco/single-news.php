<?php
  /**
   * The Template for displaying all single posts.
   *
   */

  $blog_layout = etheme_get_option('blog_layout');
  $blog_sidebar = etheme_get_option('blog_sidebar');
  get_header(); ?>
<section id="main" class="columns2-right blog-<?php echo $blog_layout; ?>">
  <?php $show_post_info = etheme_get_option('show_post_info'); ?>
  <?php if (have_posts()) while (have_posts()) : the_post(); ?>
    <h2 class="article-title"><?php the_title(); ?></h2>
    <div class="content">


      <style>
        .article-title {
          width: 100%;
          left: 0px;
          
          font-size: 32px;
          text-align: center;
          padding: 40px 0px;
          z-index: 9999;
          background: #1b1b1b;
          color: #fff;
        }
      </style>
      <div id="nav-above" class="navigation">
        <div
          class="nav-previous"><?php etheme_previous_post_link('%link', '<span class="meta-nav">' . _x('&larr;', 'Previous post link', ETHEME_DOMAIN) . '</span> %title'); ?></div>
        <div
          class="nav-next"><?php etheme_next_post_link('%link', '%title <span class="meta-nav">' . _x('&rarr;', 'Next post link', ETHEME_DOMAIN) . '</span>'); ?></div>
      </div>
      <!-- #nav-above -->
      <div class="clear"></div>
      <article class="article-single" id="post-<?php the_ID(); ?>">
        <div class="article-image">
          <?php
            // check if the post has a Post Thumbnail assigned to it.
            if (has_post_thumbnail()) {
              the_post_thumbnail(array(700, 700));
            }
          ?>
        </div>
        <?php if ($show_post_info == 1): ?>
          <div class="article-meta">
            <?php etheme_posted_on(); ?> /
            <?php if (get_the_author_meta('description')) : // If a user has filled out their description, show a bio on their entries  ?>
              <div id="entry-author-info">
                <div id="author-avatar">
                  <?php echo get_avatar(get_the_author_meta('user_email'), apply_filters('twentyten_author_bio_avatar_size', 60)); ?>
                </div>
                <!-- #author-avatar -->
                <div id="author-description">
                  <h2><?php printf(__('About %s', ETHEME_DOMAIN), get_the_author()); ?></h2>
                  <?php the_author_meta('description'); ?>
                  <div id="author-link">
                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author">
                      <?php printf(__('View all posts by %s <span class="meta-nav">&rarr;</span>', ETHEME_DOMAIN), get_the_author()); ?>
                    </a>
                  </div>
                  <!-- #author-link	-->
                </div>
                <!-- #author-description -->
              </div><!-- #entry-author-info -->
            <?php endif; ?>
            <?php etheme_posted_in(); ?>
          </div>
        <?php endif; ?>
        <div class="article-description">
          <?php the_content(); ?>
          <?php wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'etheme'), 'after' => '</div>')); ?>
        </div>
        <div class="clear"></div>
      </article>


      <?php edit_post_link(__('Edit', 'etheme'), '<span class="edit-link">', '</span>'); ?>

    </div>
  <?php endwhile; // end of the loop. ?>
  <!-- #content -->
  <aside id="sidebar">
    <?php get_sidebar('news'); ?>
  </aside>
  <div class="clear"></div>
</section><!-- #container -->
<?php get_footer(); ?>

