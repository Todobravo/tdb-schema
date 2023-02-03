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
	
	$priceRanges = array(
		'' => '',
		__( "Inexpensive", "tdb-schema-seo" ) => '$',
		__( "Moderate", "tdb-schema-seo" ) => '$$',
		__( "Expensive", "tdb-schema-seo" ) => '$$$',
		__( "Very expensive", "tdb-schema-seo" ) => '$$$$',
		__( "If you have to ask the price, you can't afford it*", "tdb-schema-seo" ) => '$$$$$'
	);
	
	$countries = array
            (
            'AF' => 'Afghanistan',
            'AX' => 'Aland Islands',
            'AL' => 'Albania',
            'DZ' => 'Algeria',
            'AS' => 'American Samoa',
            'AD' => 'Andorra',
            'AO' => 'Angola',
            'AI' => 'Anguilla',
            'AQ' => 'Antarctica',
            'AG' => 'Antigua And Barbuda',
            'AR' => 'Argentina',
            'AM' => 'Armenia',
            'AW' => 'Aruba',
            'AU' => 'Australia',
            'AT' => 'Austria',
            'AZ' => 'Azerbaijan',
            'BS' => 'Bahamas',
            'BH' => 'Bahrain',
            'BD' => 'Bangladesh',
            'BB' => 'Barbados',
            'BY' => 'Belarus',
            'BE' => 'Belgium',
            'BZ' => 'Belize',
            'BJ' => 'Benin',
            'BM' => 'Bermuda',
            'BT' => 'Bhutan',
            'BO' => 'Bolivia',
            'BA' => 'Bosnia And Herzegovina',
            'BW' => 'Botswana',
            'BV' => 'Bouvet Island',
            'BR' => 'Brazil',
            'IO' => 'British Indian Ocean Territory',
            'BN' => 'Brunei Darussalam',
            'BG' => 'Bulgaria',
            'BF' => 'Burkina Faso',
            'BI' => 'Burundi',
            'KH' => 'Cambodia',
            'CM' => 'Cameroon',
            'CA' => 'Canada',
            'CV' => 'Cape Verde',
            'KY' => 'Cayman Islands',
            'CF' => 'Central African Republic',
            'TD' => 'Chad',
            'CL' => 'Chile',
            'CN' => 'China',
            'CX' => 'Christmas Island',
            'CC' => 'Cocos (Keeling) Islands',
            'CO' => 'Colombia',
            'KM' => 'Comoros',
            'CG' => 'Congo',
            'CD' => 'Congo, Democratic Republic',
            'CK' => 'Cook Islands',
            'CR' => 'Costa Rica',
            'CI' => 'Cote D\'Ivoire',
            'HR' => 'Croatia',
            'CU' => 'Cuba',
            'CY' => 'Cyprus',
            'CZ' => 'Czech Republic',
            'DK' => 'Denmark',
            'DJ' => 'Djibouti',
            'DM' => 'Dominica',
            'DO' => 'Dominican Republic',
            'EC' => 'Ecuador',
            'EG' => 'Egypt',
            'SV' => 'El Salvador',
            'GQ' => 'Equatorial Guinea',
            'ER' => 'Eritrea',
            'EE' => 'Estonia',
            'ET' => 'Ethiopia',
            'FK' => 'Falkland Islands (Malvinas)',
            'FO' => 'Faroe Islands',
            'FJ' => 'Fiji',
            'FI' => 'Finland',
            'FR' => 'France',
            'GF' => 'French Guiana',
            'PF' => 'French Polynesia',
            'TF' => 'French Southern Territories',
            'GA' => 'Gabon',
            'GM' => 'Gambia',
            'GE' => 'Georgia',
            'DE' => 'Germany',
            'GH' => 'Ghana',
            'GI' => 'Gibraltar',
            'GR' => 'Greece',
            'GL' => 'Greenland',
            'GD' => 'Grenada',
            'GP' => 'Guadeloupe',
            'GU' => 'Guam',
            'GT' => 'Guatemala',
            'GG' => 'Guernsey',
            'GN' => 'Guinea',
            'GW' => 'Guinea-Bissau',
            'GY' => 'Guyana',
            'HT' => 'Haiti',
            'HM' => 'Heard Island & Mcdonald Islands',
            'VA' => 'Holy See (Vatican City State)',
            'HN' => 'Honduras',
            'HK' => 'Hong Kong',
            'HU' => 'Hungary',
            'IS' => 'Iceland',
            'IN' => 'India',
            'ID' => 'Indonesia',
            'IR' => 'Iran, Islamic Republic Of',
            'IQ' => 'Iraq',
            'IE' => 'Ireland',
            'IM' => 'Isle Of Man',
            'IL' => 'Israel',
            'IT' => 'Italy',
            'JM' => 'Jamaica',
            'JP' => 'Japan',
            'JE' => 'Jersey',
            'JO' => 'Jordan',
            'KZ' => 'Kazakhstan',
            'KE' => 'Kenya',
            'KI' => 'Kiribati',
            'KR' => 'Korea',
            'KW' => 'Kuwait',
            'KG' => 'Kyrgyzstan',
            'LA' => 'Lao People\'s Democratic Republic',
            'LV' => 'Latvia',
            'LB' => 'Lebanon',
            'LS' => 'Lesotho',
            'LR' => 'Liberia',
            'LY' => 'Libyan Arab Jamahiriya',
            'LI' => 'Liechtenstein',
            'LT' => 'Lithuania',
            'LU' => 'Luxembourg',
            'MO' => 'Macao',
            'MK' => 'Macedonia',
            'MG' => 'Madagascar',
            'MW' => 'Malawi',
            'MY' => 'Malaysia',
            'MV' => 'Maldives',
            'ML' => 'Mali',
            'MT' => 'Malta',
            'MH' => 'Marshall Islands',
            'MQ' => 'Martinique',
            'MR' => 'Mauritania',
            'MU' => 'Mauritius',
            'YT' => 'Mayotte',
            'MX' => 'Mexico',
            'FM' => 'Micronesia, Federated States Of',
            'MD' => 'Moldova',
            'MC' => 'Monaco',
            'MN' => 'Mongolia',
            'ME' => 'Montenegro',
            'MS' => 'Montserrat',
            'MA' => 'Morocco',
            'MZ' => 'Mozambique',
            'MM' => 'Myanmar',
            'NA' => 'Namibia',
            'NR' => 'Nauru',
            'NP' => 'Nepal',
            'NL' => 'Netherlands',
            'AN' => 'Netherlands Antilles',
            'NC' => 'New Caledonia',
            'NZ' => 'New Zealand',
            'NI' => 'Nicaragua',
            'NE' => 'Niger',
            'NG' => 'Nigeria',
            'NU' => 'Niue',
            'NF' => 'Norfolk Island',
            'MP' => 'Northern Mariana Islands',
            'NO' => 'Norway',
            'OM' => 'Oman',
            'PK' => 'Pakistan',
            'PW' => 'Palau',
            'PS' => 'Palestinian Territory, Occupied',
            'PA' => 'Panama',
            'PG' => 'Papua New Guinea',
            'PY' => 'Paraguay',
            'PE' => 'Peru',
            'PH' => 'Philippines',
            'PN' => 'Pitcairn',
            'PL' => 'Poland',
            'PT' => 'Portugal',
            'PR' => 'Puerto Rico',
            'QA' => 'Qatar',
            'RE' => 'Reunion',
            'RO' => 'Romania',
            'RU' => 'Russian Federation',
            'RW' => 'Rwanda',
            'BL' => 'Saint Barthelemy',
            'SH' => 'Saint Helena',
            'KN' => 'Saint Kitts And Nevis',
            'LC' => 'Saint Lucia',
            'MF' => 'Saint Martin',
            'PM' => 'Saint Pierre And Miquelon',
            'VC' => 'Saint Vincent And Grenadines',
            'WS' => 'Samoa',
            'SM' => 'San Marino',
            'ST' => 'Sao Tome And Principe',
            'SA' => 'Saudi Arabia',
            'SN' => 'Senegal',
            'RS' => 'Serbia',
            'SC' => 'Seychelles',
            'SL' => 'Sierra Leone',
            'SG' => 'Singapore',
            'SK' => 'Slovakia',
            'SI' => 'Slovenia',
            'SB' => 'Solomon Islands',
            'SO' => 'Somalia',
            'ZA' => 'South Africa',
            'GS' => 'South Georgia And Sandwich Isl.',
            'ES' => 'Spain',
            'LK' => 'Sri Lanka',
            'SD' => 'Sudan',
            'SR' => 'Suriname',
            'SJ' => 'Svalbard And Jan Mayen',
            'SZ' => 'Swaziland',
            'SE' => 'Sweden',
            'CH' => 'Switzerland',
            'SY' => 'Syrian Arab Republic',
            'TW' => 'Taiwan',
            'TJ' => 'Tajikistan',
            'TZ' => 'Tanzania',
            'TH' => 'Thailand',
            'TL' => 'Timor-Leste',
            'TG' => 'Togo',
            'TK' => 'Tokelau',
            'TO' => 'Tonga',
            'TT' => 'Trinidad And Tobago',
            'TN' => 'Tunisia',
            'TR' => 'Turkey',
            'TM' => 'Turkmenistan',
            'TC' => 'Turks And Caicos Islands',
            'TV' => 'Tuvalu',
            'UG' => 'Uganda',
            'UA' => 'Ukraine',
            'AE' => 'United Arab Emirates',
            'GB' => 'United Kingdom',
            'US' => 'United States',
            'UM' => 'United States Outlying Islands',
            'UY' => 'Uruguay',
            'UZ' => 'Uzbekistan',
            'VU' => 'Vanuatu',
            'VE' => 'Venezuela',
            'VN' => 'Viet Nam',
            'VG' => 'Virgin Islands, British',
            'VI' => 'Virgin Islands, U.S.',
            'WF' => 'Wallis And Futuna',
            'EH' => 'Western Sahara',
            'YE' => 'Yemen',
            'ZM' => 'Zambia',
            'ZW' => 'Zimbabwe',
        );
	
	$countries_map = array('' => '');
	foreach ($countries as $code => $country_name) {
	    $countries_map[$country_name] = $code;
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
				"type" => "textarea",
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
				"description" => esc_html__( "Select or upload product images. For best results, provide multiple high-resolution images (minimum of 50K pixels when multiplying width and height) with the following aspect ratios: 16x9, 4x3, and 1x1.", "tdb-schema-seo" )
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "ratingValue", "tdb-schema-seo" ),
				"param_name" => "ratingvalue",
				"value" => "",
				"description" => esc_html__( "Enter the ratingValue of the product", "tdb-schema-seo" ),
				'group' => esc_html__('Agregate Rating', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "reviewCount", "tdb-schema-seo" ),
				"param_name" => "reviewcount",
				"value" => "",
				"description" => esc_html__( "Enter the reviewCount of the ratingValue", "tdb-schema-seo" ),
				'group' => esc_html__('Agregate Rating', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "review ratingValue", "tdb-schema-seo" ),
				"param_name" => "reviewratingvalue",
				"value" => "",
				"description" => esc_html__( "Enter the ratingValue of the review", "tdb-schema-seo" ),
				'group' => esc_html__('Review', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "review Author Name", "tdb-schema-seo" ),
				"param_name" => "reviewauthor",
				"value" => "",
				"description" => esc_html__( "Enter the author Name of the person reviewing the product", "tdb-schema-seo" ),
				'group' => esc_html__('Review', 'tdb-schema-seo')
			),
			array(
				"type" => "textarea",
				"heading" => esc_html__( "review Body", "tdb-schema-seo" ),
				"param_name" => "reviewbody",
				"value" => "",
				"description" => esc_html__( "Enter the review content for the product", "tdb-schema-seo" ),
				'group' => esc_html__('Review', 'tdb-schema-seo')
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
	
	/*
	 * LocalBusiness
	 */
	
	vc_map( array(
		"name" => esc_html__( "Schema LocalBusiness", "tdb-schema-seo" ),
		"base" => "tdb_schema_seo_localbusiness",
		"content_element" => true,
		"show_settings_on_create" => true,
		"icon" => $icon['default'],
		"category" => esc_html__( "TodoBravo", "tdb-schema-seo"),
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => esc_html__( "id", "tdb-schema-seo" ),
				"param_name" => "id",
				"value" => "",
				"description" => esc_html__( "Enter the globally unique ID of the specific business location in the form of a URL", "tdb-schema-seo" ),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Name", "tdb-schema-seo" ),
				"param_name" => "name",
				"value" => "",
				"description" => esc_html__( "Enter the name of the local business", "tdb-schema-seo" ),
				"admin_label" => true
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Member Of organization", "tdb-schema-seo" ),
				"param_name" => "memberof",
				"value" => "",
				"description" => esc_html__( "Enter the Organization ID/url if exists", "tdb-schema-seo" )
			),
			array(
				"type" => "textarea",
				"heading" => esc_html__( "Description", "tdb-schema-seo" ),
				"param_name" => "description",
				"value" => "",
				"description" => esc_html__( "Enter the description of the local business", "tdb-schema-seo" )
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "url", "tdb-schema-seo" ),
				"param_name" => "url",
				"value" => "",
				"description" => esc_html__( "Enter the web url of the local business.", "tdb-schema-seo" )
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Telephone", "tdb-schema-seo" ),
				"param_name" => "telephone",
				"value" => "",
				"description" => esc_html__( "Enter the phone number with country code +NN of the local business.", "tdb-schema-seo" )
			),
			array(
				"type" => "attach_images",
				"heading" => esc_html__( "Images", "tdb-schema-seo" ),
				"param_name" => "images",
				"value" => "",
				"description" => esc_html__( "Select or upload product images. For best results, provide multiple high-resolution images (minimum of 50K pixels when multiplying width and height) with the following aspect ratios: 16x9, 4x3, and 1x1", "tdb-schema-seo" )
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Price Range", "tdb-schema-seo" ),
				"param_name" => "pricerange",
				"value" => $priceRanges,
				"description" => esc_html__( "Enter the Price Range the local business", "tdb-schema-seo" )
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Street", "tdb-schema-seo" ),
				"param_name" => "streetaddress",
				"value" => "",
				"description" => esc_html__( "Enter the street of the local business", "tdb-schema-seo" ),
				'group' => esc_html__('Address', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Locality", "tdb-schema-seo" ),
				"param_name" => "addresslocality",
				"value" => "",
				"description" => esc_html__( "Enter the Locality of the local business", "tdb-schema-seo" ),
				'group' => esc_html__('Address', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Region", "tdb-schema-seo" ),
				"param_name" => "addressregion",
				"value" => "",
				"description" => esc_html__( "Enter the Locality of the local business", "tdb-schema-seo" ),
				'group' => esc_html__('Address', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Postal Code", "tdb-schema-seo" ),
				"param_name" => "postalcode",
				"value" => "",
				"description" => esc_html__( "Enter the postal Code of the local business", "tdb-schema-seo" ),
				'group' => esc_html__('Address', 'tdb-schema-seo')
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Country code", "tdb-schema-seo" ),
				"param_name" => "addresscountry",
				"value" => $countries_map,
				"description" => esc_html__( "Enter the Country Code 2 lettersof the local business", "tdb-schema-seo" ),
				'group' => esc_html__('Address', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Latitude", "tdb-schema-seo" ),
				"param_name" => "latitude",
				"value" => "",
				"description" => esc_html__( "Enter the latitude of the local business", "tdb-schema-seo" ),
				'group' => esc_html__('Address', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Longitude", "tdb-schema-seo" ),
				"param_name" => "longitude",
				"value" => "",
				"description" => esc_html__( "Enter the longitude of the local business", "tdb-schema-seo" ),
				'group' => esc_html__('Address', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Map url", "tdb-schema-seo" ),
				"param_name" => "hasmap",
				"value" => "",
				"description" => esc_html__( "Enter the Map url of the local business", "tdb-schema-seo" ),
				'group' => esc_html__('Address', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "ratingValue", "tdb-schema-seo" ),
				"param_name" => "ratingvalue",
				"value" => "",
				"description" => esc_html__( "Enter the ratingValue of the local business", "tdb-schema-seo" ),
				'group' => esc_html__('Agregate Rating', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "reviewCount", "tdb-schema-seo" ),
				"param_name" => "reviewcount",
				"value" => "",
				"description" => esc_html__( "Enter the reviewCount of the ratingValue", "tdb-schema-seo" ),
				'group' => esc_html__('Agregate Rating', 'tdb-schema-seo')
			),
		)
	) );
	
	/*
	 * Service
	 */
	
	vc_map( array(
		"name" => esc_html__( "Schema Service", "tdb-schema-seo" ),
		"base" => "tdb_schema_seo_service",
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
				"description" => esc_html__( "Enter the name of the service", "tdb-schema-seo" ),
				"admin_label" => true
			),
			array(
				"type" => "textarea",
				"heading" => esc_html__( "Description", "tdb-schema-seo" ),
				"param_name" => "description",
				"value" => "",
				"description" => esc_html__( "Enter the description of the service", "tdb-schema-seo" )
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "service Type", "tdb-schema-seo" ),
				"param_name" => "servicetype",
				"value" => "",
				"description" => esc_html__( "Enter the type of the service. For best results, use Wikipedia url reference.", "tdb-schema-seo" ),
				"admin_label" => true
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Brand", "tdb-schema-seo" ),
				"param_name" => "brand",
				"value" => "",
				"description" => esc_html__( "Enter the brand of the service", "tdb-schema-seo" )
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Provider", "tdb-schema-seo" ),
				"param_name" => "provider",
				"value" => "",
				"description" => esc_html__( "Enter the LocalBusiness ID/url if exists", "tdb-schema-seo" )
			),
			array(
				"type" => "attach_images",
				"heading" => esc_html__( "Images", "tdb-schema-seo" ),
				"param_name" => "images",
				"value" => "",
				"description" => esc_html__( "Select or upload service images. For best results, provide multiple high-resolution images (minimum of 50K pixels when multiplying width and height) with the following aspect ratios: 16x9, 4x3, and 1x1.", "tdb-schema-seo" )
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
			array(
				"type" => "exploded_textarea",
				"heading" => esc_html__( "Areas", "tdb-schema-seo" ),
				"param_name" => "areaserved",
				"value" => "",
				"description" => esc_html__( "Enter the areas Served. For best results, use https://www.wikidata.org/ url references. One per line.", "tdb-schema-seo" ),
				'group' => esc_html__('Areas served', 'tdb-schema-seo')
			),
		)
	) );
	
	/*
	 * Event
	 */
	
	vc_map( array(
		"name" => esc_html__( "Schema Event", "tdb-schema-seo" ),
		"base" => "tdb_schema_seo_event",
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
				"description" => esc_html__( "Enter the name of the event", "tdb-schema-seo" ),
				"admin_label" => true
			),
			array(
				"type" => "textarea",
				"heading" => esc_html__( "Description", "tdb-schema-seo" ),
				"param_name" => "description",
				"value" => "",
				"description" => esc_html__( "Enter the description of the event", "tdb-schema-seo" )
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "url", "tdb-schema-seo" ),
				"param_name" => "url",
				"value" => "",
				"description" => esc_html__( "Enter the web url of the event.", "tdb-schema-seo" )
			),
			array(
				"type" => "attach_images",
				"heading" => esc_html__( "Images", "tdb-schema-seo" ),
				"param_name" => "images",
				"value" => "",
				"description" => esc_html__( "Select or upload product images. For best results, provide multiple high-resolution images (minimum of 50K pixels when multiplying width and height) with the following aspect ratios: 16x9, 4x3, and 1x1", "tdb-schema-seo" )
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Location name", "tdb-schema-seo" ),
				"param_name" => "locationname",
				"value" => "",
				"description" => esc_html__( "Enter the location name of the event", "tdb-schema-seo" ),
				'group' => esc_html__('Address', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Street", "tdb-schema-seo" ),
				"param_name" => "streetaddress",
				"value" => "",
				"description" => esc_html__( "Enter the street of the event", "tdb-schema-seo" ),
				'group' => esc_html__('Address', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Locality", "tdb-schema-seo" ),
				"param_name" => "addresslocality",
				"value" => "",
				"description" => esc_html__( "Enter the Locality of the event", "tdb-schema-seo" ),
				'group' => esc_html__('Address', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Region", "tdb-schema-seo" ),
				"param_name" => "addressregion",
				"value" => "",
				"description" => esc_html__( "Enter the Locality of the event", "tdb-schema-seo" ),
				'group' => esc_html__('Address', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Postal Code", "tdb-schema-seo" ),
				"param_name" => "postalcode",
				"value" => "",
				"description" => esc_html__( "Enter the postal Code of the event", "tdb-schema-seo" ),
				'group' => esc_html__('Address', 'tdb-schema-seo')
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Country code", "tdb-schema-seo" ),
				"param_name" => "addresscountry",
				"value" => $countries_map,
				"description" => esc_html__( "Enter the Country Code 2 letters of the event", "tdb-schema-seo" ),
				'group' => esc_html__('Address', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "start Date", "tdb-schema-seo" ),
				"param_name" => "startdate",
				"value" => "",
				"description" => esc_html__( "Enter the start date of the event YYYY-MM-DD", "tdb-schema-seo" ),
				'group' => esc_html__('Date', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "end Date", "tdb-schema-seo" ),
				"param_name" => "enddate",
				"value" => "",
				"description" => esc_html__( "Enter the end date of the event YYYY-MM-DD", "tdb-schema-seo" ),
				'group' => esc_html__('Date', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Url to buy", "tdb-schema-seo" ),
				"param_name" => "urloffer",
				"value" => "",
				"description" => esc_html__( "Enter the  URL of a page providing the ability to buy tickets", "tdb-schema-seo" ),
				'group' => esc_html__('Offers', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Price", "tdb-schema-seo" ),
				"param_name" => "priceoffer",
				"value" => "",
				"description" => esc_html__( "Enter the lowest available price available for your tickets", "tdb-schema-seo" ),
				'group' => esc_html__('Offers', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Currency", "tdb-schema-seo" ),
				"param_name" => "pricecurrencyoffer",
				"value" => "",
				"description" => esc_html__( "Enter 3-letter ISO 4217 currency code.", "tdb-schema-seo" ),
				'group' => esc_html__('Offers', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Valid From Date", "tdb-schema-seo" ),
				"param_name" => "validfromoffer",
				"value" => "",
				"description" => esc_html__( "The date and time when tickets go on sale YYYY-MM-DD.", "tdb-schema-seo" ),
				'group' => esc_html__('Offers', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Name", "tdb-schema-seo" ),
				"param_name" => "nameorganizer",
				"value" => "",
				"description" => esc_html__( "The organization that is hosting the event.", "tdb-schema-seo" ),
				'group' => esc_html__('Organizer', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "URL", "tdb-schema-seo" ),
				"param_name" => "urlorganizer",
				"value" => "",
				"description" => esc_html__( "The event host's domain URL.", "tdb-schema-seo" ),
				'group' => esc_html__('Organizer', 'tdb-schema-seo')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Name", "tdb-schema-seo" ),
				"param_name" => "nameperformer",
				"value" => "",
				"description" => esc_html__( "The participants performing at the event, such as artists and comedians.", "tdb-schema-seo" ),
				'group' => esc_html__('Performer', 'tdb-schema-seo')
			),
			
		)
	) );
}

?>