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
 * 	name, description, mpn, sku, brand, ratingvalue, reviewcount, reviewratingvalue, reviewauthor, reviewbody, offercount, lowprice, highprice, pricecurrency
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
		'reviewratingvalue' => '',
		'reviewauthor' => '',
		'reviewbody' => '',
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
	if ($a['reviewratingvalue'] !== '') $json_arr['review'] = array('@type' => 'Review', 'reviewRating' => array('@type' => 'Rating', 'ratingValue' => esc_attr($a['reviewratingvalue'])), 'author' => array('@type' => 'Person', 'name' => esc_attr($a['reviewauthor'])), 'reviewBody' => esc_attr($a['reviewbody']));
	
	if ($a['offercount'] !== '') $json_arr['offers'] = array('@type' => 'AggregateOffer', 'offerCount' => esc_attr($a['offercount']), 'lowPrice' => esc_attr($a['lowprice']), 'highPrice' => esc_attr($a['highprice']), 'priceCurrency' => esc_attr($a['pricecurrency']));
	
	
	return '<div class="wpb_tdb_schema_seo"><script type="application/ld+json">' .json_encode($json_arr) .'</script></div>';
}
add_shortcode( 'tdb_schema_seo_product', 'tdb_schema_seo_product_func' );

/*
 * Schema LocalBusiness
 * [tdb_schema_seo_localbusiness]
 * Parameters
 * 	id,  memberof, name,description, pricerange, streetaddress, addresslocality, addressregion, postalcode, addresscountry, latitude, longitude, url, telephone, hasmap, ratingvalue, reviewcount
 * 	images: list of id images separate with comma
 */

function tdb_schema_seo_localbusiness_func ($atts) {
	$a = shortcode_atts( array(
                'id' => '',
		'memberof' => '',
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
		'pricerange' => '',
        ), $atts );
	
	$json_arr = array();
	$json_arr['@context'] = 'https://schema.org';
	$json_arr['@type'] = 'LocalBusiness';
	$json_arr['@id'] = esc_attr($a['id']);
	if ($a['memberof'] !== '') $json_arr['memberof'] = array('@type' => 'Organization', '@id' => esc_attr($a['memberof']));
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
	if ($a['pricerange'] !== '') $json_arr['priceRange'] = esc_attr($a['pricerange']);
	
	return '<div class="wpb_tdb_schema_seo"><script type="application/ld+json">' .json_encode($json_arr) .'</script></div>';
}
add_shortcode( 'tdb_schema_seo_localbusiness', 'tdb_schema_seo_localbusiness_func' );

/*
 * Schema Service
 * [tdb_schema_seo_service]
 * Parameters
 * 	name, description, servicetype, provider, brand, offercount, lowprice, highprice, pricecurrency
 *	areaserved: list of areas separate with comma
 * 	images: list of id images separate with comma
 */
function tdb_schema_seo_service_func ($atts) {
	$a = shortcode_atts( array(
                'name' => '',
		'description' => '',
		'servicetype' => '',
		'areaserved' => '',
		'provider' => '',
		'brand' => '',
		'images' => '',
		'offercount' => '',
		'lowprice' => '',
		'highprice' => '',
		'pricecurrency' => 'EUR'
		
        ), $atts );
	
	$json_arr = array();
	$json_arr['@context'] = 'https://schema.org';
	$json_arr['@type'] = 'Service';
	$json_arr['name'] = esc_attr($a['name']);
	$json_arr['description'] = esc_attr($a['description']);
	if ($a['servicetype'] !== '') $json_arr['serviceType'] = esc_attr($a['servicetype']);
	if ($a['areaserved'] !== '') {
		$json_arr['areaServed'] = explode(',', $a['areaserved']);
	}
	
	if ($a['provider'] !== '') $json_arr['provider'] = array('@type' => 'LocalBusiness', '@id' => esc_attr($a['provider']));
	
	if ($a['images'] !== '') {
		$images_id = explode(',', $a['images']);
		$images_url = array();
		foreach($images_id as $i){
			if (wp_get_attachment_url($i)) $images_url[] = wp_get_attachment_url($i);
		}
		if ($images_url) $json_arr['image'] = $images_url;
	}
	if ($a['brand'] !== '') $json_arr['brand'] = array('@type' => 'Brand', 'name' => esc_attr($a['brand']));
	if ($a['offercount'] !== '') $json_arr['offers'] = array('@type' => 'AggregateOffer', 'offerCount' => esc_attr($a['offercount']), 'lowPrice' => esc_attr($a['lowprice']), 'highPrice' => esc_attr($a['highprice']), 'priceCurrency' => esc_attr($a['pricecurrency']));
	
	
	
	return '<div class="wpb_tdb_schema_seo"><script type="application/ld+json">' .json_encode($json_arr) .'</script></div>';
}
add_shortcode( 'tdb_schema_seo_service', 'tdb_schema_seo_service_func' );

/*
 * Schema Event
 * [tdb_schema_seo_event]
 * Parameters
 * 	name,description, location, streetaddress, addresslocality, addressregion, postalcode, addresscountry, url, startdate, enddate, offer, organizer, performer
 * 	images: list of id images separate with comma
 * 	images_url: "true", use images_url instead of id
 */

function tdb_schema_seo_event_func ($atts) {
	$a = shortcode_atts( array(
		'name' => '',
		'description' => '',
		'url' => '',
		'locationname' => '',
		'streetaddress' => '',
		'addresslocality' => '',
		'addressregion' => '',
		'postalcode' => '',
		'addresscountry' => '',
		'images' => '',
		'images_url' => false,
		'startdate' => '',
		'enddate' => '',
		'urloffer' => '',
		'priceoffer' => '',
		'pricecurrencyoffer' => '',
		'validfromoffer' => '',
		'nameorganizer' => '',
		'urlorganizer' => '',
		'nameperformer' => '',
        ), $atts );
	
	$json_arr = array();
	$json_arr['@context'] = 'https://schema.org';
	$json_arr['@type'] = 'Event';
	
	$json_arr['eventAttendanceMode'] = 'https://schema.org/OfflineEventAttendanceMode';
	$json_arr['eventStatus'] = 'https://schema.org/EventScheduled';
	
	$json_arr['name'] = esc_attr($a['name']);
	
	$postaddress = array('@type' => 'PostalAddress', 'streetAddress' => esc_attr($a['streetaddress']), 'addressLocality' => esc_attr($a['addresslocality']), 'addressRegion' => esc_attr($a['addressregion']), 'postalCode' => esc_attr($a['postalcode']), 'addressCountry' => esc_attr($a['addresscountry']));
	$json_arr['location'] = array('@type' => "Place", 'name' => esc_attr($a['locationname']), 'address' => $postaddress);

	
	if ($a['description'] !== '') $json_arr['description'] = esc_attr($a['description']);
	
	if ($a['url'] !== '') $json_arr['url'] = esc_attr($a['url']);
	
	if ($a['startdate'] !== '') $json_arr['startDate'] = esc_attr($a['startdate']);
	if ($a['enddate'] !== '') $json_arr['endDate'] = esc_attr($a['enddate']);
	
		
	if ($a['images'] !== '') {
		$images_id = explode(',', $a['images']);
		$images_url = array();
		foreach($images_id as $i){
			/* si parametres $images_url = true, les url sont directement fournies */
			if ($images_url == 'true') $images_url[] = $images_id;
			else if (wp_get_attachment_url($i)) $images_url[] = wp_get_attachment_url($i);
		}
		if ($images_url) $json_arr['image'] = $images_url;
	}
	
	if ($a['priceoffer'] !== '') {
		$json_arr['offers'] = array('@type' => 'Offer', 'url' => esc_attr($a['urloffer']), 'price' => esc_attr($a['priceoffer']), 'priceCurrency' => esc_attr($a['pricecurrencyoffer']), 'validFrom' => esc_attr($a['validfromoffer']), 'availability' => 'https://schema.org/InStock');
	}
	
	if ($a['nameorganizer'] !== '') {
		$json_arr['organizer'] = array('@type' => 'Organization', 'name' => esc_attr($a['nameorganizer']), 'url' => esc_attr($a['urlorganizer']));
	}
	
	if ($a['nameperformer'] !== '') {
		$json_arr['performer'] = array('@type' => 'PerformingGroup', 'name' => esc_attr($a['nameperformer']));
	}
	
	
	
	return '<div class="wpb_tdb_schema_seo"><script type="application/ld+json">' .json_encode($json_arr) .'</script></div>';
}
add_shortcode( 'tdb_schema_seo_event', 'tdb_schema_seo_event_func' );

?>