<?php

/**
 * Custom walker for primary menu.
 * The main functionality i adding the bootstrap classes to li and a element
 * 
 */


class TI_Nav_Walker extends Walker_Nav_Menu {
    private $current_item;
    private $dropdown_menu_alignment_values = [
      'dropdown-menu-start',
      'dropdown-menu-end',
      'dropdown-menu-sm-start',
      'dropdown-menu-sm-end',
      'dropdown-menu-md-start',
      'dropdown-menu-md-end',
      'dropdown-menu-lg-start',
      'dropdown-menu-lg-end',
      'dropdown-menu-xl-start',
      'dropdown-menu-xl-end',
      'dropdown-menu-xxl-start',
      'dropdown-menu-xxl-end'
    ];
  
    function start_lvl(&$output, $depth = 0, $args = null)
    {
      $dropdown_menu_class[] = '';
      foreach($this->current_item->classes as $class) {
        if(in_array($class, $this->dropdown_menu_alignment_values)) {
          $dropdown_menu_class[] = $class;
        }
      }
      $indent = str_repeat("\t", $depth);
      $submenu = ($depth > 0) ? ' sub-menu' : '';
      $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ",$dropdown_menu_class)) . " depth_$depth\">\n";
    }
  
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
      $this->current_item = $item;
  
      $indent = ($depth) ? str_repeat("\t", $depth) : '';
  
      $li_attributes = '';
      $class_names = $value = '';
  
      $classes = empty($item->classes) ? array() : (array) $item->classes;
  
      $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
      $classes[] = 'nav-item';
      $classes[] = 'nav-item-' . $item->ID;
      if ($depth && $args->walker->has_children) {
        $classes[] = 'dropdown-menu dropdown-menu-end';
      }
  
      $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
      $class_names = ' class="' . esc_attr($class_names) . '"';
  
      $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
      $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';
  
      $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';
  
      $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
      $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
      $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
      $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
  
      $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
      $nav_link_class = ( $depth > 0 ) ? 'dropdown-item ' : 'nav-link ';
      $attributes .= ( $args->walker->has_children ) ? ' class="'. $nav_link_class . $active_class . ' dropdown-toggle parent-menu" aria-haspopup="true" aria-expanded="true"' : ' class="'. $nav_link_class . $active_class . '"';

      $item_output = $args->before;
      $item_output .= '<a' . $attributes . '>';
      $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
      $item_output .= ( $args->walker->has_children ) ? '<svg class="dropdown-icon-svg" width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M10.6568 1L5.99999 4.65685L1.34314 1" stroke="#FEFEFE" stroke-width="2" stroke-linecap="round"/>
      </svg></a>' : '</a>';
      $item_output .= $args->after;
  
      $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}