<?php


class TUMO_International__cutomizer_social_icon_navmenu {
    
    public function __construct(){
        add_action('wp_nav_menu_item_custom_fields', [$this, 'add_social_icon_field'], 10, 4);
        add_action('wp_update_nav_menu_item', [$this, 'save_social_icon_menu_fields'], 10, 3);
    }

    public function add_social_icon_field($id, $item, $depth, $args){
        ?>
        <p class="field-social-icon description description-wide">
            <label for="menu-item-social-icon-<?php echo $id; ?>">
                <input type="checkbox" id="menu-item-social-icon-<?php echo $id; ?>" name="menu-item-social-icon[<?php echo $id; ?>]" value="1" <?php checked(get_post_meta($id, '_menu_item_social_icon', true), '1'); ?> />
                <?php _e('Social Icon', 'tumo-international'); ?>
            </label>
        </p>
        <?php
    }


    public function save_social_icon_menu_fields($menu_id, $menu_item_db_id, $menu_item_args) {
        if (isset($_REQUEST['menu-item-social-icon'][$menu_item_db_id])) {
            update_post_meta($menu_item_db_id, '_menu_item_social_icon', '1');
        } else {
            delete_post_meta($menu_item_db_id, '_menu_item_social_icon');
        }
    }

    
}