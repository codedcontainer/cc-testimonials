<?php
/**
 * Plugin Name: CC Testimonials
 * Description: [testimonial author="name" rating="4" date="03-13-90"]Text[/testimonial]
 * Version: 1.0
 * Author: Jason Utt
 * Author URI: www.codedcontainer
 * License: Attribution-NoDerivatives 4.0 International
 */

//Enqueue Rating Star Font 
wp_enqueue_style('star', plugins_url('/icons/css/star.css',__FILE__));
wp_enqueue_style('star', plugins_url('/icons/css/star-ie7.css',__FILE__));
wp_enqueue_style('star', plugins_url('/icons/css/star-ie7-codes.css',__FILE__));
wp_enqueue_style('star', plugins_url('/icons/css/star-embedded.css',__FILE__));
wp_enqueue_style('star', plugins_url('/icons/css/star-codes.css',__FILE__));
wp_enqueue_style('star', plugins_url('/icons/css/animation',__FILE__));


//[testimonial]
function testimonial_func( $atts, $content = null ){
	$a = shortcode_atts(array(
	'author' => '',
	'rating' => 0,
	'date' => NULL
), $atts );
	for ($i=1; $i <= $a['rating']; $i++)
	{
	$starIcon.="<i class='icon-star' style='color: #FFA500;'></i>";
	}

	if($a['date'] != NULL )
	{
		$date = " | " . $a['date'];
	}
	return "<blockquote style='background:url(".plugins_url( '/blockquote.png' , __FILE__ ).") 15px 20px no-repeat; padding: 15px 20px 10px 80px; margin: 10px; color: #555; font-style-italic; font-family: Georgia, serif; height: auto; font-style: italic; width: auto; box-shadow: 1px 1px 10px'>"."<p>".$content."</p>"."<p style='text-align: right;'>" . $a['author'] . $date . "<br/>" . $starIcon."</blockquote>";
}
add_shortcode( 'testimonial', 'testimonial_func' );


?>