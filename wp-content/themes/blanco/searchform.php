<?php
  /**
   * The template for displaying search forms in Blanco
   *
   */
?>

<?php if (class_exists('Woocommerce')) : ?>

  <fieldset class="ui-searchInput">
    <form action="<?php echo home_url('/'); ?>" id="searchform" method="get">
      <input class="ui-inputText ui-inputFit-r lfloat sel-search-input" type="text" value="<?php if (get_search_query() == '') {
        _e('', ETHEME_DOMAIN);
      } else {
        the_search_query();
      } ?>" name="s" id="s" onblur="if(this.value=='')this.value='<?php _e(' ', ETHEME_DOMAIN); ?>'"
             onfocus="if(this.value=='<?php _e(' ', ETHEME_DOMAIN); ?>')this.value=''"/>
      <!--<input type="submit" class="button add_to_cart_button product_type_simple" id="searchsubmit" value="<?php /*_e('Go', 'woocommerce'); */ ?>" /> -->
      <button class="ui-search ui-button ui-buttonCta ui-buttonFit-l lfloat sel-search-button" type="submit">
        <span class="icon i-invertedSearchLoupe"></span>
        <span class="hdSearchButton"><?php _e('Go', 'woocommerce'); ?></span>
      </button>
      <input type="hidden" name="post_type" value="product"/>
    </form>
  </fieldset>
<?php else: ?>
  <form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
    <input type="text" class="field" name="s" id="s"
           placeholder="<?php _e(' ', ETHEME_DOMAIN); ?>"/>
    <button type="submit" class="button"><span><?php esc_attr_e('Go', ETHEME_DOMAIN); ?></span></button>
  </form>
<?php endif ?>
