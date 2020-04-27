<?php
/*
 * Vc Mapping for Shortcodes
 */
defined('ABSPATH') or die("No script kiddies please!");

add_action( 'vc_before_init', 'tdb_schema_seo_mappingVC' );
function tdb_schema_seo_mappingVC() {
	
	if ( ! defined( 'UNCODE_CORE_FILE' ) ) {
		$icon['default'] = 'fa fa-code';
		$icon['faqitem'] = 'fa fa-question-circle';
	} else {
		$icon['default'] ='fa fa-code';
		$icon['faqitem'] = 'fa fa-question-circle';
	}
	
	
	vc_map( array(
		"name" => esc_html__( "Schema FAQ Page", "tdb-schema-seo" ),
		"base" => "tdb_schema_seo_faqpage",
		"as_parent" => array('only' => 'tdb_schema_seo_faqitem'),
		"content_element" => true,
		"show_settings_on_create" => false,
		"is_container" => true,
		"js_view" => 'VcColumnView',
		"icon" => $icon['default'],
		"category" => esc_html__( "TodoBravo", "tdb-schema-seo"),
		'description' => esc_html__('Schema FAQ Page', 'tdb-schema-seo') ,
	) );
	
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Tdb_Schema_Seo_Faqpage extends WPBakeryShortCodesContainer {
		}
	}
	
	vc_map( array(
		"name" => esc_html__( "Schema FAQ item", "tdb-schema-seo" ),
		"base" => "tdb_schema_seo_faqitem",
		"as_child" => array('only' => 'tdb_schema_seo_faqpage'),
		"content_element" => true,
		"show_settings_on_create" => true,
		"icon" => $icon['faqitem'],
		"category" => esc_html__( "TodoBravo", "tdb-schema-seo"),
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Question", "tdb-schema-seo" ),
				"param_name" => "q",
				"value" => "",
				"description" => esc_html__( "Enter your question", "tdb-schema-seo" ),
				"admin_label" => true
			),
			array(
				"type" => "textarea_html",
				"heading" => esc_html__( "Answer", "tdb-schema-seo" ),
				"param_name" => "content",
				"value" => "",
				"description" => esc_html__( "Enter your answer", "tdb-schema-seo" )
			)
		)
	) );
	
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Tdb_Schema_Seo_Faqitem extends WPBakeryShortCode {
		}
	}
	
	
	
	/*
	 * Product
	 */
	
	vc_map( array(
		"name" => esc_html__( "Schema Product", "tdb-schema-seo" ),
		"base" => "tdb_schema_seo_product",
		"content_element" => true,
		"show_settings_on_create" => true,
		"icon" => $icon['default'],
		"category" => esc_html__( "TodoBravo", "tdb-schema-seo"),
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Name", "tdb-schema-seo" ),
				"param_name" => "name",
				"value" => "",
				"description" => esc_html__( "Enter the name of the product", "tdb-schema-seo" ),
				"admin_label" => true
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Description", "tdb-schema-seo" ),
				"param_name" => "description",
				"value" => "",
				"description" => esc_html__( "Enter the description of the product", "tdb-schema-seo" )
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "MPN", "tdb-schema-seo" ),
				"param_name" => "mpn",
				"value" => "",
				"description" => esc_html__( "Enter the manufacturer Part Number (MPN) of the product", "tdb-schema-seo" )
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "SKU", "tdb-schema-seo" ),
				"param_name" => "sku",
				"value" => "",
				"description" => esc_html__( "Enter the SKU of the product", "tdb-schema-seo" )
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Brand", "tdb-schema-seo" ),
				"param_name" => "brand",
				"value" => "",
				"description" => esc_html__( "Enter the brand of the product", "tdb-schema-seo" )
			),
			array(
				"type" => "attach_images",
				"heading" => esc_html__( "Images", "tdb-schema-seo" ),
				"param_name" => "images",
				"value" => "",
				"description" => esc_html__( "Select or upload product images", "tdb-schema-seo" )
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "ratingValue", "tdb-schema-seo" ),
				"param_name" => "ratingvalue",
				"value" => "",
				"description" => esc_html__( "Enter the ratingValue of the product", "tdb-schema-seo" ),
				'group' => esc_html__('Agregate Review', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "reviewCount", "tdb-schema-seo" ),
				"param_name" => "reviewcount",
				"value" => "",
				"description" => esc_html__( "Enter the reviewCount of the ratingValue", "tdb-schema-seo" ),
				'group' => esc_html__('Agregate Review', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "offerCount", "tdb-schema-seo" ),
				"param_name" => "offercount",
				"value" => "",
				"description" => esc_html__( "Enter the offerCount", "tdb-schema-seo" ),
				'group' => esc_html__('Agregate Offer', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "lowPrice", "tdb-schema-seo" ),
				"param_name" => "lowprice",
				"value" => "",
				"description" => esc_html__( "Enter the lowPrice", "tdb-schema-seo" ),
				'group' => esc_html__('Agregate Offer', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "highPrice", "tdb-schema-seo" ),
				"param_name" => "highprice",
				"value" => "",
				"description" => esc_html__( "Enter the highPrice", "tdb-schema-seo" ),
				'group' => esc_html__('Agregate Offer', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "priceCurrency", "tdb-schema-seo" ),
				"param_name" => "pricecurrency",
				"value" => "EUR",
				"description" => esc_html__( "Enter the priceCurrency code EUR, USD...", "tdb-schema-seo" ),
				'group' => esc_html__('Agregate Offer', 'tdb-schema-seo')
			),
		)
	) );
}

?>