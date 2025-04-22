<?php

/**
 * Load text domain
 */
function tumo_int_load_textdomain() {
    load_theme_textdomain('tumo-international', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'tumo_int_load_textdomain');

/**
 * Theme main Functions
 */
if(!function_exists('tumo_int_setup')){
    function tumo_int_setup(){
       add_theme_support( 'title-tag' );
       /**
        * Enable support for Post and Pages Thumbnail
        */
       add_theme_support( 'post-thumbnails' );

       /**
        * Register navigation menus 
        */
        register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'tumo-international' ),
				'languages' => esc_html__( 'Translation menu', 'tumo-international' ),
                'footer_social_menu' => esc_html__( 'Social Menu Footer', 'tumo-international' ),
				'footer'  => esc_html__( 'Secondary menu', 'tumo-international' ),
			)
		);
   
       /*
       * Add support for core custom logo.
       *
       */
       $logo_width  = 300;
       $logo_height = 100;
   
       add_theme_support(
           'custom-logo',
           array(
               'height'               => $logo_height,
               'width'                => $logo_width,
               'flex-width'           => true,
               'flex-height'          => true,
               'unlink-homepage-logo' => true,
           )
       );

       /**
        * Image sizes
        */
        add_image_size('footer-slider-size', 300, 150, false);

        add_image_size('post-navigation-thumbnail', 100, 100, true);
   
    }
}

add_action( 'after_setup_theme', 'tumo_int_setup' );

/**
 * Enqueue custom scripts and styles
 * 
 */

if(!function_exists('tumo_int_scripts')){
    function tumo_int_scripts(){
        //Main stylesheet
        wp_enqueue_style('tumo_int_main_stylesheet', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
        //Register bootstrap scripts
        wp_enqueue_script(
            'tumo_int_popper',
            get_template_directory_uri() . '/assets/js/popper.min.js',
            array(),
            wp_get_theme()->get( 'Version' ),
            true
        );
        wp_enqueue_script(
            'tumo_int_bootstrap',
            get_template_directory_uri() . '/assets/js/bootstrap.min.js',
            array(),
            wp_get_theme()->get( 'Version' ),
            true
        );
        // Register additional scripts
        wp_enqueue_script( 
            'tumo_int-main-js', 
            get_template_directory_uri().'/assets/js/main.js', 
            array('jquery'), 
            '', 
            true 
        );
    }
}

add_action( 'wp_enqueue_scripts', 'tumo_int_scripts' );

/**
 * Allow SVG upload
 */
if( !function_exists('tumo_ti_cc_mime_types') )
{
    function tumo_ti_cc_mime_types($mimes) {
        $mimes['svg'] = 'image/svg+xml'; 
        return $mimes;
    }
}
add_filter('upload_mimes', 'tumo_ti_cc_mime_types'); 

/**
 * Adding primary color sectiin in Customizer
 */

require_once get_template_directory() . '/classes/class-tumo-international-theme-settings.php';
new TUMO_International__theme_settings_cutomizer();

/**
 * Adding footer section in Customizer
 */
require_once get_template_directory() . '/classes/class-tumo-international-footer-settings.php';
new TUMO_International__footer_settings_cutomizer();




add_action('wp_head', 'tumo_int_custom_theme_customize_css');
  
/**
 * Adding custom walker for primary menu navigation 
 * 
 */

 require_once get_template_directory() . '/classes/class-tumo-international-navigation-walker.php';
 require_once get_template_directory() . '/classes/class-tumo-international-social-walker.php';

 /**
  * Add classname to logo link 
  */

function tumo_int_change_logo_class( $html ) {

    
    $html = str_replace( 'custom-logo-link', 'navbar-brand', $html );
    $html = str_replace( 'custom-logo', 'tumo_int_brand', $html );
    return $html;
}


add_filter( 'get_custom_logo', 'tumo_int_change_logo_class' );


require_once get_template_directory() . '/classes/class-tumo-international-svg-icons.php';

function tumo_int_get_social_link_svg( $uri, $size = 24 ) {
	return TUMO_Int_SVG_Icons::get_social_icon_svg( $uri, $size );
}
/**
 * 
 * Get menu by location
 * 
 */
if( !function_exists('tumo_int_get_menu_by_location') ){
    function tumo_int_get_menu_by_location( $theme_location ) {
        $theme_locations = get_nav_menu_locations();
        $menu_obj = get_term( $theme_locations[ $theme_location ], 'nav_menu' );
        if ( $menu_obj )
            return wp_get_nav_menu_items( $menu_obj->term_id );
        else
            return $menu_obj;
    }
}

/**
 * Sidebars
 * 
 */
if(!function_exists('tumo_int_widgets_init')) {
    function tumo_int_widgets_init(){
        register_sidebar(
            array(
                'name' => esc_html__('Footer ', 'tumo-international'),
                'id' => 'footer-sidebar-1',
                'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'tumo-international' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>'
            )
        );


        register_sidebar(
            array(
                'name' => esc_html__('Footer 2', 'tumo-international'),
                'id' => 'footer-sidebar-2',
                'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'tumo-international' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>'
            )
        );

        register_sidebar(
            array(
                'name' => esc_html__('Footer 3', 'tumo-international'),
                'id' => 'footer-sidebar-3',
                'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'tumo-international' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>'
            )
        );

        register_sidebar(
            array(
                'name' => esc_html__('Footer 4', 'tumo-international'),
                'id' => 'footer-sidebar-4',
                'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'tumo-international' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>'
            )
        );

        register_sidebar(
            array(
                'name' => esc_html__('Footer Bottom', 'tumo-international'),
                'id' => 'footer-sidebar-bottom',
                'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'tumo-international' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>'
            )
        );

        register_sidebar(
            array(
                'name' => esc_html__('Footer Top', 'tumo-international'),
                'id' => 'footer-sidebar-top',
                'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'tumo-international' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>'
            )
        );

        register_sidebar(
            array(
                'name' => esc_html__('Blog', 'tumo-international'),
                'id' => 'blog',
                'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'tumo-international' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>'
            )
        );


        register_sidebar(
            array(
                'name' => esc_html__('Single Blog', 'tumo-international'),
                'id' => 'single-blog',
                'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'tumo-international' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>'
            )
        );




        
     }
}

add_action( 'widgets_init', 'tumo_int_widgets_init' );

/**
 * Adding social menu walker
 */
function tumo_int_social_menu_icons($items, $args){
    $hasCheckedItem = false;

    foreach ($items as $item) {
        $social_icon_checked = get_post_meta($item->ID, '_menu_item_social_icon', true);
        if ($social_icon_checked) {
            //$item->post_title
            
            $hasCheckedItem = true;
            $item->title = tumo_int_get_social_link_svg($item->url, 25);
            $item->attr_title = $item->post_title;
            $item->classes = ['tumocore_social_icon_link'];
        }
        
    }
    if($hasCheckedItem)  $args->menu_class = 'ti_social-nav';

    return $items;

}
add_filter('wp_nav_menu_objects', 'tumo_int_social_menu_icons', 10, 2);

function tumocore_label_menu_items( $atts, $item, $args, $depth ) {
    
    $empty_href   = ( ! isset( $atts[ 'href' ] ) || $atts[ 'href' ] === '#' || $atts[ 'href' ] === '' );
    $has_children = ( is_array( $item->classes ) && in_array( 'menu-item-has-children', $item->classes ) );

    $social_icon_checked = get_post_meta($item->ID, '_menu_item_social_icon', true);
    

    
    // If href is essentially empty, and the item has children,
    // add an aria label noting that this is a menu
    if ( $social_icon_checked ) {
        $atts[ 'aria-label' ] = strip_tags( $item->post_title );
    }
    
    return $atts;
}

add_filter( 'nav_menu_link_attributes', 'tumocore_label_menu_items', 10, 4 );

function tumo_int_get_menu_location_by_id($menu_id) {

    $menu_locations = get_nav_menu_locations();


    foreach ($menu_locations as $location => $id) {

        if ($id == $menu_id) {
            return $location;
        }
    }

    return false;
}

/**
 * Adding lazyload
 */
if( !function_exists('tumo_int_remove_src_add_lazyload') ){
    function tumo_int_remove_src_add_lazyload($content) {
        if ( empty( $content ) ) {
            return $content;
        }

        $dom = new DOMDocument();
        libxml_use_internal_errors( true );
        $dom->loadHTML('<?xml encoding="UTF-8">' . $content);
        libxml_clear_errors();

        foreach ( $dom->getElementsByTagName( 'img' ) as $img ) {
            if ( $img->hasAttribute( 'sizes' ) && $img->hasAttribute( 'srcset' ) ) {
                $sizes_attr = $img->getAttribute( 'sizes' );
                $srcset     = $img->getAttribute( 'srcset' );
                $img->setAttribute( 'data-sizes', $sizes_attr );
                $img->setAttribute( 'data-srcset', $srcset );
                $img->removeAttribute( 'sizes' );
                $img->removeAttribute( 'srcset' );

                $src = $img->getAttribute( 'src' );
                if ( ! $src ) {
                    $src = $img->getAttribute( 'data-noscript' );
                }
            }else {
                if( !$img->hasAttribute( 'data-src' ) ){
                    $src = $img->getAttribute( 'src' );
                    if ( ! $src ) {
                        $src = $img->getAttribute( 'data-noscript' );
                    }
                    $img->setAttribute( 'data-src', $src );
                }
                
            }
            $classes = $img->getAttribute( 'class' );
            $classes .= " lazyload";
            $img->setAttribute( 'class', $classes );

            $smallsrc = $img->getAttribute( 'data-srcset' );
            // Target size
            $targetSize = "225x150";
            $pattern = '/\b(?:https?:\/\/)?[^,\s]+-' . preg_quote($targetSize, '/') . '\.\w+\b/i';

            // Match the URL with the target size and any image format
            preg_match($pattern, $smallsrc, $matches);

            // Output the matched URL
            if (!empty($matches)) {
                $matchedURL = $matches[0];

                $img->setAttribute( 'src', $matchedURL);
                
            }else {
                $img->removeAttribute( 'src' );
            }
            

            $noscript      = $dom->createElement( 'noscript' );
            $noscript_node = $img->parentNode->insertBefore( $noscript, $img );
            $noscript_img  = $dom->createElement( 'IMG' );
            $noscript_img->setAttribute( 'class', $classes );

            $new_img = $noscript_node->appendChild( $noscript_img );
            $new_img->setAttribute( 'src', $src );
            $content = $dom->saveHTML();
        }
        
        return $content;

    }
}

add_filter('the_content', 'tumo_int_remove_src_add_lazyload', 20);



/**
 * 
 * Add primary color into the head secton
 */

 if( !function_exists('tumo_int_custom_theme_customize_css') ){
    function tumo_int_custom_theme_customize_css() {
        $primaryRGB = apply_filters('tumocore_hex_to_rgb', get_theme_mod('tumo_int_primary_color', '#ff0000'));
        ?>
        <style type="text/css">
            :root {
                --tumo-int-logo-width: <?php echo get_theme_mod('tumo_int_logo_width', '300'); ?>px; 
                --tumo-int-primary-color: <?php echo get_theme_mod('tumo_int_primary_color', '#ff0000'); ?>;
                --tumo-int-primary-color-rgb: <?=$primaryRGB['r']?>, <?=$primaryRGB['g']?>, <?=$primaryRGB['b']?>;
                --tumo-int-footer-bg: <?php echo get_theme_mod('tumo_int_footer_bg', '#000000'); ?>;
                --tumo-int-footer-color: <?php echo get_theme_mod('tumo_int_footer_color', '#ffffff'); ?>;
                --tumo-int-footer-social-icon-color: <?php echo get_theme_mod('tumo_int_footer_icon_color', '#ffffff'); ?>;
                --tumo-int-footer-social-icon-hover-color: <?php echo get_theme_mod('tumo_int_footer_icon_hover_color', '#e2e2e2'); ?>;
                --tumo-int-footer-secondary-color: <?php echo get_theme_mod('tumo_int_footer_color_secondary', '#e2e2e2'); ?>;
                --tumo-int-footer-border-color: <?php echo get_theme_mod('tumo_int_footer_color_border', '#595959'); ?>;
                --tumo-int-footer-width: <?php echo get_theme_mod('tumo_int_footer_logo_width', '130'); ?>px;
                --tumo-int-footer-spacing: <?php echo get_theme_mod('tumo_int_footer_container_spacing', '23'); ?>px;
                --tumo-int-footer-company-width: <?php echo get_theme_mod('tumo_int_footer_company_logo_width', '250'); ?>px;
                --tumo-int-primary-color-sticky-badge: url("data:image/svg+xml,%3Csvg width='73' height='74' viewBox='0 0 73 74' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M72.6 0V34.2V74H0C0 54.5 10.6 34.2 35.4 34.2H44.3C64.2 34.2 72.6 15.7 72.6 0Z' fill='%23<?php echo strtoupper(substr( get_theme_mod('tumo_int_primary_color', '#ff0000'), 1 ) ); ?>'/%3E%3C/svg%3E%0A");

                <?php foreach(TUMO_International__theme_settings_cutomizer::$_focusarea as $key => $defaultColor): 
                    $property = 'tumo_int_' . $key;
                ?>
                --tumo-int-<?=$key?>-color: <?php echo get_theme_mod($property, $defaultColor); ?>;
                <?php endforeach;?>  
            }
        </style>
        <?php
    }
}

/**
 * 
 * Add FocusArea field for Category
 * 
 */

function tumo_int_focusarea_edit_field($tag){
    $is_parent = ($tag->parent == 0) ? true : false;
    if($is_parent):
        $value = get_term_meta($tag->term_id, 'cat_focusarea', true);
    ?>
    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="cat_focusarea"><?php _e('Category Focus Area'); ?></label>
        </th>
        <td>
            <select name="cat_focusarea" id="cat_focusarea">
                <option value="">Choose...</option>
                <?php foreach(TUMO_International__theme_settings_cutomizer::$_focusarea as $key => $area): $property = 'tumo_int_' . $key;?>
                    <option value="<?=esc_attr($key);?>" <?php selected('tumo_int_' . $value, $property); ?>>
                        <?= esc_html( TUMO_International__theme_settings_cutomizer::$_focusarea_label[$key] );?>
                    </option>
                <?php endforeach;?>
            </select>
        </td>
    </tr>
    <?php
    endif;
}



function tumo_int_focusarea_add_field(){
    $is_parent = ($tag->parent == 0) ? true : false;
    if($is_parent):
        $value = get_term_meta($tag->term_id, 'cat_focusarea', true);
    ?>
    <div class="form-field">
        <label for="cat_focusarea"><?php _e('Category Focus Area'); ?></label>
        <select name="cat_focusarea" id="cat_focusarea">
            <option value="">Choose...</option>
            <?php foreach(TUMO_International__theme_settings_cutomizer::$_focusarea as $key => $area): $property = 'tumo_int_' . $key;?>
                <option value="<?=esc_attr($key);?>" <?php selected($value, $property); ?>>
                    <?= esc_html( TUMO_International__theme_settings_cutomizer::$_focusarea_label[$key] );?>
                </option>
            <?php endforeach;?>
        </select>
    </div>
    <?php
    endif;
}

function tumo_int_focusarea_save_data($term_id){

    if(isset( $_POST['cat_focusarea'] )){
        update_term_meta($term_id, 'cat_focusarea', $_POST['cat_focusarea']);
    }
}

add_action( 'portfolio_category_add_form_fields', 'tumo_int_focusarea_add_field');
add_action( 'portfolio_category_edit_form_fields', 'tumo_int_focusarea_edit_field');
add_action( 'edited_portfolio_category', 'tumo_int_focusarea_save_data');
add_action( 'created_portfolio_category', 'tumo_int_focusarea_save_data');



function tumocore_modify_controls( $controls_registry ) {
	// First we get the fonts setting of the font control
	$fonts = $controls_registry->get_control( 'font' )->get_settings( 'options' );


	// Then we append the custom font family in the list of the fonts we retrieved in the previous step
	$new_fonts = array_merge( 
		[ 'Fedra Sans' => 'system' ], 
		[ 'Maax Sans' => 'system' ],
		$fonts );
	// Then we set a new list of fonts as the fonts setting of the font control
	$controls_registry->get_control( 'font' )->set_settings( 'options', $new_fonts );


}
add_action( 'elementor/controls/controls_registered', 'tumocore_modify_controls', 10, 1 );

function tumocore_hex_to_rgb($hex){
    $hex      = str_replace('#', '', $hex);
    $length   = strlen($hex);
    $rgb['r'] = hexdec($length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1), 2) : 0));
    $rgb['g'] = hexdec($length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1), 2) : 0));
    $rgb['b'] = hexdec($length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1), 2) : 0));

    return $rgb;
}

add_filter('tumocore_hex_to_rgb', 'tumocore_hex_to_rgb');

function tumocore_change_select_def_field($content){
    $cf7_select_defvalue = get_theme_mod('tumo_int_contact_select_blank_text', '');
    if($cf7_select_defvalue){
        $content = str_replace('&#8212;Please choose an option&#8212;', $cf7_select_defvalue, $content);
    }
    return $content;
}

add_filter('wpcf7_form_elements', 'tumocore_change_select_def_field');



/**
 * Adding social checkbox to menu nav
 */
require_once get_template_directory() . '/classes/class-tumo-international-add-social-icon-to-menu.php';
new TUMO_International__cutomizer_social_icon_navmenu();


/**
 * 
 * Translations 
 */


function tumo_int__register_footer_paragraph_for_wpml() {
    $footer_paragraph = get_theme_mod('tumo_int_footer_paragraph', '');
    
    if ($footer_paragraph) {
        do_action('wpml_register_single_string', 'Tumo International Theme', 'Footer Paragraph', $footer_paragraph);
    }
}
add_action('customize_save_after', 'tumo_int__register_footer_paragraph_for_wpml');


/** UPDATE CHECKER */
require 'plugin-update-checker/plugin-update-checker.php';

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/anahit-sultanova/wp-theme/',
	__FILE__, 
	'wp-theme'
);

$myUpdateChecker->setBranch('main');
$myUpdateChecker->getVcsApi()->enableReleaseAssets('/\.zip($|[?&#])/i');
$myUpdateChecker->setAuthentication('__GITHUB_PAT__');