$(document).ready(function(){
	$('#top-slider').bxSlider({
		controls:false,
		auto:true,
		speed:2000,
		//pager:false
	});
	$('.product-categories li.cat-parent').after().click(function(){
		$(this).toggleClass('open')
	});
	$('.product-categories li.current-cat').addClass('open');
	$('.items-slider').bxSlider({
		auto:true,
		pager:false,
		nextText:'<i class="fa fa-angle-right"></i>',
		prevText:'<i class="fa fa-angle-left"></i>',
	});
	var owl = $("#item-carousel");
	owl.owlCarousel({
	      items : 4,
	      navigation:true,
	      navigationText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
	      pagination:false,
	      scrollPerPage:true,
	      lazyLoad:true,
	      slideSpeed:500,
	      paginationSpeed:1000,
	      autoPlay:true
	  });
	$('.stars a').each(function(){
		$(this).html('<i class="fa fa-star-o"></i>');
	});
	$('.mini-cart').hover(function(){
		$('.mini-cart-product-list').removeClass('hide');
	},function(){
		$('.mini-cart-product-list').addClass('hide');
	});
	$('.qty_1').click(function(){
		var val = $('#qty').val();
		val2 = parseInt(val)+1;
		$('#qty').val(val2);
		return false;
	});
	$('.qty-1').click(function(){
		var val = $('#qty').val();
		val2 = parseInt(val)-1;
		if(val2 < 0)
		{
			val2 = 0;
		}
		$('#qty').val(val2);
		return false;
	});
	/*
	// Ajax đặt hàng
	$('.btn-dathang-ngay').click(function(){
		$('#pop-checkuot').fadeIn();
		$('#box-response').html('<div class="loading"><i class="fa fa-spinner fa-pulse fa-3x"></i></div>');
		var id_product = $(this).attr('data-id');
		var qty = $('#qty').val();
		$.post(mq_register_ajax.mq_ajax_url,{
			action:"checkout_popup",
			id_product:id_product,
			qty:qty
		}).done(function(response){
			$('#box-response').html(response);
		});
		return false;
	});
	*/
	$('#autocomplate').keyup(function(){
		$('.box-auto-response').html('<div class="loading-auto"><i class="fa fa-spinner fa-pulse"></i></div>');
		$('.box-auto-response').fadeIn();
		var q = $(this).val();
		if(q.length != 0)
		{
			$.post(mq_register_ajax.mq_ajax_url,{
			action:"ajax_search",
			cat:$('#category').val(),
			q:q
		}).done(function(response){
			$('.box-auto-response').html(response);
		});
		}
		else
		{
			$('.box-auto-response').hide();
		}
	});
	// Sản phẩm hay mua cùng
	function set_gia()
	{
		var total_price = 0;
		$('.item-muacung').removeClass('active');
		$('.check_mua:checked').each(function(){
			var price = $(this).parent().find('.price').text();
			$(this).parent().addClass('active');
			price = get_price(price);
			total_price = total_price+price;
		});
		total_price = formatCurrency(total_price);
		$('#total-mua').text(total_price+' VNĐ');
	}
	set_gia();
	var count_muacung = 0;
	$('.item-muacung').each(function(){
		count_muacung++;
	});
	$('#so-muacung').text(count_muacung);
	$('.check-for').click(function(){
		set_gia();
	});
	function get_price(price)
	{
		price = parseNumberFormat(price);
		price = parseInt(price);
		return price;
	}
	function formatCurrency(num) {
	    num = num.toString().replace(/\$|\,/g, '');
	    if (isNaN(num)) num = "0";
	    sign = (num == (num = Math.abs(num)));
	    num = Math.floor(num * 100 + 0.50000000001);
	    num = Math.floor(num / 100).toString();
	    for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
	        num = num.substring(0, num.length - (4 * i + 3)) + '.' + num.substring(num.length - (4 * i + 3));
	    return (((sign) ? '' : '-') + num);
	}
	 function parseNumberFormat(input) {
            return input.replace(".", "").replace(".", "").replace(".", "").replace(".", "");
        }
    /*
    function set_ajax_stack()
    {
    	var ajax_stack = new Array();
    	var id_main = $(this).attr('data-id-main');
    	var ajax_stack[0] = {id:id_main,active:false}
    	var i = 0;
    	$('.check_mua:checked').each(function(){
    		var id = $(this).attr(id_product);
    		i++;
    		ajax_stack[i] = {id:id,active:false}
    	});
    	return ajax_stack;
    }
    */
    $('#btn-all-to-cart').click(function(){
    	var id = '';
    	$(this).text('<i class="fa fa-spinner fa-pulse"></i> Đang thêm vào giỏ hàng');
    	$('.check-for').each(function(){
    		id += ','+$(this).attr('data-product-id');
    	});
    	$.post(mq_register_ajax.mq_ajax_url,{
    		action:"ajax_add_all_cart",
    		id:id
    	}).done(function(response){
    		$('.content-btn-cart').html(response)
    	});
    	return false;
    });
    $('#main-menu>li').each(function(){
    	var so_chau = $(this).find('ul').length;
    	if(so_chau > 0)
    	{
    		$(this).find('a:first').append('<i class="fa fa-caret-right"></i>');
    	}
    });
    $('#main-menu>li>ul>li').each(function(){
    	var so_chau2 = $(this).find('ul').length;
    	if(so_chau2 > 0)
    	{
    		$(this).addClass('parent');
    	}
    });
});