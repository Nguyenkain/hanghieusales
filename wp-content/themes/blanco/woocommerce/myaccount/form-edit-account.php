<?php
/**
 * Edit account form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;
?>

<?php wc_print_notices(); ?>

<form action="" method="post">

	<p class="form-row form-row-first">
		<label for="account_first_name"><?php _e( 'Tên riêng', ETHEME_DOMAIN ); ?> <span class="required">*</span></label>
		<input type="text" class="input-text" name="account_first_name" id="account_first_name" value="<?php esc_attr_e( $user->first_name ); ?>" />
	</p>
	<p class="form-row form-row-last">
		<label for="account_last_name"><?php _e( 'Họ ', ETHEME_DOMAIN ); ?> <span class="required">*</span></label>
		<input type="text" class="input-text" name="account_last_name" id="account_last_name" value="<?php esc_attr_e( $user->last_name ); ?>" />
	</p>
	<p class="form-row form-row-wide">
		<label for="account_email"><?php _e( 'Địa chỉ email ', ETHEME_DOMAIN ); ?> <span class="required">*</span></label>
		<input type="email" class="input-text" name="account_email" id="account_email" value="<?php esc_attr_e( $user->user_email ); ?>" />
	</p>
	<p class="form-row form-row-first">
		<label for="password_1"><?php _e( 'Mật khẩu', ETHEME_DOMAIN ); ?></label>
		<input type="password" class="input-text" name="password_1" id="password_1" />
		<div class="clear"></div>
	</p>
	<p class="form-row form-row-last">
		<label for="password_2"><?php _e( 'Nhập lại mật khẩu mới', ETHEME_DOMAIN ); ?></label>
		<input type="password" class="input-text" name="password_2" id="password_2" />
	</p>
	<div class="clear"></div>

	<p><input type="submit" class="button" name="save_account_details" value="<?php _e( 'Lưu thay đổi', ETHEME_DOMAIN ); ?>" /></p>

	<?php wp_nonce_field( 'save_account_details' ); ?>
	<input type="hidden" name="action" value="save_account_details" />
</form>