<?php
/**
 * 
 * Render the main TUMO International Header
 */

 $header_class = 'ti_site-header';
 $header_class .= has_custom_logo() ? 'has-logo' : '';


 ?>



<header id="ti_site-header" class="ti_site_header">
    <div class="ti_site_header-ins">
       <nav class="navbar navbar-expand-xl">
            <div class="container-fluid">
                <!--Branding-->
                <?php if ( has_custom_logo() ) : ?>
                    <?php the_custom_logo(); ?>
                <?php endif; ?>
                <!--Toggler-->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#tumo_ti_navbarContent" aria-controls="tumo_ti_navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="ti_toggler-icon"></span>
                </button>
                <!--Menu-->
                <div class="collapse navbar-collapse ti_site_header-collapse justify-content-end" id="tumo_ti_navbarContent">
                    <?php

                        wp_nav_menu(
                            array(
                                'theme_location'  => 'primary',
                                'menu_class'      => 'navbar-nav',
                                'container_class' => 'primary-menu-container',
                                'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
                                'fallback_cb'     => false,
                                'walker'          => new TI_Nav_Walker(),
                            )
                        );

                        wp_nav_menu(
                            array(
                                'theme_location'  => 'languages',
                                'menu_class'      => 'navbar-nav',
                                'container_class' => 'primary-menu-languages',
                                'items_wrap'      => '<ul id="languages-menu-list" class="%2$s">%3$s</ul>',
                                'fallback_cb'     => false,
                                'walker'          => new TI_Nav_Walker(),
                            )
                        );
                       
                    ?>
                </div>
            </div>
       </nav> 
    </div>
</header>