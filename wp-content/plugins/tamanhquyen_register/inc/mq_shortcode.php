<?php
// SHORTCODE CREATE
function mq_shortcode($atts)
{
   $formname = $atts['form_name'];
   if($formname == 'Register')
   {
        include_once('frontend_form.php');
   }
}
add_shortcode('mq_register','mq_shortcode');