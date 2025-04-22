<?php

/**
 * Custom walker for social menu.
 * The main functionality is to change the social links to icons
 * 
 */

 class TI_Social_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null){
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"ti-social-menu\">\n";
    }
 }