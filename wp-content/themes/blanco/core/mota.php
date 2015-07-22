<?php 

function mota($name) {
         global $post;
               $attribute_name = 'pa_'.$name;//array( 'pa_nhan-hieu', 'pa_kich-co' ,  ); // Insert attribute names here
               //foreach ( $attribute_names as $attribute_name ) {
                    $taxonomy = get_taxonomy( $attribute_name );
                    if ( $taxonomy && ! is_wp_error( $taxonomy ) ) {
                         $terms = wp_get_post_terms( $post->ID, $attribute_name );
                         $terms_array = array();
                       
                         if ( ! empty( $terms ) ) {
                              foreach ( $terms as $term ) {
                                  $archive_link = get_term_link( $term->slug, $attribute_name );
                                  
                                  /*$full_line = '<a class="name-attr" href="' . $archive_link . '">'. $term->name . '</a>';*/
                                  $intro = term_description( $term->term_id , $attribute_name );
                                  $out ='<div class="intro-attr">'.$intro."</div>";
                                  array_push( $terms_array, $out );
                              }
                              return implode( $terms_array, ', ' );
                         }
                    }
          //}
     } 
     ?>