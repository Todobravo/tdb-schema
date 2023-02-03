<?php
/*
 * Plugin Name: TDB Schema SEO
 * Version: 1.3.0
 * Plugin URI: https://github.com/todobravo/tdb-schema-seo/
 * Description: Add structured data (schema.org) to your wordpress news, blog and pages
 * Author: TodoBravo
 * Author URI: https://www.todobravo.es/
 * License: GPL v3
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: tdb-schema-seo
 * Domain Path: /languages/
 *
 * Copyright 2020  TodoBravo
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
        die;
}

define( 'TDB_SCHEMA_SEO_FILE', __FILE__ );
define( 'TDB_SCHEMA_SEO_PLUGIN_DIR', dirname(__FILE__) );
define( 'TDB_SCHEMA_SEO_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/*
 * Admin Css
 */
function tdb_schema_seo_admin_style() {
    wp_enqueue_style('tdb-schema-seo', TDB_SCHEMA_SEO_PLUGIN_URL .'/css/wp-admin.css');
}
add_action('admin_enqueue_scripts', 'tdb_schema_seo_admin_style');

/*
 * Include files.
 */
require_once TDB_SCHEMA_SEO_PLUGIN_DIR . '/includes/shortcodes.php';
require_once TDB_SCHEMA_SEO_PLUGIN_DIR . '/includes/vc_map.php';


/**
 * Load translations
 */
function tdb_schema_seo_load_textdomain() {
	load_plugin_textdomain( 'tdb-schema-seo', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'tdb_schema_seo_load_textdomain' );
?>