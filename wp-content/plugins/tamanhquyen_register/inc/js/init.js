var $ = jQuery;
$(document).ready(function(){
    $('#mq_regis_email').change(function(){
        if($(this).val() == 0)
        {
            $(this).val(1);
        }
        else
        {
            $(this).val(0);
        }
    });
    $('.btn-regis').click(function(){
        var data_user = '';
        $('.data_regis').each(function(){
            data_user += ',"'+$(this).attr('name')+'":"'+$(this).val()+'"';
        });
        data_user = data_user.substr(1);
       $('.loading').fadeIn();
        $.post(mq_register_ajax.mq_ajax_url,
            {
                'action': 'mq_create_user',
                'data_user':'{'+data_user+'}',
                'sex':$('.mq-gt:checked').val(),
                'regis_email':$('#mq_regis_email').val()
            }
        , 
        function(response)
        {
            if(response == '1')
            {
                var create_success = '<p style="text-align:center;font-size:18px;">Bạn đã tạo tài khoản thành công vui lòng nhấn vào quay trở lại trang đăng nhập để đăng nhập tài khoản của bạn</p>';
                $('.main_regis_form').html(create_success);
            }
            else if(response == '2')
            {
                $('.loading').fadeOut();
                $('html,body').animate({scrollTop:0},500);
                $('.alert-mq').html('<p class="err">Tài khoản đã được đăng kí</p>');
            }
            else
            {
                $('.loading').fadeOut();
                $('html,body').animate({scrollTop:0},500);
                $('.alert-mq').html(response);
            }
        });
    });
});