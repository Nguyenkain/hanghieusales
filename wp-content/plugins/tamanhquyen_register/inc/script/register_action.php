<?php
function mq_create_user()
    {
        $sex = $_POST['sex'];
        $regis_email = $_POST['regis_email'];
        $data_users = str_replace('\\','',$_POST['data_user']);
        $data = json_decode($data_users);
        $email = esc_html($data->regis_useremail);
        $username = esc_html($data->regis_username);
        $password = esc_html($data->regis_password);
        $re_password = esc_html($data->re_regis_password);
        $date_birth= esc_html($data->regis_date_birth);
        $month_birth = esc_html($data->regis_month_birth);
        $year_birth = esc_html($data->regis_year_birth);
        $firstname = esc_html($data->re_regis_firstname);
        $lastname = esc_html($data->re_regis_name);
        // VALIDATE FORM
        $reg_messages_error = '';
        if($email == '')
        {
            $reg_messages_error .= '<p class="err">Email của bạn không được để trống</p>';
        }
        elseif(is_email( $email ) == false)
        {
            $reg_messages_error .= '<p class="err">Địa chỉ email không hợp lệ</p>';
        }
        elseif($username == '')
        {
            $reg_messages_error .= '<p class="err">Tên đăng nhập không được để trống</p>';
        }
        elseif($password == '')
        {
            $reg_messages_error .= '<p class="err">Mật khẩu không được để trống</p>';
        }
        elseif(strlen($password) < 6)
        {
            $reg_messages_error .= '<p class="err">Mật khẩu phải có từ 7 - 32</p>';
        }
        elseif(strlen($password) > 32)
        {
            $reg_messages_error .= '<p class="err">Độ dài mật khẩu không phù hợp</p>';
        }
        elseif($re_password == '')
        {
            $reg_messages_error .= '<p class="err">Vui lòng nhập lại mật khẩu</p>';
        }
        elseif($re_password != $password)
        {
            $reg_messages_error .= '<p class="err">Mật khẩu nhập lại không đúng</p>';
        }
        else
        {
            // BẮT ĐẦU TẠO THÀNH VIÊN
            if(!empty($firstname) || !empty($lastname))
            {
                $display_name = $firstname.' '.$lastname;
            }
            $userdata = array(
            'user_login'=>$username,
            'user_email'=>$email,
            'first_name'=>$firstname,
            'last_name'=>$lastname,
            'display_name'=>$display_name,
            'user_pass'=>$password
            );
            $user_id = wp_insert_user( $userdata );
            if(!is_wp_error($user_id))
            {
                $birth = $date_birth.'/'.$month_birth.'/'.$year_birth;
                add_user_meta( $user_id,'sex',$sex);
                add_user_meta( $user_id,'date_of_birth',$birth);
                add_user_meta( $user_id,'regis_email',$regis_email);
                echo '1';
            }
            else
            {
                echo '2';
            }
        }
        if($reg_messages_error != '')
        {
            echo $reg_messages_error;
        }
        die();
    }
add_action('wp_ajax_nopriv_mq_create_user','mq_create_user');
