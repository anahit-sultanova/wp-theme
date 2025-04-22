<?php
/**
 * 
 * Menu item custom image field
 * 
 * Thanks https://gist.github.com/digamber89/e3c6289eaed0c6baf1d6d52f947bd3e7
 * 
 */

 class TUMO_International__menu_item_custom_upload_field {
    /**
	 * Holds our custom fields
	 *
	 * @var    array
	 * @access protected
	 * @since  Menu_Item_Custom_Fields_Example 0.2.0
	 */
	protected static $fields = array();


	/**
	 * Initialize plugin
	 */
	public static function init() {
		add_action( 'wp_nav_menu_item_custom_fields', array( __CLASS__, '_fields' ), 10, 4 );
		add_action( 'wp_update_nav_menu_item', array( __CLASS__, '_save' ), 10, 3 );
		add_filter( 'manage_nav-menus_columns', array( __CLASS__, '_columns' ), 99 );

		/*Enqueue scripts for Edit Menu upload image*/
		add_action('admin_enqueue_scripts', function(){
			    wp_enqueue_media();
			    wp_enqueue_script( 'tumo_int-nav-menu-edit', get_template_directory_uri().'/assets/js/tumo_int_nav-media-uploader.js', array('jquery'), '', true );
		});
	}


	/**
	 * Save custom field value
	 *
	 * @wp_hook action wp_update_nav_menu_item
	 *
	 * @param int   $menu_id         Nav menu ID
	 * @param int   $menu_item_db_id Menu item ID
	 * @param array $menu_item_args  Menu item data
	 */
	public static function _save( $menu_id, $menu_item_db_id, $menu_item_args ) {
		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			return;
		}

		check_admin_referer( 'update-nav_menu', 'update-nav-menu-nonce' );

		if( isset($_POST['jt-img-id']) && !empty($_POST['jt-img-id'])  ){
			
			$value = $_POST['jt-img-id'][$menu_item_db_id];
			if( !empty($value) ){
				update_post_meta($menu_item_db_id, 'jt_hover_image', $value );
			}else{
				delete_post_meta($menu_item_db_id, 'jt_hover_image' );
			}
		}
			

	}


	/**
	 * Print field
	 *
	 * @param object $item  Menu item data object.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args  Menu item args.
	 * @param int    $id    Nav menu ID.
	 *
	 * @return string Form fields
	 */
	public static function _fields( $id, $item, $depth, $args ) {
		include get_template_directory().'/inc/tumo_int-nav-menu-uploader.php';
	}


	/**
	 * Add our fields to the screen options toggle
	 *
	 * @param array $columns Menu item columns
	 * @return array
	 */
	public static function _columns( $columns ) {
		$columns = array_merge( $columns, self::$fields );

		return $columns;
	}
 }

