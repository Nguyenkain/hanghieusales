<?php
/**
 * Checkout login form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( is_user_logged_in() || 'no' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) {
	return;
}
wc_print_notice( $info_message, 'notice' );
?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

<div class="login-section section" id="customer_login">
<div class="container">
<div class="row">
<?php endif; ?>

		<!-- <h3><?php _e( 'Login', 'woocommerce' ); ?></h3> -->
		<div class="col-md-5">
			<form method="post" action="<?php echo esc_url( $get_checkout_url ); ?>" class="login form">
				<h4 class="title-form">Đăng nhập mua hàng</h4>
				<?php do_action( 'woocommerce_login_form_start' ); ?>
				<div class="form-group">
				    <label for="username"><?php _e( 'Username or email address', 'woocommerce' ); ?> <span class="required">*</span></label>
				    <input type="text" name="username" id="username" class=" input-text form-control" placeholder="Enter email" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>">
				 </div>
				 <div class="form-group">
				    <label for="password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input class="input-text form-control" type="password" name="password" id="password" />
				 </div>
				<?php do_action( 'woocommerce_login_form' ); ?>

				<p class="form-row">
					<?php wp_nonce_field( 'woocommerce-login' ); ?>
					<input type="submit" class="button btn btn-black" name="login" value="<?php _e( 'Login', 'woocommerce' ); ?>" />
					<label for="rememberme" class="inline">
						<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember me', 'woocommerce' ); ?>
					</label>
				</p>
				<p class="lost_password">
					<a href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
				</p>

				<?php do_action( 'woocommerce_login_form_end' ); ?>

			</form>
		</div>
		<div class="col-md-2"></div>
<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

	<div class="col-md-5">
		<form method="post" class="register form">
			<h4 class="title-form"><?php _e( 'Register', 'woocommerce' ); ?></h4>
			<?php do_action( 'woocommerce_register_form_start' ); ?>
			<div class="fb-login">
				<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/fb-login.png" alt=""></a>
			</div>
			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
				<div class="form-group">
				   <label for="reg_username"><?php _e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="text" class="input-text form-control" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
				 </div>
			<?php endif; ?>
			<div class="form-group">
			   <label for="reg_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input type="email" class="input-text form-control" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
			 </div>
			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
				<div class="form-group">
			   		<label for="reg_password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="password" class="input-text  form-control" name="password" id="reg_password" />
			 	</div>

			<?php endif; ?>

			<!-- Spam Trap -->
			<div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php _e( 'Anti-spam', 'woocommerce' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>

			<?php do_action( 'woocommerce_register_form' ); ?>
			<?php do_action( 'register_form' ); ?>

			<p class="form-row">
				<?php wp_nonce_field( 'woocommerce-register' ); ?>
				<input type="submit" class="button btn btn-black" name="register" value="<?php _e( 'Register', 'woocommerce' ); ?>" />
			</p>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>

	</div>

</div>
<?php endif; ?>
</div>
</div>
<!-- /.container -->