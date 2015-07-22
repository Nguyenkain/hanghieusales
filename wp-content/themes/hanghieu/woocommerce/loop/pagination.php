<?php
/**
 * Pagination - Show numbered pagination for catalog pages.
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $wp_query;

if ( $wp_query->max_num_pages <= 1 ) {
	return;
}
?>
<noscript>
<nav class="woocommerce-pagination">
	<?php
		echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
			'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
			'format'       => '',
			'add_args'     => '',
			'current'      => max( 1, get_query_var( 'paged' ) ),
			'total'        => $wp_query->max_num_pages,
			'prev_text'    => '&larr;',
			'next_text'    => '&rarr;',
			'type'         => 'list',
			'end_size'     => 3,
			'mid_size'     => 3
		) ) );
	?>
</nav>
</noscript>
<nav class="load-ajax hide"></nav>
<script type="text/javascript">
	$(document).ready(function(){
		$('.load-ajax').removeClass('hide');
		$('.load-ajax').html('<a href="javascript://" title="Xem thêm sản phẩm">Xem thêm</a>');
		$('.load-ajax a').click(function(){
			$('.load-ajax a').html('<i class="fa fa-spinner fa-pulse"></i> Đang tải dữ liệu</span>');
			var offset = get_offset();
			$.post(mq_register_ajax.mq_ajax_url,{
				action:"load_more_product",
				offset:offset,
				per_page:12,
				category_id:<?php echo get_queried_object()->term_id; ?>
			}).done(function(response){
				$('.load-ajax a').html('Xem thêm');
				if(response == '')
				{
					$('.load-ajax').html('<span>Sản phẩm đã hết!</span>');
				}
				else
				{
					$('.main-grid').append(response);
				}
			});
		});
		function get_offset()
		{
			var count = 0;
			$('.items-category').each(function(){
					count++;
			});
			return count;
		}
	});
</script>
<style type="text/css">
	.load-ajax
	{
		display: block;
		width: 250px;
		border:1px solid #e74c3c;
		padding:10px 15px;
		text-align: center;
		text-transform: uppercase;
		color:#e74c3c;
		margin:0 auto;
	}
	.load-ajax a
	{
		color:#e74c3c;
		display: block;
	}
	.loading
	{
		text-transform: capitalize;
		font-weight: 12px;
	}
</style>
