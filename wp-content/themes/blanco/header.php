<?php

/**
 * The Header for our theme.
 *
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
  
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

  <link rel="shortcut icon" href="<?php echo get_template_directory_uri() . '/images/favicon.ico' ?>"/>


  <meta charset="<?php bloginfo('charset'); ?>"/>

<!-- BEGIN Tynt Script -->
<script type="text/javascript">
if(document.location.protocol=='http:'){
 var Tynt=Tynt||[];Tynt.push('bKUy8Kjdmr5ldfacwqm_6l');
 (function(){var s=document.createElement('script');s.async="async";s.type="text/javascript";s.src='http://tcr.tynt.com/ti.js';var h=document.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);})();
}
</script>
<!-- END Tynt Script -->
  
  <title><?php


      /*


       * Print the <title> tag based on what is being viewed.

       */

      global $page, $paged;



      wp_title('|', true, 'right');



      // Add the blog name.

      bloginfo('name');



      // Add the blog description for the home/front page.

      $site_description = get_bloginfo('description', 'display');

      if ($site_description && (is_home() || is_front_page()))

        echo " | $site_description";



      // Add a page number if necessary:

      if ($paged >= 2 || $page >= 2)

        echo ' | ' . sprintf(__('Page %s', 'blanco'), max($paged, $page));



    ?></title>

  <link rel="profile" href="http://gmpg.org/xfn/11"/>

  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>

  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>"/>

  <script type="text/javascript">

    var etheme_wp_url = '<?php echo home_url(); ?>';

    var succmsg = '<?php _e('All is well, your e&ndash;mail has been sent!', ETHEME_DOMAIN); ?>';

  </script>

  <!--[if IE]>

  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->



  <?php

    /* We add some JavaScript to pages with the comment form

     * to support sites with threaded comments (when in use).

     */

    if (is_singular() && get_option('thread_comments'))

      wp_enqueue_script('comment-reply');



    wp_head();

  ?>
<meta name="google-translate-customization" content="32529a894a26448c-c2e1815ac8d181cc-g1fea23d5d3c4fad3-11"></meta>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51275646-1', 'hanghieusales.com');
  ga('send', 'pageview');

</script>
<!-- Segment Pixel - Ibrand Seg - DO NOT MODIFY -->
<script src="https://secure.adnxs.com/seg?add=1878098&t=1" type="text/javascript"></script>
<!-- End of Segment Pixel -->        
</head>



<body <?php body_class(); ?>>


<?php get_template_part('et-styles'); ?>
<div id="container" class="wrapper-<?php etheme_option('main_layout') ?>">

  <?php if (etheme_get_option('loader') == 1): ?>

    <div id="loader">

      <div id="loader-status">

        <p class="center-text">

          <em><?php _e('Loading the content...', ETHEME_DOMAIN); ?></em>

          <em><?php _e('Loading depends on your connection speed!', ETHEME_DOMAIN); ?></em>

        </p>

      </div>

    </div>

  <?php endif; ?>

  <div class="header_contain">

    <?php if (etheme_get_option('top_links')): ?>
      <div id="links">

        <?php get_template_part('et-links'); ?>

      </div>

    <?php endif; ?>

    <header id="header">

      <div id="search" style="margin-left: 150px;">

        <?php get_search_form(); ?>

      </div>
<?php if(!is_user_logged_in()){ ?>
      <div class="menu-custom">


                <a href="/my-account/"> Đăng Nhập</a><span> | </span>

                <a href="/register/"> Đăng Ký</a>

      </div>
<?php } else { ?>
<div class="menu-custom">

                <a href="/my-account/" title="THÔNG TIN TÀI KHOẢN">THÔNG TIN TÀI KHOẢN</a><span> | </span>

                <a href="/my-account/view-order/" title="ĐƠN HÀNG CỦA BẠN"> ĐƠN HÀNG CỦA BẠN</a><span> | </span>

                <a href="/my-account/edit-address/shipping/" title="ĐỊA CHỈ NHẬN HÀNG">ĐỊA CHỈ NHẬN HÀNG</a>

      </div>
<?php  } ?>
      <div class="cart-wrapper">

     

        <?php if (class_exists('WP_eCommerce') && etheme_get_option('just_catalog') != 1 && etheme_get_option('cart_widget')): ?>



          <a class="mobile-link" href="<?php echo wpsc_cart_item_url(); ?>">



          </a>cart

        

          <div id="top-cart" class="shopping-cart-wrapper">

            <?php get_template_part('wpsc-cart_widget'); ?>

          </div>

        <?php endif; ?>

        <?php if (class_exists('Woocommerce') && etheme_get_option('just_catalog') != 1 && etheme_get_option('cart_widget')): ?>

          <?php global $woocommerce ?>

          <a class="mobile-link" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"></a>

          <div id="top-cart" class="shopping-cart-wrapper widget_shopping_cart">

            <?php $cart_widget = new Etheme_WooCommerce_Widget_Cart();

              $cart_widget->widget(); ?>

          </div>

        <?php endif; ?>

      </div>

      <div class="clear"></div>

      <!--<div class="menu_above">

        <div class="home active">

          <a href="/"><span class="icon i-home">&nbsp;<span class="s-visuallyhidden">Trang chủ</span></span></a>

        </div>

      </div>-->

      <div class="clear"></div>
      <?php $logoimg = etheme_get_option('logo'); ?>
      <style>.logo h1 a {
              display: block;
                background: url('<?php echo $logoimg; ?>') no-repeat;
                background-size: 200px auto;
                width: 280px;
                height: 100px;
                text-indent: -99999px;
                margin-top: -1px;}
      </style>
        <div class="logo">
        <?php if ($logoimg): ?>

         <h1><a href="<?php echo home_url(); ?>">Website bán hàng hiệu hàng đầu tại Việt Nam</a> </h1> 

        <?php else: ?>

          <a href="<?php echo home_url(); ?>" class="logo-text"><?php bloginfo('name'); ?></a>

        <?php endif; ?>



      </div>
    <div style="clear: both;"></div>
    </header>

    <?php
    wp_nav_menu(
    array('theme_location' => 'top',
    'name' => 'top',
    'container' => 'nav', 
    'container_id' => 'main-nav', 'menu_id' => 'top',
    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    ))
    ?>

  </div>

  <div class="containerInner clearfix">
  


