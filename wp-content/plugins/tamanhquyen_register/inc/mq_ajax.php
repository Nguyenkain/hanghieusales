<?php
// ########################################################### AJAX 
function mq_update_registerform()
{
    $css = $_POST['css'];
    $setting = $_POST['set'];
    $setting = str_replace('\\','',$setting);
    $title = $_POST['title'];
    $intro_form = $_POST['form_intro'];
    $link_face = $_POST['face_link'];
    update_option('mq_register_form_setting',$setting);
    update_option('mq_register_form_title',$title);
    update_option('mq_register_form_css',$css);
    update_option('mq_register_form_intro',$intro_form);
    update_option('mq_register_facelink',$intro_form);
    echo '<div id="message" class="updated below-h2"><p>This is plugin save.</p></div>';
    die();
}
function mq_create_user_function()
{
    echo '<div id="message" class="updated below-h2"><p>This is plugin save.</p></div>';
    die("");
}

if ( is_admin() ) {
    add_action( 'wp_ajax_update_registerform', 'mq_update_registerform' );
    // Add other back-end action hooks here
} 
else 
{
    add_action( 'wp_ajax_create_user_mq', 'mq_create_user_function' );
}
// END AJAX #########################################################