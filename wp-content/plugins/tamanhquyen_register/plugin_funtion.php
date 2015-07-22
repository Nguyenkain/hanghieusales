<?php
/**
 * Plugin Name: Custom Register Form Plugin
 * Plugin URI: http://tamanhquyen.com/register-form-for-wordpress.html
 * Description: Create Custom Register Form Frontend Page
 * Version: 1.0
 * Author: TA MANH QUYEN
 * Author URI: http://tamanhquyen.com
 */
 global $wp_version;
if(version_compare($wp_version,'3.6.1','<'))
 {
    exit('This is plugin requice Wordpress Version 3.6 on highter. Please update now!');
 }
register_activation_hook(__FILE__,'mq_register_setting');
register_deactivation_hook(__FILE__,'mq_delete_setting');
function enque_register()
{
	wp_register_script('mq_register_ajax',plugins_url('inc/js/init.js',__FILE__),array('jquery'),true);
	wp_localize_script('mq_register_ajax','mq_register_ajax',array('mq_ajax_url' => admin_url( 'admin-ajax.php' )));
	wp_enqueue_script('mq_register_ajax');
}
add_action('wp_enqueue_scripts','enque_register');
function mq_registerform_menu()
{
 add_menu_page('Register Form Setting','Register Form','update_plugins','register-form-setting','mq_registerform_set','',1);
}
add_action('admin_menu','mq_registerform_menu');
function mq_register_setting()
{
add_option('mq_register_form_title','','255','yes');
add_option('mq_register_form_setting','','255','yes');
add_option('mq_register_form_css','','255','yes');
add_option('mq_register_form_intro','','255','yes');
add_option('mq_register_facelink','','255','yes');
}
function mq_delete_setting()
{
delete_option('mq_register_form_setting');
delete_option('mq_register_form_title');
delete_option('mq_register_form_css');
delete_option('mq_register_facelink');
delete_option('mq_register_form_intro');
remove_shortcode('mq_register');
}
include_once('inc/mq_shortcode.php');
include_once('inc/mq_ajax.php');
include_once('inc/form_setting.php');
include_once('inc/form_create.php');
include_once('inc/script/register_action.php');