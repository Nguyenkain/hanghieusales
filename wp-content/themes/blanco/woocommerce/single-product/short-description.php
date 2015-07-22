<?php
/**
 * Single product short description
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post;

if ( ! $post->post_excerpt ) return;
?>
	<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>

    <?php if ( etheme_get_custom_field('_etheme_size_guide') ) : ?>
        <div class="size_guide">
    	 <a rel="lightbox" href="<?php etheme_option('size_guide_img'); ?>"><?php _e('Sizing Guide', ETHEME_DOMAIN); ?></a>
        </div>
    <?php endif; ?>
    