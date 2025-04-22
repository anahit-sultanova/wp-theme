<?php

/**
 * Footer settings Class
 * 
 */

class TUMO_International__footer_settings_cutomizer
{
    public function __construct()
    {
        // Add customizer controls.
        add_action('customize_register', array($this, 'customizer_controls'));
    }


    /**
     * Registers customizer options.
     *
     */
    public function customizer_controls($wp_customize)
    {
        $wp_customize->add_section('tumo_int_theme_footer_settings', array(
            'title' => __('Footer Settings', 'tumo-international'),
            'priority' => 40,
        ));

        //================================================================================================


        // Add a setting for Footer Type
        $wp_customize->add_setting('tumo_int_footer_type', array(
            'default' => 'layout-1',
            'sanitize_callback' => 'sanitize_key',
        ));

        $wp_customize->add_control('tumo_int_footer_type', array(
            'label' => __('Select Footer Layout', 'tumo-international'),
            'section' => 'tumo_int_theme_footer_settings',
            'type' => 'radio',
            'choices' => array(
                'layout-1' => __('Layout 1', 'tumo-international'),
                'layout-2' => __('Layout 2', 'tumo-international'),
                'layout-3' => __('Layout 3', 'tumo-international')
            ),
        ));

        //================================================================================================

        // Add a setting for Footer Social icons show
        $wp_customize->add_setting('tumo_int_footer_social_icons_show', array(
            'default' => true,
            'transport' => 'refresh'
        ));

        // Add a control for Image Width setting
        $wp_customize->add_control('tumo_int_footer_social_icons_show', array(
            'label' => __('Show Social Icons', 'tumo-international'),
            'section' => 'tumo_int_theme_footer_settings',
            'type' => 'checkbox'
        ));

        //================================================================================================



        // Add a setting for the footer background color
        $wp_customize->add_setting('tumo_int_footer_bg', array(
            'default' => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        ));
        // Add a control for the footer bg setting
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tumo_int_footer_bg', array(
            'label' => __('Footer Background', 'tumo-international'),
            'section' => 'tumo_int_theme_footer_settings',
            'settings' => 'tumo_int_footer_bg',
        )));

        //================================================================================================

        // Add a setting for the footer text color
        $wp_customize->add_setting('tumo_int_footer_color', array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        ));
        // Add a control for the footer color setting
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tumo_int_footer_color', array(
            'label' => __('Footer Text Color', 'tumo-international'),
            'section' => 'tumo_int_theme_footer_settings',
            'settings' => 'tumo_int_footer_color',
        )));

        //================================================================================================

        // Add a setting for the footer text color
        $wp_customize->add_setting('tumo_int_footer_icon_color', array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        ));
        // Add a control for the footer color setting
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tumo_int_footer_icon_color', array(
            'label' => __('Footer Social Icon Color', 'tumo-international'),
            'section' => 'tumo_int_theme_footer_settings',
            'settings' => 'tumo_int_footer_icon_color',
        )));

        //================================================================================================

        // Add a setting for the footer text color
        $wp_customize->add_setting('tumo_int_footer_icon_hover_color', array(
            'default' => '#e2e2e2',
            'sanitize_callback' => 'sanitize_hex_color',
        ));
        // Add a control for the footer color setting
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tumo_int_footer_icon_hover_color', array(
            'label' => __('Footer Social Icon Hover Color', 'tumo-international'),
            'section' => 'tumo_int_theme_footer_settings',
            'settings' => 'tumo_int_footer_icon_hover_color',
        )));

        //================================================================================================




        //================================================================================================

        // Add a setting for the footer secondary color
        $wp_customize->add_setting('tumo_int_footer_color_secondary', array(
            'default' => '#e2e2e2',
            'sanitize_callback' => 'sanitize_hex_color',
        ));
        // Add a control for the footer color setting
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tumo_int_footer_color_secondary', array(
            'label' => __('Footer Secondary Color', 'tumo-international'),
            'section' => 'tumo_int_theme_footer_settings',
            'settings' => 'tumo_int_footer_color_secondary',
        )));

        //================================================================================================


        // Add a setting for the footer border color
        $wp_customize->add_setting('tumo_int_footer_color_border', array(
            'default' => '#595959',
            'sanitize_callback' => 'sanitize_hex_color',
        ));
        // Add a control for the footer color setting
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tumo_int_footer_color_border', array(
            'label' => __('Footer Border Color', 'tumo-international'),
            'section' => 'tumo_int_theme_footer_settings',
            'settings' => 'tumo_int_footer_color_border',
        )));

        //================================================================================================


        // Add a setting for Footer Logo
        $wp_customize->add_setting('tumo_int_footer_logo', array(
            'default' => 'https://placehold.co/130x35',
            'sanitize_callback' => 'esc_url_raw',
        ));

        // Add a control for Footer Logo setting
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'tumo_int_footer_logo', array(
            'label' => __('Footer Logo', 'tumo-international'),
            'section' => 'tumo_int_theme_footer_settings',
            'settings' => 'tumo_int_footer_logo',
        )));




        //================================================================================================


        // Add a setting for Footer logo Width
        $wp_customize->add_setting('tumo_int_footer_logo_width', array(
            'default' => '130',
            'sanitize_callback' => 'absint',
        ));

        // Add a control for Image Width setting
        $wp_customize->add_control('tumo_int_footer_logo_width', array(
            'label' => __('Logo Width', 'tumo-international'),
            'section' => 'tumo_int_theme_footer_settings',
            'type' => 'number',
            'input_attrs' => array(
                'min' => 100,
                'max' => 500,
                'step' => 5,
            ),
        ));

        //================================================================================================

        // Add a setting for Footer Paragraph
        $wp_customize->add_setting('tumo_int_footer_paragraph', array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post', // Sanitize as allowed HTML
        ));

        // Add a control for Paragraph setting
        $wp_customize->add_control('tumo_int_footer_paragraph', array(
            'label' => __('Custom Paragraph', 'tumo-international'),
            'section' => 'tumo_int_theme_footer_settings',
            'type' => 'textarea',
        ));

        //================================================================================================

        $wp_customize->add_setting('tumo_int_footer_container_spacing', array(
            'default' => '23',
            'sanitize_callback' => 'absint',
        ));

        // Add a control for Image Width setting
        $wp_customize->add_control('tumo_int_footer_container_spacing', array(
            'label' => __('Container Spacing', 'tumo-international'),
            'section' => 'tumo_int_theme_footer_settings',
            'type' => 'number',
            'input_attrs' => array(
                'min' => 0,
                'max' => 100,
                'step' => 1,
            ),
        ));

        //================================================================================================

        //================================================================================================

        // Add a setting for Footer Paragraph
        $wp_customize->add_setting('tumo_int_footer_copyright', array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post', // Sanitize as allowed HTML
        ));

        // Add a control for Paragraph setting
        $wp_customize->add_control('tumo_int_footer_copyright', array(
            'label' => __('Copyright text', 'tumo-international'),
            'section' => 'tumo_int_theme_footer_settings',
            'type' => 'textarea',
        ));

        //================================================================================================

        //================================================================================================

        $wp_customize->add_setting('tumo_int_footer_company_logo', array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'tumo_int_footer_company_logo', array(
            'label' => __('International Logo', 'tumo-international'),
            'section' => 'tumo_int_theme_footer_settings',
            'settings' => 'tumo_int_footer_company_logo',
        )));

        $wp_customize->add_setting('tumo_int_footer_company_logo_alt', array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control('tumo_int_footer_company_logo_alt', array(
            'label' => __('International Logo Alt Text', 'tumo-international'),
            'type' => 'text',
            'section' => 'tumo_int_theme_footer_settings',
            'settings' => 'tumo_int_footer_company_logo_alt',
        ));

        $wp_customize->add_setting('tumo_int_footer_company_logo_width', array(
            'default' => '250',
            'sanitize_callback' => 'absint',
        ));

        $wp_customize->add_control('tumo_int_footer_company_logo_width', array(
            'label' => __('International Logo Width', 'tumo-international'),
            'section' => 'tumo_int_theme_footer_settings',
            'type' => 'number',
            'input_attrs' => array(
                'min' => 100,
                'max' => 500,
                'step' => 5,
            ),
        ));
        //================================================================================================


    }
}
