<?php

// BUTTON shortcode

function RedcomButton($atts, $content = null) {
	extract(shortcode_atts(array(
    	'link' => '#',
    	'target' => '_self',
    	'corners' => 'rounded',
    	'size' => 'normal',
    	'color' => 'blue',
    	'text' => 'uppercase',
    ), $atts));
   
   return '<a class="button '.$corners.' '.$size.' '.$color.' '.$text.'" href="'.$link.'" target="'.$target.'">' . do_shortcode($content) . '</a>';
}
add_shortcode('button', 'RedcomButton');


// SPACER shortcode

function RedcomSpacer($atts, $content = null) {
	extract(shortcode_atts(array(
    	'height' => '30',
    ), $atts));
   
   return '<div style="height: '.$height.'px"></div>';
}
add_shortcode('spacer', 'RedcomSpacer');

?>