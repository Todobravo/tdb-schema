<?php
/*
 * Shortcodes
 */
defined('ABSPATH') or die("No script kiddies please!");

/*
 * Schema FAQPage
 * [tdb_schema_seo_faqpage][tdb_schema_seo_faqitem q="Question 1"]Answer of the question 1[/tdb_schema_seo_faqitem][tdb_schema_seo_faqitem q="Question 2"]Answer of the question 2[/tdb_schema_seo_faqitem][/tdb_schema_seo_faqpage]
 */
function tdb_schema_seo_faqpage_func ($atts, $content = null) {
	
	$json_arr = array();
	$json_arr['@context'] = 'https://schema.org';
	$json_arr['@type'] = 'FAQPage';
	
	$mainEntity = '';
	$mainEntity = do_shortcode($content);
	if (substr($mainEntity, -1) == ",") $mainEntity = substr($mainEntity,0,strlen($mainEntity)-1);
	else $mainEntity = "";
	
	$json_arr = array();
	$json_arr['@context'] = 'https://schema.org';
	$json_arr['@type'] = 'FAQPage';
	$json_arr['mainEntity'] = json_decode('['.$mainEntity .']');
	return '<div class="wpb_tdb_schema_seo"><script type="application/ld+json">' .json_encode($json_arr) .'</script></div>';
	
}
add_shortcode( 'tdb_schema_seo_faqpage', 'tdb_schema_seo_faqpage_func' );

function tdb_schema_seo_faqitem_func ($atts, $content = null) {
	$a = shortcode_atts( array(
                'q' => '',
        ), $atts );
	
	$json_arr = array();
	$json_arr['@type'] = 'Question';
	$json_arr['name'] = esc_attr($a['q']);
	$json_arr['acceptedAnswer'] = array('@type' => 'Answer', 'text' => esc_attr($content));
	
	return json_encode($json_arr) .",";
	
}
add_shortcode( 'tdb_schema_seo_faqitem', 'tdb_schema_seo_faqitem_func' );

/*
 * Schema Product
 * [tdb_schema_seo_product]
 * Parameters
 * 	name, description, mpn, sku, brand, ratingvalue, reviewcount, offercount, lowprice, highprice, pricecurrency
 * 	images: list of id images separate with comma
 */
function tdb_schema_seo_product_func ($atts) {
	$a = shortcode_atts( array(
                'name' => '',
		'description' => '',
		'images' => '',
		'mpn' => '',
		'sku' => '',
		'brand' => '',
		'ratingvalue' => '',
		'reviewcount' => '',
		'offercount' => '',
		'lowprice' => '',
		'highprice' => '',
		'pricecurrency' => 'EUR'
        ), $atts );
	
	$json_arr = array();
	$json_arr['@context'] = 'https://schema.org';
	$json_arr['@type'] = 'Product';
	$json_arr['name'] = esc_attr($a['name']);
	$json_arr['description'] = esc_attr($a['description']);
	if ($a['images'] !== '') {
		$images_id = explode(',', $a['images']);
		$images_url = array();
		foreach($images_id as $i){
			if (wp_get_attachment_url($i)) $images_url[] = wp_get_attachment_url($i);
		}
		if ($images_url) $json_arr['image'] = $images_url;
	}
	$json_arr['mpn'] = esc_attr($a['mpn']);
	
	if ($a['sku'] !== '') $json_arr['sku'] = esc_attr($a['sku']);
	if ($a['brand'] !== '') $json_arr['brand'] = array('@type' => 'Brand', 'name' => esc_attr($a['brand']));
	if ($a['ratingvalue'] !== '') $json_arr['aggregateRating'] = array('@type' => 'AggregateRating', 'ratingValue' => esc_attr($a['ratingvalue']), 'reviewCount' => esc_attr($a['reviewcount']));
	if ($a['offercount'] !== '') $json_arr['offers'] = array('@type' => 'AggregateOffer', 'offerCount' => esc_attr($a['offercount']), 'lowPrice' => esc_attr($a['lowprice']), 'highPrice' => esc_attr($a['highprice']), 'priceCurrency' => esc_attr($a['pricecurrency']));
	
	
	return '<div class="wpb_tdb_schema_seo"><script type="application/ld+json">' .json_encode($json_arr) .'</script></div>';
}
add_shortcode( 'tdb_schema_seo_product', 'tdb_schema_seo_product_func' );

/*
 * Schema LocalBusiness
 * [tdb_schema_seo_localbusiness]
 * Parameters
 * 	name, description, streetaddress, addresslocality, addressregion, postalcode, addresscountry, latitude, longitude, url, telephone, hasmap, ratingvalue, reviewcount
 * 	images: list of id images separate with comma
 */

function tdb_schema_seo_localbusiness_func ($atts) {
	$a = shortcode_atts( array(
                'id' => '',
		'name' => '',
		'description' => '',
		'streetaddress' => '',
		'addresslocality' => '',
		'addressregion' => '',
		'postalcode' => '',
		'addresscountry' => '',
		'latitude' => '',
		'longitude' => '',
		'url' => '',
		'telephone' => '',
		'hasmap' => '',
		'ratingvalue' => '',
		'reviewcount' => '',
		'images' => '',
        ), $atts );
	
	$json_arr = array();
	$json_arr['@context'] = 'https://schema.org';
	$json_arr['@type'] = 'LocalBusiness';
	$json_arr['@id'] = esc_attr($a['id']);
	$json_arr['name'] = esc_attr($a['name']);
	
	$json_arr['address'] = array('@type' => 'PostalAddress', 'streetAddress' => esc_attr($a['streetaddress']), 'addressLocality' => esc_attr($a['addresslocality']), 'addressRegion' => esc_attr($a['addressregion']), 'postalCode' => esc_attr($a['postalcode']), 'addressCountry' => esc_attr($a['addresscountry']));
	
	if ($a['description'] !== '') $json_arr['description'] = esc_attr($a['description']);
	
	if ($a['latitude'] !== '') $json_arr['geo'] = array('@type' => 'GeoCoordinates', 'latitude' => esc_attr($a['latitude']), 'longitude' => esc_attr($a['longitude']));
	
	if ($a['url'] !== '') $json_arr['url'] = esc_attr($a['url']);
	if ($a['telephone'] !== '') $json_arr['telephone'] = esc_attr($a['telephone']);
	if ($a['hasmap'] !== '') $json_arr['hasMap'] = esc_attr($a['hasmap']);
	if ($a['ratingvalue'] !== '') $json_arr['aggregateRating'] = array('@type' => 'AggregateRating', 'ratingValue' => esc_attr($a['ratingvalue']), 'reviewCount' => esc_attr($a['reviewcount']));
	
	if ($a['images'] !== '') {
		$images_id = explode(',', $a['images']);
		$images_url = array();
		foreach($images_id as $i){
			if (wp_get_attachment_url($i)) $images_url[] = wp_get_attachment_url($i);
		}
		if ($images_url) $json_arr['image'] = $images_url;
	}
	
	return '<div class="wpb_tdb_schema_seo"><script type="application/ld+json">' .json_encode($json_arr) .'</script></div>';
}
add_shortcode( 'tdb_schema_seo_localbusiness', 'tdb_schema_seo_localbusiness_func' );

?>