<?php

$set_option = json_decode(get_option('mq_register_form_setting'));

$form_name = get_option('mq_register_form_title');

?>

<link rel="stylesheet" type="text/css" href="<?php echo plugins_url( 'css/mq_myplugin_style.css', __FILE__ ); ?>" />
<?php $css = get_option('mq_register_form_css'); if($css != '') { echo $css; } ?>

<div class="main_regis_form">

    <div class="cl-left">

        <h3 class="title-regis"><?php echo $form_name; ?></h3>

            <p class="title-face">Bạn đã có tài khoản Facebook</p>

            <a href="<?php echo get_option('mq_register_facelink'); ?>" title="Login Width Facebook"><img class="facebook-img" src="<?php echo plugins_url('images/facebook_login_button.png',__FILE__); ?>" /></a>

            <div style="clear: both;"></div>

            <div class="alert-mq"></div>

        <div class="main_form">

            <p class="intro-regis-text"><?php echo get_option('form_intro'); ?></p>

            <div class="form-field2">

                <label>Địa chỉ Email * :</label>

                <input type="text" name="regis_useremail" value="" id="regis_useremail" class="data_regis input" />
            </div>

            <div class="form-field2">

                <label>Tên đăng nhập * :</label>

                <input type="text" name="regis_username" value="" id="regis_username" class="data_regis input" />

                <p class="intro-input">Đây là tên đăng nhập của bạn</p>

            </div>

            <div class="form-field2">

                <label>Mật khẩu * :</label>

                <input type="password" name="regis_password" value="" id="regis_password" class="data_regis input" />

            </div>

            <div class="form-field2">

                <label>Nhập lại mật khẩu * :</label>

                <input type="password" name="re_regis_password" value="" id="re_regis_password" class="data_regis input" />

            </div>

            <h3 class="heading-form">Thông tin khác</h3>

            <div class="form-field2">

                <label>Giới tính :</label>

                <input type="radio" value="1" checked="checked" name="regis_sex" id="regis_sex" class="mq-gt"/><span>Nữ</span>

                <input type="radio" value="0" name="regis_sex" id="regis_sex" class="mq-gt"/><span>Nam</span>

            </div>

            <?php if($set_option->mq_register_birday == 1){ ?>

            <div class="form-field2" style="margin-top: 30px;">

                <label>Ngày sinh :</label>

                <p class="left-input bird_date"><input type="text" value="" class="data_regis" name="regis_date_birth" id="regis_date_birth" /><span>Ngày</span></p>

                <p class="left-input bird_date"><input type="text" value="" class="data_regis" name="regis_month_birth" id="regis_month_birth" /><span>Tháng</span></p>

                <p class="left-input bird_date"><input type="text" value="" class="data_regis" name="regis_year_birth" id="regis_year_birth" /><span>Năm</span></p>

                <div style="clear: both;height:0px;margin-top:-10px;"></div>

                

            </div>

            <?php } ?>

            <?php if($set_option->mq_register_firstname == 1){ ?>

            <div class="form-field2">

                <label>Tên :</label>

                <input type="text" name="re_regis_name" value="" id="re_regis_name" class="data_regis input" />

            </div>

            <?php } ?>

            <?php if($set_option->mq_register_lastname == 1){ ?>

            <div class="form-field2">

                <label>Họ :</label>

                <input type="text" name="re_regis_firstname" value="" id="re_regis_firstname" class="data_regis input" />

            </div>

            <?php } ?>

            <div class="form-field2">

                <label>Mục bắt buộc * :</label>

                <p><input type="checkbox" value="1" checked="checked" name="inbox_email" id="mq_regis_email" /><span>Đăng ký bản tin qua email</span></p>

            </div>

            <div class="loading" style="display:none;padding-left:30px;height:24px;width:250;background: url('<?php echo plugins_url('images/ajax-loader.gif',__FILE__); ?>') no-repeat;">Đang đăng kí</div>

            <a href="javascript://" class="btn-regis">Gửi</a>

        </div>

    </div>

    <div class="cl-right"></div>

    <div style="clear: both;"></div>

</div>