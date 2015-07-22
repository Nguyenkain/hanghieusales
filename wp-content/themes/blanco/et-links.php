
<div class="links">
    <ul>
        <?php if ( is_user_logged_in() ) : ?>
<!--            <div class="lang-top">
                <a href="#"><img src="/wp-content/plugins/codestyling-localization/images/flags/vn.gif" /></a>
                <a href="#"><img src="/wp-content/plugins/codestyling-localization/images/flags/gb.gif" /></a>
            </div>-->
            <div class="ship-top"><span>LIÊN LẠC - HOTLINE: 090 268 9449 – 08.6 2912528 - GIAO HÀNG TOÀN QUỐC MIỄN PHÍ – ĐỔI TRẢ HÀNG 15 NGÀY</span></div>

           <!-- <li class="no"><a class="black" href="<?php echo wp_logout_url(home_url()); ?>"><?php _e( 'Logout', ETHEME_DOMAIN ); ?></a></li>-->

            <?php if(class_exists('WP_eCommerce')): ?>

                <!--<li><a href="<?php echo get_option('user_account_url'); ?>"><?php _e( 'Your Account', ETHEME_DOMAIN ); ?></a></li>-->

            <?php endif; ?>
            <?php if(class_exists('Woocommerce')): ?>

                <!--<li><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><?php _e( 'Your Account', ETHEME_DOMAIN ); ?></a></li>-->

            <?php endif; ?>
        <?php else : ?>
       
            <div class="ship-top"><span> LIÊN LẠC - HOTLINE: 090 268 9449 – 08.6 2912528 - GIAO HÀNG TOÀN QUỐC MIỄN PHÍ – ĐỔI TRẢ HÀNG 15 NGÀY</span></div>
            
            <?php if(!empty($reg_id)): ?>

                <!--<li><a class="btn-login" href="<?php echo $reg_url; ?>"><?php _e( 'Register', ETHEME_DOMAIN ); ?></a></li>-->

            <?php endif; ?>
            <?php if(class_exists('WP_eCommerce')): ?>

                <!--<li class="no"><a class="btn-register" href="<?php echo get_option('user_account_url'); ?>"><?php _e( 'Sign In', ETHEME_DOMAIN ); ?></a></li>-->
            
            <?php endif; ?>
            <?php if(class_exists('Woocommerce')): ?>

                <!--<li class="no"><a class="btn-register" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><?php _e( 'Sign In', ETHEME_DOMAIN ); ?></a></li>-->

            <?php endif; ?>
        <?php endif; ?>
        <?php $args = array(
                        
                        'container'=> '',
                        'items_wrap' => '%3$s',
                        'items_wrap'      => '%3$s',
                        'theme_location'=>'top-page'
             );wp_nav_menu($args); ?>
    </ul>
</div>

        
    