<?php
/**
 * @package bxslider
 * @version 1.0
 */
/*
Plugin Name: bxslider
Plugin URI: http://flxa.co/
Description: A responsive carousel slider written in CSS and javascript.
Version: 1.0
Author: flxa
Author URI: http://flxa.co
License: GPL2
*/

/*  Copyright 2013  flxa  (email : hi@flxa.co)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function bxslider_get_posts($cat,$orderby,$order,$post_type,$post_status,$class) {

    $bx_args = array(
        'category_name'   => $cat,
        'orderby'         => $orderby,
        'order'           => $order,
        'post_type'       => $post_type,
        'post_status'     => $post_status,
        'suppress_filters' => true 
    );

    $bx_query = new WP_Query( $bx_args );

    if ($_REQUEST['bxdebug']==true) {
        echo '<h4 class="notice">BX Slider Debug</h4>';
        echo '<pre>'; echo print_r($bx_query); echo '</pre>';
        echo '<h4 class="notice">End BX Slider Debug</h4>';
    }

    while ( $bx_query->have_posts() ) : $bx_query->the_post();
        $content .= '<li>' . get_the_content( $bx_query->post->ID ) . '</li>';
    endwhile;

    wp_reset_postdata();

    return $content;
}

function bxslider($cat=null,$orderby='post_date',$order='DESC',$post_type='post',$post_status='publish',$class='') {
    $output = bxslider_get_posts($cat,$orderby,$order,$post_type,$post_status,$class);
    $html = "<ul class='bxslider $class'>$output</ul>";
    return $html;
}

add_action( 'admin_notices', 'bxslider' );

function bxslider_css() {
    wp_register_style( 'bxslider-style', plugins_url('css/jquery.bxslider.css', __FILE__) );
    wp_enqueue_style( 'bxslider-style' );
}
add_action( 'wp_enqueue_scripts', 'bxslider_css' );
add_action( 'admin_head', 'bxslider_css' );

function bxslider_js()  {
    wp_enqueue_script( 'fitvidsjs', plugins_url('js/plugins/jquery.fitvids.js', __FILE__), array('jquery') );
    wp_enqueue_script( 'bxsliderjs', plugins_url('js/jquery.bxslider.min.js', __FILE__), array('jquery') );
}
add_action( 'wp_enqueue_scripts', 'bxslider_js' );
add_action( 'admin_head', 'bxslider_js' );
?>