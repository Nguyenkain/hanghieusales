<?php
/**
 * The template for displaying Tag Archive pages.
 *
 */

get_header(); ?>	
<br>
<?php
    $id = get_query_var('tag_id' );
    $tag = get_term_by( 'id', $id, 'post_tag', 'OBJECT' );
    $s = explode('-',$tag->slug);
    if( is_numeric( $s[ count($s)-1 ] ) ):
        unset($s[ count($s)-1 ]);
    endif;
    $s = implode('-', $s);
    echo do_shortcode('[etheme_new_productbytag limit="20" title="'.$tag->name.'" tags="'.$s.'"]' );
?>
<section id="main" class="column1">
      <div class="breadcrumb">
        <a href="<?php echo home_url(); ?>" title="Trang chủ" class="home"><i class="icon-home"></i> Trang chủ &nbsp;/ &nbsp;</a>
        <span><?php echo $tag->name; ?></span>
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
