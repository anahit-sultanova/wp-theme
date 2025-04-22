<?php
/**
 * Color Customizer Class
 * 
 */

class TUMO_International__theme_settings_cutomizer{

    public static $_focusarea = [
        'graphic_design'  => '#EF1141',
        'music'           => '#903292',
        '3d_modeling'     => '#737B34',
        'film'            => '#F1592A',
        'photo'           => '#0EACBA',
        'animation'       => '#F8A61A',
        'programming'     => '#A2A17A',
        'robotics'        => '#B65A45',
        'game'            => '#8AC541',
        'drawing'         => '#9D316D',
        'writing'         => '#c992ba',
        'web_dev'         => '#4b86c6',
        'motion_graphics' => '#c02130',
    ];

    public static $_focusarea_label = [
        'graphic_design'  => 'Graphic Design',
        'music'           => 'Music',
        '3d_modeling'     => '3D Modeling',
        'film'            => 'Filmmaking',
        'photo'           => 'Photography',
        'animation'       => 'Animation',
        'programming'     => 'Programming',
        'robotics'        => 'Robotics',
        'game'            => 'Game Development',
        'drawing'         => 'Drawing',
        'writing'         => 'Writing',
        'web_dev'         => 'Web Development',
        'motion_graphics' => 'Motion Graphics',
    ];

    public function __construct(){
        // Add customizer controls.
		add_action( 'customize_register', array( $this, 'customizer_controls' ) );

    }

    

    /**
	 * Registers customizer options.
	 *
	 */
    public function customizer_controls( $wp_customize ) {

        $wp_customize->add_section('tumo_int_theme_main_settings', array(
            'title' => __('Theme Main Settings', 'tumo-international'),
            'priority' => 30,
        ));

        // Add a setting for the primary color
        $wp_customize->add_setting('tumo_int_primary_color', array(
            'default' => '#ff0000',
            'sanitize_callback' => 'sanitize_hex_color', 
        ));

        // Add a control for the primary color setting
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tumo_int_primary_color', array(
            'label' => __('Primary Color', 'tumo-international'),
            'section' => 'tumo_int_theme_main_settings',
            'settings' => 'tumo_int_primary_color',
        )));

        // Add a setting for logo width
        $wp_customize->add_setting('tumo_int_logo_width', array(
            'default' => '300', // default width
            'sanitize_callback' => 'absint', // sanitize input as a positive integer
        ));

        // Add a control for the logo width setting
        $wp_customize->add_control('tumo_int_logo_width', array(
            'label' => __('Logo Width', 'tumo-international'),
            'section' => 'tumo_int_theme_main_settings',
            'type' => 'number',
        ));



        //================================================================================================

        // Add a setting for Footer Paragraph
        $wp_customize->add_setting('tumo_int_sticky_button_text', array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post', // Sanitize as allowed HTML
        ));

        // Add a control for Paragraph setting
        $wp_customize->add_control('tumo_int_sticky_button_text', array(
            'label' => __('Sticky Button Text', 'tumo-international'),
            'section' => 'tumo_int_theme_main_settings',
            'type' => 'text',
        )); 

        // Add a setting for Footer Paragraph
        $wp_customize->add_setting('tumo_int_sticky_button_url', array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post', // Sanitize as allowed HTML
        ));


        // Add a control for Paragraph setting
        $wp_customize->add_control('tumo_int_sticky_button_url', array(
            'label' => __('Sticky Button URL', 'tumo-international'),
            'section' => 'tumo_int_theme_main_settings',
            'type' => 'text',
        )); 

        foreach(self::$_focusarea as $key => $color){

            $property = 'tumo_int_' . $key;
            // Add a setting for the primary color
            $wp_customize->add_setting($property, array(
                'default' => $color,
                'sanitize_callback' => 'sanitize_hex_color', 
            ));

            // Add a control for the primary color setting
            $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $property, array(
                'label' => __(self::$_focusarea_label[$key], 'tumo-international'),
                'section' => 'tumo_int_theme_main_settings',
                'settings' => $property,
            )));
        }

        // Add a setting for Select Blank text
        $wp_customize->add_setting('tumo_int_contact_select_blank_text', array(
            'default' => 'Please choose an option',
            'sanitize_callback' => 'wp_kses_post', // Sanitize as allowed HTML
        ));

        // Add a control for Select Blank text
        $wp_customize->add_control('tumo_int_contact_select_blank_text', array(
            'label' => __('CF7 Select Blank text', 'tumo-international'),
            'section' => 'tumo_int_theme_main_settings',
            'type' => 'text',
        )); 



       
    

    }
}