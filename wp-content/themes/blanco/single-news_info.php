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
get_header();
?>
<section id="main" class="column1">
    <div class="breadcrumb">
        <a href="<?php echo home_url(); ?>" title="Trang chủ" class="home"><i class="icon-home"></i>&nbsp;&nbsp; /</a>
        <h2><span><?php the_title(); ?></span></h2>
    </div>
    <div class="content">
        <div class="row-fluid">
            <div id="content-wrapper" class="span9 content-part">
                <?php echo apply_filters('the_content',$post->post_content); ?>
                <br>
                <table class="fbne" style="margin-bottom: 20px;">
                    <tbody>
                        <tr>
                            <td>Bấm</td>
                            <td><div class="fb-like" data-href="http://hanghieusales.com/" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div></td>
                            <td>để nhận thông tin khuyến mãi hấp dẫn hằng ngày từ Hàng Hiệu Sales</td>
                        </tr>
                    </tbody>
                </table>
                <!-- start ne --> <br />
                <?php
                $next_post = get_next_post();
                $xcontent = strip_tags($next_post->post_content);
                if (!empty($next_post)):
                    ?>
                    <div class="nextpost">
                        <?php echo get_the_post_thumbnail($next_post->ID, 'thumbnail'); ?>
                        <h3><a href="<?php echo get_permalink($next_post->ID); ?>"><?php echo $next_post->post_title; ?></a></h3>
    <?php echo substr($xcontent, 0, strripos(substr($xcontent, 0, 300), ' ')); ?>...
                        <div style="clear:both"></div>
                    </div>
                <?php endif; ?>

                <?php
                $next_post = get_previous_post();
                $xcontent = strip_tags($next_post->post_content);
                if (!empty($next_post)):
                    ?>
                <div class="nextpost" style="margin-bottom:20px">
                        <?php echo get_the_post_thumbnail($next_post->ID, 'thumbnail', array('alt' => $next_post->post_title)); ?>
                        <h3><a href="<?php echo get_permalink($next_post->ID); ?>"><?php echo $next_post->post_title; ?></a></h3>
                    <?php echo substr($xcontent, 0, strripos(substr($xcontent, 0, 300), ' ')); ?>...
                        <div style="clear:both"></div>
                    </div>
<?php endif; ?>
                
                <!-- end ne --> 
                <div class="fb-comments" data-href="<?php echo get_permalink(); ?>" data-width="695" data-numposts="10" data-colorscheme="light"></div>
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
