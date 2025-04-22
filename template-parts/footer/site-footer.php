<?php
/**
 * 
 * Render the TUMO International Footer
 */

//Get footer type 
$footer_type = get_theme_mod('tumo_int_footer_type', 'layout-1'); 

//Define footer classes
$footer_classes = 'ti-footer';

?>
<?php if( is_active_sidebar( 'footer-sidebar-top') && $footer_type == 'layout-1' ):?>
<div class="container-fluid ti-footer-slider-light">
    <?php if ( is_active_sidebar( 'footer-sidebar-top') ) : ?>
        <div class="ti-footer-layout--slider ti-footer-layout-<?=$layout?>--slider footer-slider-outer">
            <?php dynamic_sidebar( 'footer-sidebar-top' ); ?>
        </div>
    <?php endif;?>
</div>
<?php endif;?>
<footer class="<?=esc_attr($footer_classes);?>">

    <?php get_template_part( 'template-parts/footer/site-footer', $footer_type ); ?>

</footer>