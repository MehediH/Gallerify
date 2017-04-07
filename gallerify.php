<?php 

/**
 * Plugin Name: Gallerify
 * Plugin URI: https://wordpress.org/plugins/gallerify/
 * Description: A faster gallery plugin for WordPress
 * Version: 1.1
 * Author: imehedidip
 * Author URI: http://twitter.com/mehedih_
 * Text Domain: gallerify
 * License: GPL2
 * Copyright 2015  Mehedi 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as 
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received #a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/**
 * Enqueue scripts and styles.
 */

function gallerify_enqueue()
{
    wp_register_style( 'gallerify', plugins_url( 'gallerify-style.php', __FILE__ ), false, NULL, 'all' );
	wp_enqueue_style('gallerify');
	wp_enqueue_script( 'gallerify-base', plugins_url( 'gallerify-base.js', __FILE__ ), array( 'jquery' ), '1.0', true );
}

add_action( 'wp_enqueue_scripts', 'gallerify_enqueue' );

/**
 * Include Admin panel
 */

include_once ('admin/gallerify_admin.php'); //Get Admin Settings

/**
 * Activate Gallerify options
 */

function activate_gallerify()
{	
	add_option('replace_wordpress_gallerify', 0);
	add_option('gallerify_accent', "#454545");
	add_option('gallerify_accent_title', "#383838");
	add_option('gallerify_fullscreen', 1);
	add_option('gallerify_thumb_nav', 1);
	add_option('gallerify_keys', 1);
	add_option('gallerify_autoplay', 0);
	add_option('gallerify_trackpad', 0);
	add_option('gallerify_change_accent_admin', 0);

}

register_activation_hook(__FILE__, 'activate_gallerify');

/**
 * Deactivate Gallerify options
 */

function deactive_gallerify()
{  
	delete_option('replace_wordpress_gallerify');
	delete_option('gallerify_accent' );
	delete_option('gallerify_fullscreen');
	delete_option('gallerify_thumb_nav');
	delete_option('gallerify_keys');
	delete_option('gallerify_autoplay');
	delete_option('gallerify_trackpad');
	delete_option('gallerify_change_accent_admin');
	delete_option('gallerify_accent_title');
}

register_deactivation_hook(__FILE__, 'deactive_gallerify');

/**
 * Add Gallerify shortcode
 */

function gallerify_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
	  'title' => "",
	), $atts));

	//get the img tags
	preg_match_all('/<img[^>]+>/i',$content, $imgTags); 

	for ($i = 0; $i < count($imgTags[0]); $i++) {
	  preg_match('/src="([^"]+)/i',$imgTags[0][$i], $imgage);
	  $origImageSrc[] = str_ireplace( 'src="', '',  $imgage[0]);
	}

	//manage the title
	if (!$title){ 
		$gallerify_title = "";
	} else{
	
		$gallerify_title = " : " . $title;
	}

	//Gallerify settings
		if (!get_option('gallerify_fullscreen')){
			$fullscreen = "false"; 
		} else{
			$fullscreen = "true";
		}

		if (!get_option('gallerify_thumb_nav')){
			$nav = "false"; 
		} else{
			$nav = "thumbs";
		}

		if (!get_option('gallerify_keys')){
			$keys = "false"; 
		} else{
			$keys = "true";
		}

		if (!get_option('gallerify_autoplay')){
			$autoplay = "false"; 
		} else{
			$autoplay = "true";
		}

		if (!get_option('gallerify_trackpad')){
			$trackpad = "false"; 
		} else{
			$trackpad = "true";
		}

	$output = '<div class="gallerify-container"><h3 class="gallerify-block-title">Gallery'.$gallerify_title.'</h3><div class="gallerify" data-allowfullscreen="'.$fullscreen.'" data-nav="'.$nav.'" data-keyboard="'.$keys.'"  data-autoplay="'.$autoplay.'" data-trackpad="'.$trackpad.'" data-width="100%">';
	foreach ($origImageSrc as $gimage) {
		$output .= '<img src="'.$gimage.'"/>';
	}
	$output .= '</div></div>';
	return $output;
}

add_shortcode('gallerify', 'gallerify_shortcode');

/**
 * Replace WordPress Gallery function
 */

function gallerify_replace_wp_gallery($output, $attr) {
	    global $post;

	    if (isset($attr['orderby'])) {
	        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
	        if (!$attr['orderby'])
	            unset($attr['orderby']);
	    }

	    extract(shortcode_atts(array(
	        'title' => "",
			'fullscreen' => "true",
			'nav' => 'thumbs',
			'keys' => 'true',
			'autoplay' => 'true',
			'trackpad' => 'true',
			'order' => 'ASC',
	        'orderby' => 'menu_order ID',
	        'id' => $post->ID,
	        'itemtag' => 'dl',
	        'icontag' => 'dt',
	        'captiontag' => 'dd',
	        'columns' => 3,
	        'size' => 'thumbnail',
	        'include' => '',
	        'exclude' => ''
	    ), $attr));

	    $id = intval($id);
	    if ('RAND' == $order) $orderby = 'none';

	    if (!empty($include)) {
	        $include = preg_replace('/[^0-9,]+/', '', $include);
	        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

	        $attachments = array();
	        foreach ($_attachments as $key => $val) {
	            $attachments[$val->ID] = $_attachments[$key];
	        }
	    }

	    if (empty($attachments)) return '';

	    //Gallerify settings
		if (!get_option('gallerify_fullscreen')){
			$fullscreen = "false"; 
		} else{
			$fullscreen = "true";
		}

		if (!get_option('gallerify_thumb_nav')){
			$nav = "false"; 
		} else{
			$nav = "thumbs";
		}

		if (!get_option('gallerify_keys')){
			$keys = "false"; 
		} else{
			$keys = "true";
		}

		if (!get_option('gallerify_autoplay')){
			$autoplay = "false"; 
		} else{
			$autoplay = "true";
		}

		if (!get_option('gallerify_trackpad')){
			$trackpad = "false"; 
		} else{
			$trackpad = "true";
		}

		$output = '<div class="gallerify-container"><h3 class="gallerify-block-title">Gallery'.$gallerify_title.'</h3><div class="gallerify" data-allowfullscreen="'.$fullscreen.'" data-nav="'.$nav.'" data-keyboard="'.$keys.'"  data-autoplay="'.$autoplay.'" data-trackpad="'.$trackpad.'" data-width="100%">';

	    foreach ($attachments as $id => $attachment) {
	        $img = wp_get_attachment_image_src($id, 'full');

	        $output .= "<img src=\"{$img[0]}\" width=\"{$img[1]}\" height=\"{$img[2]}\" alt=\"\" />\n";
	    }

	    $output .= "</div></div>";

	    return $output;
}

/**
 * Check user setting and replace WordPress gallery if enabled
 */
if ( 1 == get_option('replace_wordpress_gallerify') ) {
	add_filter('post_gallery', 'gallerify_replace_wp_gallery', 10, 2);
}

/**
 * Load admin styles
 */
function gallerify_wp_admin_style()
{
    wp_register_style('gallerify_admin_css', plugin_dir_url( __FILE__ ) . 'admin/gallerify-admin.php' );
    wp_enqueue_style( 'gallerify_admin_css' );
    wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script('iris', admin_url( 'js/iris.min.js' ), array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ), false,1);
    wp_enqueue_script( 'gallerify_admin_js', plugins_url('admin/gallerify_admin.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}

add_action( 'admin_enqueue_scripts', 'gallerify_wp_admin_style' );

?>
