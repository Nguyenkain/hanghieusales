<?php

 function mq_registerform_set()

 {

 ?>

 <link rel="stylesheet" type="text/css" href="<?php echo plugins_url( 'css/mq_myplugin_style.css', __FILE__ ); ?>" />

 <div class="wrap">

    <h2>Register Form Setting</h2>

    <hr />

    <style>

    .left-mq

    {

        float:left;

        width:60%;

    }

    .right-mq

    {

        background:#fff;

        border:1px solid #ccc;

        width:38%;

        float:right;

    }

    </style>

    <div class="left-mq form-wrap">

        <div class="alert-mq"></div>

        <?php

            $title_option = get_option('mq_register_form_title');

            $form_intro = get_option('mq_register_form_intro');

            $data_form = array(

                array(

                'label'=>'Register Form Name',

                'type'=>'text',

                'description'=>'Show Form name in FrontEnd Page',

                'id'=>'mq_register_label',

                'class'=>'mq_register_label',

                'name'=>'mq_register_label',

                'value'=>$title_option

                ),

                array(

                'label'=>'Form intro',

                'type'=>'text',

                'description'=>'Show intro form in your sites',

                'id'=>'mq_register_intro_form',

                'class'=>'mq_register_intro_form',

                'name'=>'mq_register_intro_form',

                'value'=>$form_intro

                ),

                array(

                'label'=>'Facebook Login Link',

                'type'=>'text',

                'description'=>'Facebook login link',

                'id'=>'mq_register_facebook_login_link',

                'class'=>'mq_register_facebook_login_link',

                'name'=>'mq_register_facebook_login_link',

                'value'=>$form_intro

                ),

                array(

                'label'=>'Custom css',

                'type'=>'textarea',

                'description'=>'Using Custom css',

                'id'=>'mq_register_css',

                'class'=>'mq_register_css',

                'name'=>'mq_register_css'

                ),

                array(

                'label'=>'Using Birthday field',

                'type'=>'checkbox',

                'id'=>'mq_register_birday',

                'class'=>'mq_register_birday checkbox',

                'name'=>'mq_register_birday'

                ),

                /*

                array(

                'label'=>'Using NiceName field',

                'type'=>'checkbox',

                'id'=>'mq_register_nicename',

                'class'=>'mq_register_nicename checkbox',

                'name'=>'mq_register_nicename'

                ),

                */

                array(

                'label'=>'Using Email field',

                'type'=>'checkbox',

                'id'=>'mq_register_email',

                'class'=>'mq_register_email checkbox',

                'name'=>'mq_register_email'

                ),

                array(

                'label'=>'Using FirstName field',

                'type'=>'checkbox',

                'id'=>'mq_register_firstname',

                'class'=>'mq_register_firstname checkbox',

                'name'=>'mq_register_firstname'

                ),

                array(

                'label'=>'Using Lastname field',

                'type'=>'checkbox',

                'id'=>'mq_register_lastname',

                'class'=>'mq_register_lastname checkbox',

                'name'=>'mq_register_lastname'

                ),

                array(

                'type'=>'submit',

                'id'=>'mq_register_submit',

                'class'=>'button button-primary button-large',

                'name'=>'mq_register_submit',

                'value'=>'Save'

                )

            );

            mq_create_form($data_form);

        ?>

        <div id="loaderImage"></div>

    </div>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="<?php echo plugins_url( 'js/canvas.js', __FILE__ ); ?>"></script>

    <div class="right-mq">

        <div class="form-field">

                <label for="mq_register_label">Short Code</label>

                <p class="short_code"><?php echo '[mq_register form_name="Register"]'; ?></p>

            </div>

        </div>

    <div class="clear"></div>

 </div>

<script>
$(document).ready(function(){
    $('.checkbox').each(function(){

        if($(this).is(':checked'))

        {

            $(this).val(1);

        }

        else

        {

            $(this).val(0);

        }

    });

    $('.checkbox').change(function(){

        if($(this).is(':checked'))

        {

            $(this).val(1);

        }

        else

        {

            $(this).val(0);

        }

    });

    $('#mq_register_submit').on('click',function(){

        $('#loaderImage').fadeIn();

        var set = '';

        var title = $('#mq_register_label').val();

        var css = $('#mq_register_css').val();

        $('.checkbox').each(function(){

           set += ',"'+$(this).attr('name')+'":"'+$(this).val()+'"';

        });

        set = set.substr(1);

        set = '{'+set+'}';

        $.post

        (

                ajaxurl, 

                {

                    'action': 'update_registerform',

                    'css':css,

                    'set':set,

                    'title':title,

                    'form_intro':$('#mq_register_intro_form').val(),

                    'face_link':$('#mq_register_facebook_login_link').val()

                }, 

        function(response)

        {

                    $('#loaderImage').fadeOut();

                    $('html,body').animate({scrollTop:0},500);

                    $('.alert-mq').html(response);

        });

    });

});

</script>

<script>

var cSpeed=12;

    var cWidth=220;

    var cHeight=20;

    var cTotalFrames=37;

    var cFrameWidth=220;

    var cImageSrc='<?php echo plugins_url( 'js/images/sprites.gif', __FILE__ ); ?>';

    var cImageTimeout=false;

    var cIndex=0;

    var cXpos=0;

    var cPreloaderTimeout=false;

    var SECONDS_BETWEEN_FRAMES=0;

    function startAnimation(){

    	document.getElementById('loaderImage').style.backgroundImage='url('+cImageSrc+')';

    	document.getElementById('loaderImage').style.width=cWidth+'px';

    	document.getElementById('loaderImage').style.height=cHeight+'px';

    	//FPS = Math.round(100/(maxSpeed+2-speed));

    	FPS = Math.round(100/cSpeed);

    	SECONDS_BETWEEN_FRAMES = 1 / FPS;

    	cPreloaderTimeout=setTimeout('continueAnimation()', SECONDS_BETWEEN_FRAMES/1000);

    }

    function continueAnimation(){

    	cXpos += cFrameWidth;

    	//increase the index so we know which frame of our animation we are currently on

    	cIndex += 1;

    	//if our cIndex is higher than our total number of frames, we're at the end and should restart

    	if (cIndex >= cTotalFrames) {

    		cXpos =0;

    		cIndex=0;

    	}

    	if(document.getElementById('loaderImage'))

    		document.getElementById('loaderImage').style.backgroundPosition=(-cXpos)+'px 0';

    	cPreloaderTimeout=setTimeout('continueAnimation()', SECONDS_BETWEEN_FRAMES*1000);

    }

    function stopAnimation(){//stops animation

    	clearTimeout(cPreloaderTimeout);

    	cPreloaderTimeout=false;

    }

    function imageLoader(s, fun)//Pre-loads the sprites image

    {

    	clearTimeout(cImageTimeout);

    	cImageTimeout=0;

    	genImage = new Image();

    	genImage.onload=function (){cImageTimeout=setTimeout(fun, 0)};

    	genImage.onerror=new Function('alert(\'Could not load the image\')');

    	genImage.src=s;

    }

    //The following code starts the animation

    new imageLoader(cImageSrc, 'startAnimation()');

</script>

 <?php

 }

 ?>