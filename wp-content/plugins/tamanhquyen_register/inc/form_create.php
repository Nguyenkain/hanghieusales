<?php
 function mq_create_form($data_form1=array('label'=>'','id'=>'','class'=>'','type'=>'','select_data'=>'','name'=>'','description'=>'','value'=>''))
{
    $set_option = json_decode(get_option('mq_register_form_setting'));
    $css_option = get_option('mq_register_form_css');
    foreach ($data_form1 as $data_form)
    {
        $select  = '';
        if($set_option->$data_form['name'] == '1')
        {
            $select = 'checked="checked"';
        }
        $form = '<div class="form-field">';
        if($data_form['type'] == 'textarea' && $data_form['name'] == 'mq_register_css')
        {
            $form .= '<label for="'.$data_form['id'].'">'.$data_form['label'].'</label>';
            $form .= '<textarea name="'.$data_form['name'].'" id="'.$data_form['id'].'" rows="5">'.$css_option.'</textarea>';
        }
        elseif($data_form['type'] == 'select')
        {
            $form .= '<label for="'.$data_form['id'].'">'.$data_form['label'].'</label>';
            $form .= '<select name="'.$data_form['name'].'" id="'.$data_form['id'].'" class="'.$data_form['class'].'">';
            $form .= $data_form['select_data'];
            $form .= '</select>';
        }
        elseif($data_form['type'] == 'checkbox')
        {
            $form .= '<input '.$select.' value="0" style="float:left;width:10px;" type="'.$data_form['type'].'" name="'.$data_form['name'].'" class="'.$data_form['class'].'" id="'.$data_form['id'].'" />';
            $form .= '<span>'.$data_form['label'].'</span>';
        }
        else
        {
            $form .= '<label for="'.$data_form['id'].'">'.$data_form['label'].'</label>';
            $form .= '<input value="'.$data_form['value'].'" type="'.$data_form['type'].'" name="'.$data_form['name'].'" class="'.$data_form['class'].'" id="'.$data_form['id'].'" />';
        }
        if($data_form['description'] != '')
        {
            $form .= '<p>'.$data_form['description'].'</p>';
        }
        $form .='</div>';
        echo $form;
    }
}