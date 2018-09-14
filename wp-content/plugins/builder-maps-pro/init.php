<?php
/*
Plugin Name:  Builder Maps Pro
Plugin URI:   http://themify.me/addons/maps-pro
Version:      1.1.5
Author:       Themify
Description:  Maps Pro module allows you to insert Google Maps with multiple location markers with custom icons, tooltip text, and various map styles. It requires to use with the latest version of any Themify theme or the Themify Builder plugin.
Text Domain:  builder-maps-pro
Domain Path:  /languages
*/

defined( 'ABSPATH' ) or die( '-1' );

class Builder_Maps_Pro {

	private static $instance = null;
	var $url;
	var $dir;
	var $version;

	/**
	 * Creates or returns an instance of this class.
	 *
	 * @return	A single instance of this class.
	 */
	public static function get_instance() {
		return null == self::$instance ? self::$instance = new self : self::$instance;
	}

	private function __construct() {
		add_action( 'plugins_loaded', array( $this, 'constants' ), 1 );
		add_action( 'plugins_loaded', array( $this, 'i18n' ), 5 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ), 15 );
		add_action( 'themify_builder_setup_modules', array( $this, 'register_module' ) );
		add_action( 'themify_builder_admin_enqueue', array( $this, 'admin_enqueue' ), 1 );
		add_action( 'init', array( $this, 'updater' ) );
		if( is_admin() ) {
			add_action( 'wp_ajax_builder_pointers_get_image', array( $this, 'ajax_get_image' ) );
		}
	}

	public function constants() {
		$data = get_file_data( __FILE__, array( 'Version' ) );
		$this->version = $data[0];
		$this->url = trailingslashit( plugin_dir_url( __FILE__ ) );
		$this->dir = trailingslashit( plugin_dir_path( __FILE__ ) );
	}

	public function i18n() {
		load_plugin_textdomain( 'builder-maps-pro', false, '/languages' );
	}

	public function enqueue() {
                $key = method_exists('Themify_Builder','getMapKey')?'&key='.Themify_Builder::getMapKey():'';
		wp_enqueue_script( 'themify-builder-map-script', themify_https_esc('http://maps.google.com/maps/api/js?sensor=true'.$key), array(), false, false );
		wp_enqueue_script( 'builder-maps-pro', $this->url . 'assets/scripts.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_style( 'builder-maps-pro', $this->url . 'assets/style.css', array(), $this->version );
		wp_localize_script( 'builder-maps-pro', 'BuilderPointers', apply_filters( 'builder_pointers_script_vars', array(
			'trigger' => 'hover',
		) ) );
	}

	public function admin_enqueue() {
                $map_key = method_exists('Themify_Builder','getMapKey')?Themify_Builder::getMapKey():'';
		wp_enqueue_script( 'builder-maps-pro-admin', $this->url . 'assets/admin.js', array( 'jquery', 'jquery-ui-draggable' ), $this->version, false );
		wp_enqueue_style( 'builder-maps-pro-admin', $this->url . 'assets/admin.css' );

		$map_styles = array();
		foreach( $this->get_map_styles() as $key => $value ) {
			$name = str_replace( '.json', '', $key );
			$map_styles[$name] = $this->get_map_style( $name );
		}
		wp_localize_script( 'builder-maps-pro-admin', 'builderMapsPro', array(
                        'key'=>$map_key,
			'styles' => $map_styles,
			'labels' => array(
				'add_marker' => __( 'Add Location Marker', 'builder-maps-pro' ),
			)
		) );
	}

	public function ajax_get_image() {
		if( isset( $_POST['pointers_image'] ) && '' != trim( $_POST['pointers_image'] ) ) {
			$url = trim( $_POST['pointers_image'] );
			$width = trim( $_POST['pointers_width'] );
			$height = trim( $_POST['pointers_height'] );
			echo themify_get_image( 'src=' . esc_url( $url ) . '&w=' . $width . '&h=' . $height . '&alt=&ignore=true' );
		}
		die;
	}

	public function register_module( $ThemifyBuilder ) {
		$ThemifyBuilder->register_directory( 'templates', $this->dir . 'templates' );
		$ThemifyBuilder->register_directory( 'modules', $this->dir . 'modules' );
	}

	public function updater() {
		if( class_exists( 'Themify_Builder_Updater' ) ) {
			if ( ! function_exists( 'get_plugin_data') ) 
				include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			
			$plugin_basename = plugin_basename( __FILE__ );
			$plugin_data = get_plugin_data( trailingslashit( plugin_dir_path( __FILE__ ) ) . basename( $plugin_basename ) );
			new Themify_Builder_Updater( array(
				'name' => trim( dirname( $plugin_basename ), '/' ),
				'nicename' => $plugin_data['Name'],
				'update_type' => 'addon',
			), $this->version, trim( $plugin_basename, '/' ) );
		}
	}

	public function get_map_styles() {
		$theme_styles = is_dir( get_stylesheet_directory() . '/builder-maps-pro/styles/' ) ? $this->list_dir( get_stylesheet_directory() . '/builder-maps-pro/styles/' ) : array();

		return array_merge( $this->list_dir( $this->dir . 'styles/' ), $theme_styles );
	}

	public function list_dir( $path ) {
		$dh = opendir( $path );
		$files = array();
		while ( false !== ( $filename = readdir( $dh ) ) ) {
			if( $filename != '.' && $filename != '..' ) {
				$files[$filename] = $filename;
			}
		}

		return $files;
	}

	public function get_map_style( $name ) {
		$file = $this->dir . 'styles/' . $name . '.json';
		if( file_exists( get_stylesheet_directory() . '/builder-maps-pro/styles/' . $name . '.json' ) ) {
			$file = get_stylesheet_directory() . '/builder-maps-pro/styles/' . $name . '.json';
		} elseif( ! file_exists( $file ) ) {
			return '';
		}

		ob_start();
		include $file;
		return json_decode( ob_get_clean() );
	}
}
Builder_Maps_Pro::get_instance();