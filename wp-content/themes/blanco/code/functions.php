<?php
register_nav_menu('top', 'Top Navigation');
if (!isset( $content_width )) $content_width = 940;
$just_catalog = etheme_get_option('just_catalog');
function remove_loop_button(){
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
    remove_action( 'woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30 );
    remove_action( 'woocommerce_grouped_add_to_cart', 'woocommerce_grouped_add_to_cart', 30 );
    remove_action( 'woocommerce_variable_add_to_cart', 'woocommerce_variable_add_to_cart', 30 );
    remove_action( 'woocommerce_external_add_to_cart', 'woocommerce_external_add_to_cart', 30 );
}
if($just_catalog == 1) {
    add_action('init','remove_loop_button');
}
function etheme_enqueue_styles() {
    $custom_css = etheme_get_option('custom_css');
    if ( !is_admin() ) {
        wp_enqueue_style("superfish",get_template_directory_uri().'/css/superfish.css');
        wp_enqueue_style("slider",get_template_directory_uri().'/css/slider.css');
        wp_enqueue_style("lightbox",get_template_directory_uri().'/css/flexslider.css');
        wp_enqueue_style("font-awesome",get_template_directory_uri().'/css/font-awesome.min.css');
        
        if($custom_css == 1) {
            wp_enqueue_style("custom",get_template_directory_uri().'/custom.css');  
        }
        
        $scriptDepends = array();
        
        if(class_exists('WooCommerce')) {
            $scriptDepends[] = 'wc-add-to-cart-variation';
        }
        
        wp_enqueue_script("jquery");
        wp_enqueue_script('jquery.easing', get_template_directory_uri().'/js/jquery.easing.1.3.min.js');
        wp_enqueue_script('cookie', get_template_directory_uri().'/js/cookie.js');
        wp_enqueue_script('hoverIntent', get_template_directory_uri().'/js/hoverIntent.js');
        wp_enqueue_script('jquery.slider', get_template_directory_uri().'/js/jquery.slider.js');
        wp_enqueue_script('efects', get_template_directory_uri().'/js/efects.js');
        wp_enqueue_script('modernizr.custom', get_template_directory_uri().'/js/modernizr.custom.js');
        wp_enqueue_script('masonry', get_template_directory_uri().'/js/jquery.masonry.min.js');
        wp_enqueue_script('flexslider', get_template_directory_uri().'/js/jquery.flexslider-min.js');
        wp_enqueue_script('superfish', get_template_directory_uri().'/js/superfish.js');
        wp_enqueue_script('tooltip', get_template_directory_uri().'/js/tooltip.js');
        wp_enqueue_script('tabs', get_template_directory_uri().'/js/tabs.js');
        wp_enqueue_script('etheme', get_template_directory_uri().'/js/script.js',$scriptDepends);
    
        // rewrite woo styles and scripts
        wp_dequeue_style('woocommerce_prettyPhoto_css');
        wp_enqueue_style('woocommerce_prettyPhoto_css', get_template_directory_uri().'/css/prettyPhoto.css');
        wp_dequeue_script('prettyPhoto' );
        wp_dequeue_script('prettyPhoto-init' );
        wp_enqueue_script('prettyPhoto', get_template_directory_uri().'/js/jquery.prettyPhoto.js',array(),false,true);
        wp_enqueue_script('prettyPhoto-init', get_template_directory_uri().'/js/prettyPhoto-init.js',array(),false,true);
    }
}
add_action( 'wp_enqueue_scripts', 'etheme_enqueue_styles' );
function jsString($str='') { 
    return trim(preg_replace("/('|\"|\r?\n)/", '', $str)); 
} 
function etheme_get_the_category_list($separator = '', $parents='', $post_id = false){
    global $wp_rewrite;
    $categories = get_the_category( $post_id );
    if ( !is_object_in_taxonomy( get_post_type( $post_id ), 'category' ) )
        return apply_filters( 'the_category', '', $separator, $parents );
    if ( empty( $categories ) )
        return apply_filters( 'the_category', __( 'Uncategorized' ), $separator, $parents );
    $rel = "";
    $thelist = '';
    if ( '' == $separator ) {
        $thelist .= '<ul class="post-categories">';
        foreach ( $categories as $category ) {
            $thelist .= "\n\t<li>";
            switch ( strtolower( $parents ) ) {
                case 'multiple':
                    if ( $category->parent )
                        $thelist .= get_category_parents( $category->parent, true, $separator );
                    $thelist .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>' . $category->name.'</a></li>';
                    break;
                case 'single':
                    $thelist .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>';
                    if ( $category->parent )
                        $thelist .= get_category_parents( $category->parent, false, $separator );
                    $thelist .= $category->name.'</a></li>';
                    break;
                case '':
                default:
                    $thelist .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>' . $category->name.'</a></li>';
            }
        }
        $thelist .= '</ul>';
    } else {
        $i = 0;
        foreach ( $categories as $category ) {
            if ( 0 < $i )
                $thelist .= $separator;
            switch ( strtolower( $parents ) ) {
                case 'multiple':
                    if ( $category->parent )
                        $thelist .= get_category_parents( $category->parent, true, $separator );
                    $thelist .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>' . $category->name.'</a>';
                    break;
                case 'single':
                    $thelist .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>';
                    if ( $category->parent )
                        $thelist .= get_category_parents( $category->parent, false, $separator );
                    $thelist .= "$category->name</a>";
                    break;
                case '':
                default:
                    $thelist .= '<a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>' . $category->name.'</a>';
            }
            ++$i;
        }
    }
    return apply_filters( 'the_category', $thelist, $separator, $parents );
}
/**
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 */
function etheme_page_menu_args( $args ) {
    $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'etheme_page_menu_args' );
/**
 * Sets the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * @return int
 */
function etheme_excerpt_length( $length ) {
    return 40;
}
add_filter( 'excerpt_length', 'etheme_excerpt_length' );
/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @return string "Continue Reading" link
 */
function etheme_continue_reading_link() {
    return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'etheme' ) . '</a>';
}
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and etheme_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @return string An ellipsis
 */
function etheme_auto_excerpt_more( $more ) {
    return __( '...', ETHEME_DOMAIN );
}
add_filter( 'excerpt_more', 'etheme_auto_excerpt_more' );
/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function etheme_custom_excerpt_more( $output ) {
    if ( has_excerpt() && ! is_attachment() ) {
        $output .= etheme_continue_reading_link();
    }
    return $output;
}
add_filter( 'get_the_excerpt', 'etheme_custom_excerpt_more' );
/**
 * Deprecated way to remove inline styles printed when the gallery shortcode is used.
 *
 * This function is no longer needed or used. Use the use_default_gallery_style
 * filter instead, as seen above.
 *
 *
 * @return string The gallery style filter, with the styles themselves removed.
 */
function etheme_remove_gallery_css( $css ) {
    return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
// Backwards compatibility with WordPress 3.0.
if ( version_compare( $GLOBALS['wp_version'], '3.1', '<' ) )
    add_filter( 'gallery_style', 'etheme_remove_gallery_css' );
if ( ! function_exists( 'etheme_comment' ) ) :
function etheme_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case '' :
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <div id="comment-<?php comment_ID(); ?>">
            <?php echo get_avatar( $comment, 55 ); ?>
            <div class="comment-meta">
                <h5 class="author"><?php echo get_comment_author_link() ?> -  <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></h5>  
                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'etheme' ); ?></em>   
                <?php endif; ?>
                <p class="date">
                    <?php
                        /* translators: 1: date, 2: time */
                        printf( __( '%1$s at %2$s', 'etheme' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'etheme' ), ' ' );
                    ?>
                </p>
            </div>
            <div class="comment-body"><?php comment_text(); ?></div>
            <div class="clear"></div>
<!-- .reply -->
        </div><!-- #comment-##  -->
    <?php
            break;
        case 'pingback'  :
        case 'trackback' :
    ?>
    <li class="post pingback">
        <p><?php _e( 'Pingback:', 'etheme' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'etheme' ), ' ' ); ?></p>
    <?php
            break;
    endswitch;
}
endif;
/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 *
 * To override this in a child theme, remove the filter and optionally add your own
 * function tied to the widgets_init action hook.
 *
 * This function uses a filter (show_recent_comments_widget_style) new in WordPress 3.1
 * to remove the default style. Using Twenty Ten 1.2 in WordPress 3.0 will show the styles,
 * but they won't have any effect on the widget in default Twenty Ten styling.
 *
 */
function etheme_remove_recent_comments_style() {
    add_filter( 'show_recent_comments_widget_style', '__return_false' );
}
add_action( 'widgets_init', 'etheme_remove_recent_comments_style' );
if ( ! function_exists( 'etheme_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 */
function etheme_posted_on() {
    printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', ETHEME_DOMAIN ),
        'meta-prep meta-prep-author',
        sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
            get_permalink(),
            esc_attr( get_the_time() ),
            get_the_date()
        ),
        sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
            get_author_posts_url( get_the_author_meta( 'ID' ) ),
            esc_attr( sprintf( __( 'View all posts by %s', ETHEME_DOMAIN ), get_the_author() ) ),
            get_the_author()
        )
    );
}
endif;
if ( ! function_exists( 'etheme_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 */
function etheme_posted_in() {
    // Retrieves tag list of current post, separated by commas.
    $tag_list = get_the_tag_list( '', ', ' );
    if ( $tag_list ) {
        $posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', ETHEME_DOMAIN );
    } elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
        $posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', ETHEME_DOMAIN );
    } else {
        $posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', ETHEME_DOMAIN );
    }
    // Prints the string, replacing the placeholders.
    printf(
        $posted_in,
        etheme_get_the_category_list( ', ' ),
        $tag_list,
        get_permalink(),
        the_title_attribute( 'echo=0' )
    );
}
endif;
function etheme_previous_post_link($format='&laquo; %link', $link='%title', $in_same_cat = false, $excluded_categories = '') {
    etheme_adjacent_post_link($format, $link, $in_same_cat, $excluded_categories, true);
}
function etheme_next_post_link($format='%link &raquo;', $link='%title', $in_same_cat = false, $excluded_categories = '') {
    etheme_adjacent_post_link($format, $link, $in_same_cat, $excluded_categories, false);
}
function etheme_adjacent_post_link($format, $link, $in_same_cat = false, $excluded_categories = '', $previous = true) {
    if ( $previous && is_attachment() )
        $post = & get_post($GLOBALS['post']->post_parent);
    else
        $post = get_adjacent_post($in_same_cat, $excluded_categories, $previous);
    if ( !$post )
        return;
    $title = $post->post_title;
    if ( empty($post->post_title) )
        $title = $previous ? __('Previous Post') : __('Next Post');
    $title = apply_filters('the_title', $title, $post->ID);
    $title = explode(" ",$title);
    $title = array_chunk($title,5); 
    $title = implode(" ",$title[0]).'...';
    
    $date = mysql2date(get_option('date_format'), $post->post_date);
    $rel = $previous ? 'prev' : 'next';
    $string = '<a href="'.get_permalink($post).'" rel="'.$rel.'">';
    $link = str_replace('%title', $title, $link);
    $link = str_replace('%date', $date, $link);
    $link = $string . $link . '</a>';
    $format = str_replace('%link', $link, $format);
    $adjacent = $previous ? 'previous' : 'next';
    echo apply_filters( "{$adjacent}_post_link", $format, $link );
}
function etheme_get_images($width = null, $height = null, $crop = true, $post_id = null ) {
    global $post;
    
    if (!$post_id) {
        $post_id = $post->ID;
    }   
    
    if ( has_post_thumbnail( $post_id ) ) {
        $attachment_id = get_post_thumbnail_id( $post_id );
    } 
    
    $args = array(
        'post_type' => 'attachment',
        'post_status' => null,
        'post_parent' => $post_id,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'posts_per_page' => 20,
        'exclude' => get_post_thumbnail_id( $post_id )
    );
    
    $attachments = get_posts($args);
    
    if (empty( $attachments) && empty($attachment_id))
        return;
        
    $image_urls = array();
        
    $image_urls[] = etheme_get_resized_url($attachment_id,$width, $height, $crop);
        
    foreach($attachments as $one) {
        $image_urls[] = etheme_get_resized_url($one->ID,$width, $height, $crop);
    }
    return apply_filters( 'blanco_attachment_image', $image_urls );
}
function etheme_get_image( $attachment_id = 0, $width = null, $height = null, $crop = true, $post_id = null ) {
    global $post;
    if (!$attachment_id) {
        if (!$post_id) {
            $post_id = $post->ID;
        }
        if ( has_post_thumbnail( $post_id ) ) {
            $attachment_id = get_post_thumbnail_id( $post_id );
        } 
        else {
            $attached_images = (array)get_posts( array(
                'post_type'   => 'attachment',
                'numberposts' => 1,
                'post_status' => null,
                'post_parent' => $post_id,
                'orderby'     => 'menu_order',
                'order'       => 'ASC'
            ) );
            if ( !empty( $attached_images ) )
                $attachment_id = $attached_images[0]->ID;
        }
    }
    
    if (!$attachment_id)
        return;
    if ( function_exists("gd_info") && (($width >= 10) && ($height >= 10)) && (($width <= 1024) && ($height <= 1024)) ) {
        $vt_image = vt_resize( $attachment_id, '', $width, $height, $crop );
        if ($vt_image) 
            $image_url = $vt_image['url'];
        else
            $image_url = false;
    }
    else {
        $full_image = wp_get_attachment_image_src( $attachment_id, 'full');
        if ($full_image) 
            $image_url = $full_image[0];
        else
            $image_url = false;
    }
    
    if( is_ssl() && !strstr(  $image_url, 'https' ) ) str_replace('http', 'https', $image_url);
    // @todo - put fallback 'No image' catcher here
    return apply_filters( 'blanco_product_image', $image_url );
}
function etheme_get_resized_url($id,$width, $height, $crop) {
    if ( function_exists("gd_info") && (($width >= 10) && ($height >= 10)) && (($width <= 1024) && ($height <= 1024)) ) {
        $vt_image = vt_resize( $id, '', $width, $height, $crop );
        if ($vt_image) 
            $image_url = $vt_image['url'];
        else
            $image_url = false;
    }
    else {
        $full_image = wp_get_attachment_image_src( $id, 'full');
        if (!empty($full_image[0]))
            $image_url = $full_image[0];
        else
            $image_url = false;
    }
    
    if( is_ssl() && !strstr(  $image_url, 'https' ) ) str_replace('http', 'https', $image_url);
    
    return $image_url;
}
if ( !function_exists('vt_resize') ) {
    function vt_resize( $attach_id = null, $img_url = null, $width, $height, $crop = false ) {
        // this is an attachment, so we have the ID
        if ( $attach_id ) {
        
            $image_src = wp_get_attachment_image_src( $attach_id, 'full' );
            $file_path = get_attached_file( $attach_id );
        // this is not an attachment, let's use the image url
        } else if ( $img_url ) {
            
            $file_path = parse_url( $img_url );
            $file_path = $_SERVER['DOCUMENT_ROOT'] . $file_path['path'];
            //$file_path = ltrim( $file_path['path'], '/' );
            //$file_path = rtrim( ABSPATH, '/' ).$file_path['path'];
            
            $orig_size = getimagesize( $file_path );
            
            $image_src[0] = $img_url;
            $image_src[1] = $orig_size[0];
            $image_src[2] = $orig_size[1];
        }
        
        $file_info = pathinfo( $file_path );
    
        // check if file exists
        $base_file = $file_info['dirname'].'/'.$file_info['filename'].'.'.$file_info['extension'];
        if ( !file_exists($base_file) )
            return;
        $extension = '.'. $file_info['extension'];
    
        // the image path without the extension
        $no_ext_path = $file_info['dirname'].'/'.$file_info['filename'];
        
        // checking if the file size is larger than the target size
        // if it is smaller or the same size, stop right here and return
        if ( $image_src[1] > $width || $image_src[2] > $height ) {
    
            if ( $crop == true ) {
            
                $cropped_img_path = $no_ext_path.'-'.$width.'x'.$height.$extension;
                
                // the file is larger, check if the resized version already exists (for $crop = true but will also work for $crop = false if the sizes match)
                if ( file_exists( $cropped_img_path ) ) {
        
                    $cropped_img_url = str_replace( basename( $image_src[0] ), basename( $cropped_img_path ), $image_src[0] );
                    
                    $vt_image = array (
                        'url' => $cropped_img_url,
                        'width' => $width,
                        'height' => $height
                    );
                    
                    return $vt_image;
                }
            }
            elseif ( $crop == false ) {
            
                // calculate the size proportionaly
                $proportional_size = wp_constrain_dimensions( $image_src[1], $image_src[2], $width, $height );
                $resized_img_path = $no_ext_path.'-'.$proportional_size[0].'x'.$proportional_size[1].$extension;            
    
                // checking if the file already exists
                if ( file_exists( $resized_img_path ) ) {
                
                    $resized_img_url = str_replace( basename( $image_src[0] ), basename( $resized_img_path ), $image_src[0] );
    
                    $vt_image = array (
                        'url' => $resized_img_url,
                        'width' => $proportional_size[0],
                        'height' => $proportional_size[1]
                    );
                    
                    return $vt_image;
                }
            }
    
            // check if image width is smaller than set width
            $img_size = getimagesize( $file_path );
            if ( $img_size[0] <= $width ) $width = $img_size[0];        
    
            // no cache files - let's finally resize it
            $new_img_path = image_resize( $file_path, $width, $height, $crop );
            $new_img_size = getimagesize( $new_img_path );
            $new_img = str_replace( basename( $image_src[0] ), basename( $new_img_path ), $image_src[0] );
    
            // resized output
            $vt_image = array (
                'url' => $new_img,
                'width' => $new_img_size[0],
                'height' => $new_img_size[1]
            );
            
            return $vt_image;
        }
    
        // default output - without resizing
        $vt_image = array (
            'url' => $image_src[0],
            'width' => $image_src[1],
            'height' => $image_src[2]
        );
        
        return $vt_image;
    }
}
if ( !function_exists('vt_resize2') ) {
    function vt_resize2( $img_name, $dir_url, $dir_path, $width, $height, $crop = false ) {
        
        $file_path = trailingslashit($dir_path).$img_name;
        
        $orig_size = getimagesize( $file_path );
        
        $image_src[0] = trailingslashit($dir_url).$img_name;
        $image_src[1] = $orig_size[0];
        $image_src[2] = $orig_size[1];
        
        $file_info = pathinfo( $file_path );
    
        // check if file exists
        $base_file = $file_info['dirname'].'/'.$file_info['filename'].'.'.$file_info['extension'];
        if ( !file_exists($base_file) )
            return;
         
        $extension = '.'. $file_info['extension'];
    
        // the image path without the extension
        $no_ext_path = $file_info['dirname'].'/'.$file_info['filename'];
        
        // checking if the file size is larger than the target size
        // if it is smaller or the same size, stop right here and return
        if ( $image_src[1] > $width || $image_src[2] > $height ) {
    
            if ( $crop == true ) {
            
                $cropped_img_path = $no_ext_path.'-'.$width.'x'.$height.$extension;
                
                // the file is larger, check if the resized version already exists (for $crop = true but will also work for $crop = false if the sizes match)
                if ( file_exists( $cropped_img_path ) ) {
        
                    $cropped_img_url = str_replace( basename( $image_src[0] ), basename( $cropped_img_path ), $image_src[0] );
                    
                    $vt_image = array (
                        'url' => $cropped_img_url,
                        'width' => $width,
                        'height' => $height
                    );
                    
                    return $vt_image;
                }
            }
            elseif ( $crop == false ) {
            
                // calculate the size proportionaly
                $proportional_size = wp_constrain_dimensions( $image_src[1], $image_src[2], $width, $height );
                $resized_img_path = $no_ext_path.'-'.$proportional_size[0].'x'.$proportional_size[1].$extension;            
    
                // checking if the file already exists
                if ( file_exists( $resized_img_path ) ) {
                
                    $resized_img_url = str_replace( basename( $image_src[0] ), basename( $resized_img_path ), $image_src[0] );
    
                    $vt_image = array (
                        'url' => $resized_img_url,
                        'width' => $proportional_size[0],
                        'height' => $proportional_size[1]
                    );
                    
                    return $vt_image;
                }
            }
    
            // check if image width is smaller than set width
            $img_size = getimagesize( $file_path );
            if ( $img_size[0] <= $width ) $width = $img_size[0];        
    
            // no cache files - let's finally resize it
            $new_img_path = image_resize( $file_path, $width, $height, $crop );
            $new_img_size = getimagesize( $new_img_path );
            $new_img = str_replace( basename( $image_src[0] ), basename( $new_img_path ), $image_src[0] );
    
            // resized output
            $vt_image = array (
                'url' => $new_img,
                'width' => $new_img_size[0],
                'height' => $new_img_size[1]
            );
            
            return $vt_image;
        }
    
        // default output - without resizing
        $vt_image = array (
            'url' => $image_src[0],
            'width' => $image_src[1],
            'height' => $image_src[2]
        );
        
        return $vt_image;
    }
}
/**
* Output breadcrumbs if configured
* @return None - outputs breadcrumb HTML
*/
function etheme_wpsc_output_breadcrumbs( $options = null ) {
    
    // Defaults
    $options = apply_filters( 'wpsc_output_breadcrumbs_options', $options );
    $options = wp_parse_args( (array)$options, array(
        'before-breadcrumbs' => '<div class="wpsc-breadcrumbs">',
        'after-breadcrumbs'  => '</div>',
        'before-crumb'       => '',
        'after-crumb'        => '',
        'crumb-separator'    => ' &raquo; ',
        'show_home_page'     => true,
        'show_products_page' => true,
        'echo'               => true
    ) );
    
    $output = '';
    $products_page_id = wpec_get_the_post_id_by_shortcode( '[productspage]' );
    $products_page = get_post( $products_page_id );
    if ( !wpsc_has_breadcrumbs() ) {
        return;
    }
    $filtered_products_page = array(
        'url'  => get_option( 'product_list_url' ),
        'name' => apply_filters ( 'the_title', $products_page->post_title )
    );
    $filtered_products_page = apply_filters( 'wpsc_change_pp_breadcrumb', $filtered_products_page );
    
    // Home Page Crumb
    // If home if the same as products page only show the products-page link and not the home link
    if ( get_option( 'page_on_front' ) != $products_page_id && $options['show_home_page'] ) {
        $output .= $options['before-crumb'];
        $output .= '<a class="wpsc-crumb" id="wpsc-crumb-home" href="' . get_option( 'home' ) . '">' . get_option( 'blogname' ) . '</a>';
        $output .= $options['after-crumb'];
    }
    
    // Products Page Crumb
    if ( $options['show_products_page'] ) {
        if ( !empty( $output ) ) {
            $output .= $options['crumb-separator'];
        }
        $output .= $options['before-crumb'];
        $output .= '<a class="wpsc-crumb" id="wpsc-crumb-' . $products_page_id . '" href="' . $filtered_products_page['url'] . '">' . $filtered_products_page['name'] . '</a>';
        $output .= $options['after-crumb'];
    }
    
    // Remaining Crumbs
    while ( wpsc_have_breadcrumbs() ) {
        wpsc_the_breadcrumb();
        if ( !empty( $output ) ) {
            $output .= $options['crumb-separator'];
        }
        $output .= $options['before-crumb'];
        if ( wpsc_breadcrumb_url() ) {
            $output .= '<a class="wpsc-crumb" href="' . wpsc_breadcrumb_url() . '">' . wpsc_breadcrumb_name() . '</a>';
        } else {
            $output .= '<span class="wpsc-crumb">' . wpsc_breadcrumb_name() . '</span>';
        }
        $output .= $options['after-crumb'];
    }
    $output = $options['before-breadcrumbs'] . apply_filters( 'wpsc_output_breadcrumbs', $output, $options ) . $options['after-breadcrumbs'];
    if ( $options['echo'] ) {
        echo $output;
    } else {
        return $output;
    }
}
function etheme_product_page_banner(){
    global $post;
    $etheme_productspage_id = etheme_shortcode2id('[productspage]');
    if($post->ID == $etheme_productspage_id && etheme_get_option('product_bage_banner') && etheme_get_option('product_bage_banner') != ''):
    ?>
        <div class="wpsc_category_details">
            <img src="<?php etheme_option('product_bage_banner') ?>"/>              
        </div>
    <?php endif;
}
add_filter('add_to_cart_text', 'superstore_custom_cart_button_text'); 
function superstore_custom_cart_button_text() {    
    return __('Mua hàng', 'woothemes');
}
add_action( 'template_redirect', 'redirect_404_to_any_url' );
function redirect_404_to_any_url() {
if ( is_404() ) :
wp_redirect( 'http://hanghieusales.com/', 301 );
exit;
endif;
}
add_action('init', 'cptui_register_my_cpt_news_info');
function cptui_register_my_cpt_news_info() {
register_post_type('news_info', array(
'label' => 'News',
'description' => 'news',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => true,
'rewrite' => array('slug' => 'tin-tuc', 'with_front' => 1),
'query_var' => true,
'has_archive' => true,
'yarpp_support' => true,
'supports' => array('title','editor','excerpt','trackbacks','custom-fields','tags','comments','revisions','thumbnail','author','page-attributes','post-formats'),
'taxonomies' => array('category_info', 'post_tag'),
'labels' => array (
  'name' => 'News',
  'singular_name' => 'news',
  'menu_name' => 'News',
  'add_new' => 'Add news',
  'add_new_item' => 'Add New news',
  'edit' => 'Edit',
  'edit_item' => 'Edit news',
  'new_item' => 'New news',
  'view' => 'View news',
  'view_item' => 'View news',
  'search_items' => 'Search News',
  'not_found' => 'No News Found',
  'not_found_in_trash' => 'No News Found in Trash',
  'parent' => 'Parent news',
)
) ); }
add_action('init', 'cptui_register_my_taxes_category_info');
function cptui_register_my_taxes_category_info() {
register_taxonomy( 'category_info',array (
  0 => 'news_info',
),
array( 'hierarchical' => false,
    'label' => 'Category',
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'thong-tin' ),
    'show_admin_column' => true,
    'labels' => array (
  'search_items' => 'Category',
  'popular_items' => '',
  'all_items' => '',
  'parent_item' => '',
  'parent_item_colon' => '',
  'edit_item' => '',
  'update_item' => '',
  'add_new_item' => '',
  'new_item_name' => '',
  'separate_items_with_commas' => '',
  'add_or_remove_items' => '',
  'choose_from_most_used' => '',
)
) ); 
}