<?php
/**
 * Single Product tabs
 *
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

	<div class="row detail-full">
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<?php foreach ( $tabs as $key => $tab ) : ?>
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="heading-<?php echo $key ?>">
						<h4 class="panel-title">
							<a class="toogle-btn <?php echo $key == 'description' ? "" : "collapsed" ?>" role="button" data-toggle="collapse" data-parent="#accordion"
							   href="#tab-<?php echo $key ?>" aria-expanded="<?php echo $key == 'description' ? "true" : "false" ?>" aria-controls="tab-<?php echo $key ?>">
								<?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?>
							</a>
						</h4>
					</div>
					<div id="tab-<?php echo $key ?>" class="panel-collapse collapse <?php echo $key == 'description' ? "in" : "" ?>" role="tabpanel"
					     aria-labelledby="heading-<?php echo $key ?>">
						<div class="panel-body">
							<?php call_user_func( $tab['callback'], $key, $tab ) ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

<?php endif; ?>
