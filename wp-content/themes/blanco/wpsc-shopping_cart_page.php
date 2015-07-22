<?php
global $wpsc_cart, $wpdb, $wpsc_checkout, $wpsc_gateway, $wpsc_coupons;
$wpsc_checkout = new wpsc_checkout();
$wpsc_gateway = new wpsc_gateways();
$alt = 0;
if(isset($_SESSION['coupon_numbers']))
   $wpsc_coupons = new wpsc_coupons($_SESSION['coupon_numbers']);

if(wpsc_cart_item_count() < 1) :
   _e('Oops, there is nothing in your cart.', ETHEME_DOMAIN) . "<a href=".get_option("product_list_url").">" . __('Please visit our shop', ETHEME_DOMAIN) . "</a>";
   return;
endif;
?>


<script type="text/javascript">
    function qtyDown(id){
    var qty_el = jQuery('#wpsc_quantity_update_' + id);
    var qty = parseInt(qty_el.val(), 10)
        if( qty == 2) {
            jQuery('.quantity_box_button_down' + id).css({
                'visibility' : 'hidden'
            });
        }
        if( !isNaN( qty ) && qty > 0 ){
            qty -= 1;
            qty_el.val(qty);
        }         
        return false;
    }
    
    function qtyUp(id){
    var qty_el = jQuery('#wpsc_quantity_update_' + id);
    var qty = parseInt(qty_el.val(), 10)
        if( !isNaN( qty )) {
            qty += 1;
            qty_el.val(qty);
        }
        jQuery('.quantity_box_button_down' + id).css({
            'visibility' : 'visible'
        });
        return false;
    }

</script> 

<div id="checkout-slider-mask">
<div id="checkout-slider">
        <div id="shopping-cart">
                
            <h3><?php _e('Please review your order', ETHEME_DOMAIN); ?></h3>
            <table class="checkout_cart data-table">
               <tr class="header">
                  <th class="cart_del_column"></th>
                  <th><?php _e('Product', ETHEME_DOMAIN); ?></th>
                  <th class="a-center"><?php _e('Quantity', ETHEME_DOMAIN); ?></th>
                  <th class="cart_del_column"><?php _e('Price', ETHEME_DOMAIN); ?></th>
                  <th><?php _e('Total', ETHEME_DOMAIN); ?></th>
                    <th class="cart_del_column">&nbsp;</th>
               </tr>
               <?php while (wpsc_have_cart_items()) : wpsc_the_cart_item(); ?>
                  <?php
                   $alt++;
                   if ($alt %2 == 1)
                     $alt_class = 'alt';
                   else
                     $alt_class = '';
                   ?>
                  <?php  //this displays the confirm your order html ?>
            
                  <tr class="product_row product_row_<?php echo wpsc_the_cart_item_key(); ?> <?php echo $alt_class;?>">
            
                     <td class="firstcol cart_del_column wpsc_product_image wpsc_product_image_<?php echo wpsc_the_cart_item_key(); ?>" style="width: 75px;">
                     <?php if('' != wpsc_cart_item_image()): ?>
                        <a href="<?php echo wpsc_cart_item_url();?>"><img src="<?php echo wpsc_cart_item_image(65,65); ?>" alt="<?php echo wpsc_cart_item_name(); ?>" title="<?php echo wpsc_cart_item_name(); ?>" class="product_image" /></a>
                     <?php else:
                     /* I dont think this gets used anymore,, but left in for backwards compatibility */
                     ?>
                        <div class="item_no_image">
                           <a href="<?php echo wpsc_the_product_permalink(); ?>">
                           <span><?php _e('No Image',ETHEME_DOMAIN); ?></span>
            
                           </a>
                        </div>
                     <?php endif; ?>
                     </td>
            
                     <td class="wpsc_product_name wpsc_product_name_<?php echo wpsc_the_cart_item_key(); ?>">
                        <a href="<?php echo wpsc_cart_item_url();?>"><?php echo wpsc_cart_item_name(); ?></a>
                     </td>
                    <?php $rand = rand(10,10000); ?>
                     <td class="wpsc_product_quantity wpsc_product_quantity_<?php echo wpsc_the_cart_item_key(); ?>">
                        <form action="<?php echo get_option('shopping_cart_url'); ?>" method="post" class="adjustform qty">
                            <div class="qty-block">
                                <div class="clear"></div>
                                <input type="button" class="quantity_box_button_down quantity_box_button_down<?php echo $rand; ?>" value="up" onclick="qtyDown('<?php echo $rand;?>')" />
                                <input type="text" value="<?php echo wpsc_cart_item_quantity(); ?>" class="qty-input" id="wpsc_quantity_update_<?php echo $rand; ?>" name="quantity" size="2" value="1" />
                                <input type="button" class="quantity_box_button_up quantity_box_button_up<?php echo $rand; ?>" value="down" onclick="qtyUp('<?php echo $rand;?>')" />

                                
    							<input type="hidden" name="key" value="<?php echo wpsc_the_cart_item_key(); ?>"/>
    							<input type="hidden" name="wpsc_update_quantity" value="true" />                                            
                            </div>
                            <div class="clear"></div>
                            <input type="submit" value="<?php _e('Update', ETHEME_DOMAIN); ?>" class="update-btn" name="submit" />
                            
                            <script type="text/javascript">
                                
                                var qty_el = jQuery('#wpsc_quantity_update_<?php echo $rand; ?>');
                                var qty = parseInt(qty_el.val(), 10)
                            
                                if(qty < 2){
                                    jQuery('.quantity_box_button_down<?php echo $rand; ?>').css({
                                        'visibility' : 'hidden'
                                    });
                                }
                            </script>
  
                        </form>
                     </td>
            
                   
                        <td class="cart_del_column"><?php echo wpsc_cart_single_item_price(); ?></td>
                     <td class="wpsc_product_price wpsc_product_price_<?php echo wpsc_the_cart_item_key(); ?>"><span class="pricedisplay"><?php echo wpsc_cart_item_price(); ?></span></td>
            
                     <td class="cart_del_column a-right wpsc_product_remove wpsc_product_remove_<?php echo wpsc_the_cart_item_key(); ?>">
                        <form action="<?php echo get_option('shopping_cart_url'); ?>" method="post" class="adjustform remove">
                           <input type="hidden" name="quantity" value="0" />
                           <input type="hidden" name="key" value="<?php echo wpsc_the_cart_item_key(); ?>" />
                           <input type="hidden" name="wpsc_update_quantity" value="true" />
                           <input type="submit" class="delete-btn" value="<?php _e('Remove', ETHEME_DOMAIN); ?>" name="submit" />
                        </form>
                     </td>
                  </tr>
               <?php endwhile; ?>
               <?php //this HTML displays coupons if there are any active coupons to use ?>
            
               <?php
            
               if(wpsc_uses_coupons()): ?>
            
                  <?php if(wpsc_coupons_error()): ?>
                     <tr class="wpsc_coupon_row wpsc_coupon_error_row"><td colspan="6"><?php _e('Coupon is not valid.', ETHEME_DOMAIN); ?></td></tr>
                  <?php endif; ?>
                  <tr class="wpsc_coupon_row">
                     <td colspan="2"><?php _e('Enter coupon code', ETHEME_DOMAIN); ?> :</td>
                     <td  colspan="4" class="coupon_code">
                        <form  method="post" action="<?php echo get_option('shopping_cart_url'); ?>">
                           <input type="text" name="coupon_num" id="coupon_num" value="<?php echo $wpsc_cart->coupons_name; ?>" />
                           <input type="submit" value="<?php _e('Update', ETHEME_DOMAIN) ?>" />
                        </form>
                     </td>
                  </tr>
                  <tr class="wpsc_total_before_shipping">
            	      <td colspan="3"><?php _e('Cost before shipping:',ETHEME_DOMAIN); ?></td>
            	      <td colspan="3" class="wpsc_total_amount_before_shipping"><?php echo wpsc_cart_total_widget(false,false,false);?></td>
                  </tr>
               <?php endif; ?>
               </table>
               <!-- cart contents table close -->
              <?php if(wpsc_uses_shipping()): ?>
            	   <p class="wpsc_cost_before"></p>
               <?php endif; ?>
               <?php  //this HTML dispalys the calculate your order HTML   ?>
            
               <?php if(wpsc_has_category_and_country_conflict()): ?>
                  <p class='validation-error'><?php echo $_SESSION['categoryAndShippingCountryConflict']; ?></p>
                  <?php unset($_SESSION['categoryAndShippingCountryConflict']);
               endif;
            
               if(isset($_SESSION['WpscGatewayErrorMessage']) && $_SESSION['WpscGatewayErrorMessage'] != '') :?>
                  <p class="validation-error"><?php echo $_SESSION['WpscGatewayErrorMessage']; ?></p>
               <?php
               endif;
               ?>
               <div style="background: white; padding: 10px;">
               <?php if(wpsc_uses_shipping()) : ?>
                  <h2><?php _e('Calculate Shipping Price', ETHEME_DOMAIN); ?></h2>
                  <table class="productcart">
                     <tr class="wpsc_shipping_info">
                        <td colspan="5">
                           <?php _e('Please choose a country below to calculate your shipping costs', ETHEME_DOMAIN); ?>
                        </td>
                     </tr>
            
                     <?php if (!wpsc_have_shipping_quote()) : // No valid shipping quotes ?>
                        <?php if (wpsc_have_valid_shipping_zipcode()) : ?>
                              <tr class='wpsc_update_location'>
                                 <td colspan='5' class='shipping_error' >
                                    <?php _e('Please provide a Zipcode and click Calculate in order to continue.', ETHEME_DOMAIN); ?>
                                 </td>
                              </tr>
                        <?php else: ?>
                           <tr class='wpsc_update_location_error'>
                              <td colspan='5' class='shipping_error' >
                                 <?php _e('Sorry, online ordering is unavailable to this destination and/or weight. Please double check your destination details.', ETHEME_DOMAIN); ?>
                              </td>
                           </tr>
                        <?php endif; ?>
                     <?php endif; ?>
                     <tr class='wpsc_change_country'>
                        <td colspan='5'>
                           <form name='change_country' id='change_country' action='' method='post'>
                              <?php echo wpsc_shipping_country_list();?>
                              <input type='hidden' name='wpsc_update_location' value='true' />
                              <input type='submit' name='wpsc_submit_zipcode' value='Calculate' />
                           </form>
                        </td>
                     </tr>
            
                     <?php if (wpsc_have_morethanone_shipping_quote()) :?>
                        <?php while (wpsc_have_shipping_methods()) : wpsc_the_shipping_method(); ?>
                              <?php    if (!wpsc_have_shipping_quotes()) { continue; } // Don't display shipping method if it doesn't have at least one quote ?>
                              <tr class='wpsc_shipping_header'><td class='shipping_header' colspan='5'><?php echo wpsc_shipping_method_name().__(' - Choose a Shipping Rate', ETHEME_DOMAIN); ?> </td></tr>
                              <?php while (wpsc_have_shipping_quotes()) : wpsc_the_shipping_quote();  ?>
                                 <tr class='<?php echo wpsc_shipping_quote_html_id(); ?>'>
                                    <td class='wpsc_shipping_quote_name wpsc_shipping_quote_name_<?php echo wpsc_shipping_quote_html_id(); ?>' colspan='3'>
                                       <label for='<?php echo wpsc_shipping_quote_html_id(); ?>'><?php echo wpsc_shipping_quote_name(); ?></label>
                                    </td>
                                    <td class='wpsc_shipping_quote_price wpsc_shipping_quote_price_<?php echo wpsc_shipping_quote_html_id(); ?>' style='text-align:center;'>
                                       <label for='<?php echo wpsc_shipping_quote_html_id(); ?>'><?php echo wpsc_shipping_quote_value(); ?></label>
                                    </td>
                                    <td class='wpsc_shipping_quote_radio wpsc_shipping_quote_radio_<?php echo wpsc_shipping_quote_html_id(); ?>' style='text-align:center;'>
                                       <?php if(wpsc_have_morethanone_shipping_methods_and_quotes()): ?>
                                          <input type='radio' id='<?php echo wpsc_shipping_quote_html_id(); ?>' <?php echo wpsc_shipping_quote_selected_state(); ?>  onclick='switchmethod("<?php echo wpsc_shipping_quote_name(); ?>", "<?php echo wpsc_shipping_method_internal_name(); ?>")' value='<?php echo wpsc_shipping_quote_value(true); ?>' name='shipping_method' />
                                       <?php else: ?>
                                          <input <?php echo wpsc_shipping_quote_selected_state(); ?> disabled='disabled' type='radio' id='<?php echo wpsc_shipping_quote_html_id(); ?>'  value='<?php echo wpsc_shipping_quote_value(true); ?>' name='shipping_method' />
                                             <?php wpsc_update_shipping_single_method(); ?>
                                       <?php endif; ?>
                                    </td>
                                 </tr>
                              <?php endwhile; ?>
                        <?php endwhile; ?>
                     <?php endif; ?>
            
                     <?php wpsc_update_shipping_multiple_methods(); ?>
            
            
                     <?php if (!wpsc_have_shipping_quote()) : // No valid shipping quotes ?>
                           </table>
                           </div>
            			</div>
                        <?php return; ?>
                     <?php endif; ?>
                  </table>
               <?php endif;  ?>
            
               <?php
                  $wpec_taxes_controller = new wpec_taxes_controller();
                  if($wpec_taxes_controller->wpec_taxes_isenabled()):
               ?>
                  <table class="productcart">
                     <tr class="total_price total_tax">
                        <td colspan="3">
                           <?php echo wpsc_display_tax_label(true); ?>
                        </td>
                        <td colspan="2">
                           <span id="checkout_tax" class="pricedisplay checkout-tax"><?php echo wpsc_cart_tax(); ?></span>
                        </td>
                     </tr>
                  </table>
               <?php endif; ?>
               <?php do_action('wpsc_before_form_of_shopping_cart'); ?>
               <table  class='wpsc_checkout_table table-4'>
                  <?php if(wpsc_uses_shipping()) : ?>
            	      <tr>
            	         <td class='wpsc_total_price_and_shipping'colspan='2'>
            	            <h4><?php _e('Review and purchase',ETHEME_DOMAIN); ?></h4>
            	         </td>
            	      </tr>
            	
            	      <tr class="total_price total_shipping">
            	         <td class='wpsc_totals'>
            	            <?php _e('Total Shipping', ETHEME_DOMAIN); ?>:
            	         </td>
            	         <td class='wpsc_totals'>
            	            <span id="checkout_shipping" class="pricedisplay checkout-shipping"><?php echo wpsc_cart_shipping(); ?></span>
            	         </td>
            	      </tr>
                  <?php endif; ?>
            
                 <?php if(wpsc_uses_coupons() && (wpsc_coupon_amount(false) > 0)): ?>
                  <tr class="total_price">
                     <td class='wpsc_totals'>
                        <?php _e('Discount', ETHEME_DOMAIN); ?>:
                     </td>
                     <td class='wpsc_totals'>
                        <span id="coupons_amount" class="pricedisplay"><?php echo wpsc_coupon_amount(); ?></span>
                      </td>
                     </tr>
                 <?php endif ?>
            
            
            
               <tr class='total_price'>
                  <td class='wpsc_totals'>
                  <?php _e('Total Price', ETHEME_DOMAIN); ?>:
                  </td>
                  <td class='wpsc_totals'>
                     <span id='checkout_total' class="pricedisplay checkout-total"><?php echo wpsc_cart_total(); ?></span>
                  </td>
               </tr>
               </table>
                <div class="clear"></div>
                <a href="#checkout-step-2" class="button active" id="checkout-next"><span><?php _e( 'Proceed to Checkout', ETHEME_DOMAIN ); ?></span></a>
                <div class="clear"></div>
                </div>
        </div><!-- end #shopping-cart -->

<div id="shopping-cart-form">
   <?php do_action('wpsc_before_shipping_of_shopping_cart'); ?>

    <a class="back-to checkout-back" href="javascript: history.go(-1)"><?php _e('Return to Previous Page', ETHEME_DOMAIN); ?></a>
   
   <div id="wpsc_shopping_cart_container">

                 
	<?php if(!empty($_SESSION['wpsc_checkout_user_error_messages'])): ?>
		<p class="validation-error">
		<?php
		foreach($_SESSION['wpsc_checkout_user_error_messages'] as $user_error )
		echo $user_error."<br />\n";
		
		$_SESSION['wpsc_checkout_user_error_messages'] = array();
		?>
	<?php endif; ?>

	<?php if ( wpsc_show_user_login_form() && !is_user_logged_in() ): ?>
			<p><?php _e('You must sign in or register with us to continue with your purchase', ETHEME_DOMAIN);?></p>
			<div class="wpsc_registration_form">
				
				<fieldset class='wpsc_registration_form'>
					<h2><?php _e( 'Sign in', ETHEME_DOMAIN ); ?></h2>
					<?php
					$args = array(
						'remember' => false,
                    	'redirect' => home_url( $_SERVER['REQUEST_URI'] )
					);
					wp_login_form( $args );
					?>
					<div class="wpsc_signup_text"><?php _e('If you have bought from us before please sign in here to purchase', ETHEME_DOMAIN);?></div>
				</fieldset>
			</div>
	<?php endif; ?>	
	<form class='wpsc_checkout_forms' action='<?php echo get_option('shopping_cart_url'); ?>' method='post' enctype="multipart/form-data">
				
      <?php
      /**
       * Both the registration forms and the checkout details forms must be in the same form element as they are submitted together, you cannot have two form elements submit together without the use of JavaScript.
      */
      ?>

    <?php if(wpsc_show_user_login_form()):
          global $current_user;
          get_currentuserinfo();   ?>

		<div class="wpsc_registration_form">
			
	        <fieldset class='wpsc_registration_form wpsc_right_registration'>
	        	<h2><?php _e('Join up now', ETHEME_DOMAIN);?></h2>
	      
				<label><?php _e('Username', ETHEME_DOMAIN); ?>:</label>
				<input type="text" name="log" id="log" value="" size="20"/><br/>
				
				<label><?php _e('Password', ETHEME_DOMAIN); ?>:</label>
				<input type="password" name="pwd" id="pwd" value="" size="20" /><br />
				
				<label><?php _e('E-mail', ETHEME_DOMAIN); ?>:</label>
	            <input type="text" name="user_email" id="user_email" value="<?php echo attribute_escape(stripslashes($user_email)); ?>" size="20" /><br />
	            
	            <div class="wpsc_signup_text"><?php _e('Signing up is free and easy! please fill out your details your registration will happen automatically as you checkout. Don\'t forget to use your details to login with next time!', ETHEME_DOMAIN);?></div>
	        </fieldset>
	        
        </div>
        <div class="clear"></div>
   <?php endif; // closes user login form

      if(!empty($_SESSION['wpsc_checkout_misc_error_messages'])): ?>
         <div class='login_error'>
            <?php foreach((array)$_SESSION['wpsc_checkout_misc_error_messages'] as $user_error ){?>
               <p class='validation-error'><?php echo $user_error; ?></p>
               <?php } ?>
         </div>

      <?php
      endif;
       $_SESSION['wpsc_checkout_misc_error_messages'] = array(); ?>
<?php ob_start(); ?>
   <table class='wpsc_checkout_table table-1'>
      <?php $i = 0;
      while (wpsc_have_checkout_items()) : wpsc_the_checkout_item(); ?>

        <?php if(wpsc_checkout_form_is_header() == true){
               $i++;
               //display headers for form fields ?>
               <?php if($i > 1):?>
                  </table>
                  <table class='wpsc_checkout_table table-<?php echo $i; ?>'>
               <?php endif; ?>

               <tr <?php echo wpsc_the_checkout_item_error_class();?>>
                  <td <?php wpsc_the_checkout_details_class(); ?> colspan='2'>
                     <h4><?php echo wpsc_checkout_form_name();?></h4>
                  </td>
               </tr>
               <?php if(wpsc_is_shipping_details()):?>
               <tr class='same_as_shipping_row'>
                  <td colspan ='2'>
                  <?php $checked = '';
                  if(isset($_POST['shippingSameBilling']) && $_POST['shippingSameBilling'])
                  	$_SESSION['shippingSameBilling'] = true;
                  elseif(isset($_POST['submit']) && !isset($_POST['shippingSameBilling']))
                  	$_SESSION['shippingSameBilling'] = false;

                  	if( isset( $_SESSION['shippingSameBilling'] ) && $_SESSION['shippingSameBilling'] == 'true' )
                  		$checked = 'checked="checked"';
                   ?>
					<label for='shippingSameBilling'><?php _e('Same as billing address:',ETHEME_DOMAIN); ?></label>
					<input type='checkbox' value='true' name='shippingSameBilling' id='shippingSameBilling' <?php echo $checked; ?> />
					<br/><span id="shippingsameasbillingmessage"><?php _e('Your order will be shipped to the billing address', ETHEME_DOMAIN); ?></span>
                  </td>
               </tr>
               <?php endif;

            // Not a header so start display form fields
            }elseif(wpsc_disregard_shipping_state_fields()){
            ?>
               <tr class='wpsc_hidden'>
                  <td class='<?php echo wpsc_checkout_form_element_id(); ?>'>
                     <label for='<?php echo wpsc_checkout_form_element_id(); ?>'>
                     <?php echo wpsc_checkout_form_name();?>
                     </label>
                  </td>
                  <td>
                     <?php echo wpsc_checkout_form_field();?>
                      <?php if(wpsc_the_checkout_item_error() != ''): ?>
                             <p class='validation-error'><?php echo wpsc_the_checkout_item_error(); ?></p>
                     <?php endif; ?>
                  </td>
               </tr>
            <?php
            }elseif(wpsc_disregard_billing_state_fields()){
            ?>
               <tr class='wpsc_hidden'>
                  <td class='<?php echo wpsc_checkout_form_element_id(); ?>'>
                     <label for='<?php echo wpsc_checkout_form_element_id(); ?>'>
                     <?php echo wpsc_checkout_form_name();?>
                     </label>
                  </td>
                  <td>
                     <?php echo wpsc_checkout_form_field();?>
                      <?php if(wpsc_the_checkout_item_error() != ''): ?>
                             <p class='validation-error'><?php echo wpsc_the_checkout_item_error(); ?></p>
                     <?php endif; ?>
                  </td>
               </tr>
            <?php
            }elseif( $wpsc_checkout->checkout_item->unique_name == 'billingemail'){ ?>
               <?php $email_markup =
               "<div class='wpsc_email_address'>
                  <img src='https://secure.gravatar.com/avatar/empty?s=60&amp;d=mm' id='wpsc_checkout_gravatar' />
                    <label class='wpsc_email_address' for='" . wpsc_checkout_form_element_id() . "'>
                     " . __('Enter your email address', ETHEME_DOMAIN) . "
                     </label>
                  " . wpsc_checkout_form_field();
                  
                   if(wpsc_the_checkout_item_error() != '')
                      $email_markup .= "<p class='validation-error'>" . wpsc_the_checkout_item_error() . "</p>";
               $email_markup .= "</div>";
             }else{ ?>
			<tr>
               <td class='<?php echo wpsc_checkout_form_element_id(); ?>'>
                  <label for='<?php echo wpsc_checkout_form_element_id(); ?>'>
                  <?php echo wpsc_checkout_form_name();?>
                  </label>
               </td>
               <td>
                  <?php echo wpsc_checkout_form_field();?>
                   <?php if(wpsc_the_checkout_item_error() != ''): ?>
                          <p class='validation-error'><?php echo wpsc_the_checkout_item_error(); ?></p>
                  <?php endif; ?>
               </td>
            </tr>

         <?php }//endif; ?>

      <?php endwhile; ?>
 
<?php 
	$buffer_contents = ob_get_contents();
	ob_end_clean();
	if(isset($email_markup))
		echo $email_markup;
	echo $buffer_contents;
?>

      <?php if (wpsc_show_find_us()) : ?>
      <tr>
         <td><label for='how_find_us'><?php _e('How did you find us' , ETHEME_DOMAIN); ?></label></td>
         <td>
            <select name='how_find_us'>
               <option value='Word of Mouth'><?php _e('Word of mouth' , ETHEME_DOMAIN); ?></option>
               <option value='Advertisement'><?php _e('Advertising' , ETHEME_DOMAIN); ?></option>
               <option value='Internet'><?php _e('Internet' , ETHEME_DOMAIN); ?></option>
               <option value='Customer'><?php _e('Existing Customer' , ETHEME_DOMAIN); ?></option>
            </select>
         </td>
      </tr>
      <?php endif; ?>
      <?php do_action('wpsc_inside_shopping_cart'); ?>

      <?php  //this HTML displays activated payment gateways   ?>
      <?php if(wpsc_gateway_count() > 1): // if we have more than one gateway enabled, offer the user a choice ?>
         <tr>
         <td colspan='2' class='wpsc_gateway_container'>
            <h3><?php _e('Payment Type', ETHEME_DOMAIN);?></h3>
            <?php while (wpsc_have_gateways()) : wpsc_the_gateway(); ?>
               <div class="custom_gateway">
                     <label><input type="radio" value="<?php echo wpsc_gateway_internal_name();?>" <?php echo wpsc_gateway_is_checked(); ?> name="custom_gateway" class="custom_gateway"/><?php echo wpsc_gateway_name(); ?> 
                     	<?php if( wpsc_show_gateway_image() ): ?>
                     	<img src="<?php echo wpsc_gateway_image_url(); ?>" alt="<?php echo wpsc_gateway_name(); ?>" style="position:relative; top:5px;" />
                     	<?php endif; ?>
                     </label>

                  <?php if(wpsc_gateway_form_fields()): ?>
                     <table class='wpsc_checkout_table <?php echo wpsc_gateway_form_field_style();?>'>
                        <?php echo wpsc_gateway_form_fields();?>
                     </table>
                  <?php endif; ?>
               </div>
            <?php endwhile; ?>
            </td></tr>
         <?php else: // otherwise, there is no choice, stick in a hidden form ?>
            <tr><td colspan="2" class='wpsc_gateway_container'>
            <?php while (wpsc_have_gateways()) : wpsc_the_gateway(); ?>
               <input name='custom_gateway' value='<?php echo wpsc_gateway_internal_name();?>' type='hidden' />

                  <?php if(wpsc_gateway_form_fields()): ?>
                     <table class='wpsc_checkout_table <?php echo wpsc_gateway_form_field_style();?>'>
                        <?php echo wpsc_gateway_form_fields();?>
                     </table>
                  <?php endif; ?>
            <?php endwhile; ?>
         </td>
         </tr>
         <?php endif; ?>

      <?php if(wpsc_has_tnc()) : ?>
         <tr>
            <td colspan='2'>
                <label for="agree"><input id="agree" type='checkbox' value='yes' name='agree' /> <?php printf(__("I agree to the <a class='thickbox' target='_blank' href='%s' class='termsandconds'>Terms and Conditions</a>", "wpsc"), site_url("?termsandconds=true&amp;width=360&amp;height=400")); ?> <span class="asterix">*</span></label>
               </td>
         </tr>
      <?php endif; ?>
      </table>

<!-- div for make purchase button -->
      <div class='wpsc_make_purchase'>
         <span>
            <?php if(!wpsc_has_tnc()) : ?>
               <input type='hidden' value='yes' name='agree' />
            <?php endif; ?>
               <input type='hidden' value='submit_checkout' name='wpsc_action' />
               <input type='submit' value='<?php _e('Purchase', ETHEME_DOMAIN);?>' name='submit' class='make_purchase wpsc_buy_button big active fl-r' />
         </span>
         <a href="#checkout-step-1" class="button" id="checkout-back"><span><?php _e( 'Back', ETHEME_DOMAIN ); ?></span></a>
      </div>

<div class='clear'></div>
</form>
</div>
</div><!-- end #shopping-cart-form -->
</div><!--close checkout_slider-->
</div><!-- end #checkout-slider-mask -->
<?php
do_action('wpsc_bottom_of_shopping_cart');

?>
<?php if(isset($_POST['wpsc_action'])) : ?>
<script type="text/javascript">
	jQuery(document).ready(function($) {
	    var loc = window.location.href;
	    var id = loc.split("#");
	    var error = $('#checkout-progress').css("display");
	    if(error != "none"){
			$("#shopping-cart-form").fadeIn();
			var checkoutWidth = $("#shopping-cart").width() + 30;
			$("#checkout-bar-in").animate({width:'+=50%'});
			$("#checkout-slider").animate({marginLeft:'-=' + checkoutWidth}, 800, function() {
				$('body,html').animate({
					scrollTop: 0
				}, 800);
			});
			return false;	
	    }
	});
</script>
<?php endif; ?>