<?php
  /**
   * Template Name: Login Page
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
        <div class="col2-set" id="login_column">
          <div class="col-1">
            <?php echo do_shortcode('[woocommerce_my_account]'); ?>
          </div>
          <div class="col-2">
            <div class="heightTxt centerTxt">
              <p class="fsml txtColor mbs txtUpper">
                BẠN LÀ KHÁCH HÀNG MỚI VÀ CHƯA CÓ TÀI KHOẢN? </p>

              <div class="box mtl">
                <a class="ui-register ui-newButton ui-button txtUpper ui-buttonCta strong sel-new-account-create-button"
                   href="/register" title="Đăng ký">Đăng ký </a>
              </div>
            </div>
            <div class="facebook_container">
              <?php echo do_shortcode('[efl-login]'); ?>
            </div>
          </div>
        </div>
      <?php } ?>
    <?php endwhile; // end of the loop. ?>
  </div>
  <!-- #content -->
  <div class="clear"></div>
</section><!-- #container -->

<?php get_footer(); ?>
