<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class Zita_Site_Library_Ajax{

	function __construct() {
  
			add_action( 'wp_ajax_zita_site_library_json', array($this,'zita_templates_json') );
			add_action( 'wp_ajax_zita-plugins-active', array($this,'plugins_active') );
			add_action( 'wp_ajax_zita-plugins-check', array($this,'required_plugin') );
			add_action( 'wp_ajax_zita-import-demo-data', array($this,'import_demo_data') );
			add_action( 'wp_ajax_zita-site-library-import-customizer', array( $this, 'import_customizer_settings' ) );
			add_action( 'wp_ajax_zita-import-xml', array( $this, 'import_xml_data' ) );
			add_action( 'wp_ajax_zita-site-library-import-options', array( $this, 'import_option_data' ) );
			add_action( 'wp_ajax_zita-site-library-import-widgets', array( $this, 'import_widgets' ) );
			add_action( 'wp_ajax_zita-site-library-import-close', array( $this, 'import_end' ) );

		}

	function zita_templates_get( $title='Zita',$cate = 'all',$builder = 'elementor' ) {
			// Collect the args
			$params = array(
				'i' => get_option( 'zita_license_key'),
				'ii' => get_option( 'zita_license'),
				't' => sanitize_text_field( $title ),
				'c' =>  $cate,
				'b' =>  $builder,
			);

			// Generate the URL
			$url = 'https://wpzita.com/wp-json/wp/v2/zita-library/';
			 $url = add_query_arg( $params, esc_url_raw( $url ) );

			// Make API request
			$response = wp_remote_get( esc_url_raw( $url ),array( 'timeout' => 120) );

			// Check the response code
			$response_code       = wp_remote_retrieve_response_code( $response );
			$response_message    = wp_remote_retrieve_response_message( $response );
			if ( 200 != $response_code && ! empty( $response_message ) ) {
				return new WP_Error( $response_code, $response_message );
			} elseif ( 200 != $response_code ) {
				return new WP_Error( $response_code, 'Unknown error occurred' );
			} else {
				return wp_remote_retrieve_body( $response );
		        }
		}


	 function zita_templates_json(){

			$response = $this->zita_templates_get('zita',sanitize_text_field($_POST['cate']),sanitize_text_field($_POST['builder']));
			if ( is_wp_error( $response ) ) {
				echo 'The following error occurred when contacting server: ' . wp_strip_all_tags( $response->get_error_message() );
			} else {
				print_r($response);
			}
			wp_die();
	}

	public function plugins_active(){
		if ( ! current_user_can( 'install_plugins' ) || !  sanitize_text_field($_POST['init']) || ! sanitize_text_field($_POST['init']) ) {
						wp_send_json_error(
							array(
								'success' => false,
								'message' => __( 'No plugin specified', 'zita-site-library' ),
							)
						);
					}

					$data               = array();
					$plugin_init        = ( isset( $_POST['init'] ) ) ? sanitize_text_field( $_POST['init'] ) : '';
					
					 $activate = activate_plugin( $plugin_init, '', false, true );

					if ( is_wp_error( $activate ) ) {
						wp_send_json_error(
							array(
								'success' => false,
								'message' => $activate->get_error_message(),
							)
						);
					}

					//do_action( '_after_plugin_activation', $plugin_init, $data );

					wp_send_json_success(
						array(
							'success' => true,
							'message' => __( 'Plugin Successfully Activated', 'zita-site-library' ),
						)
					);
	}

		/**
		 * Required Plugin
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function required_plugin() {

			// Verify Nonce.
			check_ajax_referer( 'zita-site-library', '_ajax_nonce' );

			$response = array(
				'active'       => array(),
				'inactive'     => array(),
				'notinstalled' => array(),
			);

			if ( ! current_user_can( 'manage_options' ) ) {
				wp_send_json_error( $response );
			}


			$required_plugins = ( isset( $_POST['required_plugins'] ) ) ? $this->recursive_sanitize_text_field($_POST['required_plugins']): array();
			if ( count( $required_plugins ) > 0 ) {
				foreach ( $required_plugins as $key => $plugin ) {

					 	// Lite - Installed but Inactive.
					 	if ( file_exists( WP_PLUGIN_DIR . '/' . $plugin['init'] ) && is_plugin_inactive( $plugin['init'] ) ) {

					 		$response['inactive'][] = $plugin;

					 		// Lite - Not Installed.
					 	} elseif ( ! file_exists( WP_PLUGIN_DIR . '/' . $plugin['init'] ) ) {

							$response['notinstalled'][] = $plugin;

					 		// Lite - Active.
					 	} else {
					 		$response['active'][] = $plugin;
						}
				}
			}

			// Send response.
			wp_send_json_success( $response );
		}


	public static function import_data_filter($demo_api_uri){

				// default values.
			$remote_args = array();
			$defaults    = array(
				'id'                         => '',
				'zita-widgets-data'    => '',
				'zita-customizer-data' => '',
				'zita-xml-path'        => '',
				'required-plugins'     => '',
				'zita-option-data'     => '',
			);

			$api_args = apply_filters(
				'zita_sites_api_args', array(
					'timeout' => 15,
				)
			);

			// Use this for premium demos.
			$request_params = apply_filters(
				'zita_sites_api_params', array(
					'site_key' => '',
					'site_url'     => '',
				)
			);

			$demo_api_uri = add_query_arg( $request_params, $demo_api_uri );

			// API Call.
			$response = wp_remote_get( $demo_api_uri, $api_args );


			if ( is_wp_error( $response ) || ( isset( $response->customizer ) && 0 == $response->customizer ) ) {
				if ( isset( $response->customizer ) ) {
					$data = json_decode( $response, true );
				} else {
					return new WP_Error( 'api_invalid_response_code', $response->get_error_message() );
				}
			} else {
				$data = json_decode( wp_remote_retrieve_body( $response ), true );
			}

			$data = json_decode( wp_remote_retrieve_body( $response ), true );

			if ( ! isset( $data['data'] ) ) {
			 	$remote_args['id']                         = $data['id'];
			 	$remote_args['zita-widgets-data']    = json_decode( $data['zita-widget'] );
			 	$remote_args['zita-customizer-data'] = $data['zita-customizer'];
			 	$remote_args['zita-xml-path']        = $data['zita-xml'];
			 	$remote_args['zita-option-data']        = $data['zita-option'];
			// 	$remote_args['required-plugins']           = $data['required-plugins'];
			 }

			// Merge remote demo and defaults.
			return wp_parse_args( $remote_args, $defaults );
		}


		/**
		 * Start Site Import
		 */
		function import_demo_data() {

			if ( ! isset( $_POST['zita_nonce'] ) || ! wp_verify_nonce( $_POST['zita_nonce'], 'zita_site_nonce' ) ) {
				wp_send_json_error( __( 'wp nonce not verify', 'zita-site-library' ) );
				wp_die();
			}
	

			if ( ! current_user_can( 'manage_options' ) ) {
				wp_send_json_error( __( 'You have not "customize" access to import the Zita site library.', 'zita-site-library' ) );
			}

			$demo_api_uri = isset( $_POST['api_url'] ) ? esc_url( $_POST['api_url'] ) : '';


			 if ( ! empty( $demo_api_uri ) ) {

			 	$demo_data = self::import_data_filter( $demo_api_uri );
		
				if ( is_wp_error( $demo_data ) ) {
					wp_send_json_error( $demo_data->get_error_message() );
				}

				wp_send_json_success( $demo_data );

			} else {
				wp_send_json_error( __( 'Request site API URL is empty. Try again!', 'zita-site-library' ) );
			 }

		} 

/**
 * Import xml Settings.
 *
 */

		function import_xml_data($wxr_url) {

			if ( ! isset( $_POST['zita_nonce'] ) || ! wp_verify_nonce( $_POST['zita_nonce'], 'zita_site_nonce' ) ) {
				wp_send_json_error( __( 'wp nonce not verify', 'zita-site-library' ) );
				wp_die();
			}
	

			if ( ! current_user_can( 'manage_options' ) ) {
				wp_send_json_error( __( 'You have not "customize" access to import the Zita site library.', 'zita-site-library' ) );
			}


			$xml_url = ( isset( $_REQUEST['xml_url'] ) ) ? urldecode( $_REQUEST['xml_url'] ) : '';

			if ( isset( $xml_url ) ) {

				// Download XML file.
				$xml_path = Zita_Site_Library_Helper::download_file( $xml_url );

				if ( $xml_path['success'] ) {

					if ( isset( $xml_path['data']['file'] ) ) {
						$data        = Zita_Site_Library_WXR_Importer::instance()->get_xml_data( $xml_path['data']['file'] );
						$data['xml'] = $xml_path['data'];
						wp_send_json_success( $data );
					} else {
						wp_send_json_error( __( 'There was an error downloading the XML file.', 'zita-site-library' ) );
					}
				} else {
					wp_send_json_error( $xml_path['data'] );
				}
			} else {
				wp_send_json_error( __( 'Invalid site XML file!', 'zita-site-library' ) );
			}
		}

		/**
		 * Import Customizer Settings.
		 *
		 */
		function import_customizer_settings() {

			
			if ( ! isset( $_POST['zita_nonce'] ) || ! wp_verify_nonce( $_POST['zita_nonce'], 'zita_site_nonce' ) ) {
				wp_send_json_error( __( 'wp nonce not verify', 'zita-site-library' ) );
				wp_die();
			}
	
			if ( ! current_user_can( 'manage_options' ) ) {
				wp_send_json_error( __( 'You have not "customize" access to import the Zita site library.', 'zita-site-library' ) );
			}



			$customizer_data = ( isset( $_POST['customizer_data'] ) ) ? $this->recursive_sanitize_text_field((array) json_decode( stripcslashes( $_POST['customizer_data'] ), 1 )) : '';

			if ( $customizer_data ) {

				Zita_Site_Library_Helper::import( $customizer_data );
				wp_send_json_success( $customizer_data );

			} else {
				wp_send_json_error( __( 'Customizer data is empty!', 'zita-site-library' ) );
			}

		}

		function import_option_data(){
			if ( ! isset( $_POST['zita_nonce'] ) || ! wp_verify_nonce( $_POST['zita_nonce'], 'zita_site_nonce' ) ) {
				wp_send_json_error( __( 'wp nonce not verify', 'zita-site-library' ) );
				wp_die();
			}
	
			if ( ! current_user_can( 'manage_options' ) ) {
				wp_send_json_error( __( 'You have not "customize" access to import the Zita site library.', 'zita-site-library' ) );
			}
			

			 $options_data = ( isset( $_POST['options_data'] ) ) ? $this->recursive_sanitize_text_field((array) json_decode( stripcslashes( $_POST['options_data'] ), 1 )) : '';
			 if ( isset( $options_data ) ) {
				$options_importer = Zita_Site_Library_Options_Import::instance();
				$options_importer->import_options_data( $options_data );
				wp_send_json_success( $options_data );
			 } else {
			 	wp_send_json_error( __( 'Site options are empty!', 'zita-site-library' ) );
			 }


		}

		/**
		 * Import Widgets.
		 *
		 * @since 1.0.14
		 * @return void
		 */
		function import_widgets() {


			if ( ! isset( $_POST['zita_nonce'] ) || ! wp_verify_nonce( $_POST['zita_nonce'], 'zita_site_nonce' ) ) {
				wp_send_json_error( __( 'wp nonce not verify', 'zita-site-library' ) );
				wp_die();
			}
	
			if ( ! current_user_can( 'manage_options' ) ) {
				wp_send_json_error( __( 'You have not "customize" access to import the Zita site library.', 'zita-site-library' ) );
			}



			$widgets_data = ( isset( $_POST['widgets_data'] ) ) ? $this->recursive_sanitize_text_field((object) json_decode( stripcslashes( $_POST['widgets_data'] ) )) : '';

			if ( isset( $widgets_data ) ) {
				$widgets_importer = Zita_Site_Library_Widget_Importer::instance();
				$status           = $widgets_importer->import_widgets_data( $widgets_data );

				wp_send_json_success( $widgets_data );
			} else {
				wp_send_json_error( __( 'Widget data is empty!', 'zita-site-library' ) );
			}

		}

		/**
		 * Import End.
		 *
		 */
		function import_end() {

			
			if ( ! isset( $_POST['zita_nonce'] ) || ! wp_verify_nonce( $_POST['zita_nonce'], 'zita_site_nonce' ) ) {
				wp_send_json_error( __( 'wp nonce not verify', 'zita-site-library' ) );
				wp_die();
			}
	
			if ( ! current_user_can( 'manage_options' ) ) {
				wp_send_json_error( __( 'You have not "customize" access to import the Zita site library.', 'zita-site-library' ) );
			}

			
			do_action( 'zita_site_library_import_complete' );
		}



		function recursive_sanitize_text_field($array) {
    			foreach ( $array as $key => &$value ) {
			        if ( is_array( $value ) ) {
			            $value = $this->recursive_sanitize_text_field($value);
			        }
			        else {
			            $value = sanitize_text_field( $value );
			        }
			    }

			    return $array;
}


}
	$obj = new Zita_Site_Library_Ajax;
