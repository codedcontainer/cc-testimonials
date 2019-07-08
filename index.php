<?php
/**
 * Plugin Name: CC Testimonials
 * Description: [testimonial author="name" rating="4" date="03-13-90"]Text[/testimonial]
 * Version: 1.1
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

$htmlOut; 
//[testimonial]
function testimonial_func( $atts, $content = null ){
	$a = shortcode_atts(array(
	'author' => '',
	'rating' => 0,
	'maxrating' => 0,
	'date' => NULL
), $atts );

	for ($i=1; $i <= $a['rating']; $i++){
		$starIcon.="<i class='icon-star' style='color: #FFA500;'></i>";
	}
	if ($a['rating'] > 0){
		for($i=1; $i<= $a['maxrating'] - $a['rating']; $i++){
			$starIcon.="<i class='icon-star' style='color: #bdbcbb;'></i>";
		}
	}	

	if($a['date'] != NULL )
	{
		$date = " | " . $a['date'];
	}
	$htmlOut .= "<blockquote itemprop='review' itemscope itemtype='http://schema.org/Review' style='background:url("; 
	$htmlOut .= plugins_url( '/blockquote.png' , __FILE__ ); 
	$htmlOut .= ") 15px 20px no-repeat; padding: 15px 20px 10px 80px; margin: 10px; color: #555; font-style-italic; font-family: Georgia, serif; height: auto; font-style: italic; width: auto; box-shadow: 1px 1px 10px'>"; 
	$htmlOut .= "<p itemprop='description'>".$content."</p>"; 
	$htmlOut .= "<p style='text-align: right;'>";
	$htmlOut .= "<span itemprop='author'>" . $a['author'] . "</span>";
	$htmlOut .= "<span itemprop='datePublished'>".$date ."</span><br/> ";
	$htmlOut .= "<p itemprop='reviewRating' itemscope itemtype='http://schema.org/Rating' style='text-align: right;'>";
	$htmlOut .= "<meta itemprop='worstRating' content='0'>";
	$htmlOut .= "<span itemprop='ratingValue' style='display: none'>".$a['rating']."</span>";
	$htmlOut .= "<span itemprop='bestRating' style='display:none'>".$a['maxrating']."</span>";
	$htmlOut .= $starIcon."</p>";
	$htmlout .= "</blockquote>"; 

	return $htmlOut;
}
add_shortcode( 'testimonial', 'testimonial_func' );


?>