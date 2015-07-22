<?php
  /**
   * Single Product title
   *
   * @author    WooThemes
   * @package  WooCommerce/Templates
   * @version     1.6.4
   */

  if (!defined('ABSPATH')) exit; // Exit if accessed directly

?>
<?php
  $product_brand = etheme_get_option('_etheme_custom_brand');
?>
<?php if ($product_brand) { ?>
  <h1><?php echo $product_brand; ?></h1>
<?php } else { ?>
  <h1><?php echo "No Brand" ?></h1>
<?php } ?>
<h2><?php the_title(); ?></h2>
