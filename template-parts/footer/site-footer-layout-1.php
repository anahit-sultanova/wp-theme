<?php
/**
 * Footer, Layout 1
 * 
*/

$layout = 1;

$footer_logo = get_theme_mod('tumo_int_footer_logo', 'https://placehold.co/130x35');
$footer_international_logo = get_theme_mod('tumo_int_footer_company_logo', '');
$footer_international_alt =  get_theme_mod('tumo_int_footer_company_logo_alt', '');
$footer_paragraph = get_theme_mod('tumo_int_footer_paragraph', '');
$footer_copyright = get_theme_mod('tumo_int_footer_copyright', '');
$show_social_icons  = get_theme_mod('tumo_int_footer_social_icons_show', '');
$footer_menu_location = 'footer_social_menu';
?>

<div class="container-fluid ti-footer-layout-<?= $layout ?> ti-footer-layout">
    <div class="ti-footer-layout-1-inside ti-footer-layout-inside">
        <div class="ti-footer-layout-<?= $layout ?>--top ti-footer-layout--top ">
            <div class="row justify-content-between">
                <!------ Column of Logo & Socials -->
                <div class="col-lg-4 order-2 order-lg-1">
                    <!-- Brand / Logo -->
                    <div class="ti-footer-layout-<?= $layout ?>--brand-area ti-footer-layout--brand-area">
                        <img src="<?= esc_url($footer_logo) ?>" alt="TUMO">
                        <p><?= apply_filters('wpml_translate_single_string', $footer_paragraph, 'Tumo International Theme', 'Footer Paragraph'); ?></p>
                    </div>
                    <!-- Social Icons -->
                    <?php if ($show_social_icons): ?>
                        <div class="ti-footer-layout-<?= $layout ?>--social-area ti-footer-layout--social-area">
                            <?php $menu_items = tumo_int_get_menu_by_location($footer_menu_location);

                            if ($menu_items): ?>
                                <ul class="ti-social-links">
                                    <?php
                                    foreach ($menu_items as $menu_item) {
                                        $menu_item_id    = $menu_item->ID;
                                        $menu_item_title = $menu_item->title;
                                        $menu_item_url   = $menu_item->url;
                                    ?>
                                        <li>
                                            <a href="<?= esc_url($menu_item_url) ?>" title="<?= $menu_item_title; ?>" target="_blank">
                                                <?= tumo_int_get_social_link_svg($menu_item_url, 30); ?>
                                            </a>
                                        </li>
                                    <?php
                                    } ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!------ Column of Footer's 4 sections -->
                <div class="col-lg-6 order-1 order-lg-2 mb-5 mb-lg-0">
                    <div class="row gy-4">
                        <?php 
                        $active_sidebars = [];

                        for ($i = 1; $i <= 4; $i++) {
                            if (is_active_sidebar('footer-sidebar-' . $i)) {
                                $active_sidebars[] = $i;
                            }
                        }

                        $col_class = 'col-xl-' . (12 / count($active_sidebars)) . ' col-sm-6 col-12 d-flex justify-content-lg-start justify-content-start';

                        foreach ($active_sidebars as $i): ?>
                            <div class="<?= $col_class ?>">
                                <aside class="ti-footer-layout-<?= $layout ?>--widget-area ti-footer-layout--widget-area">
                                    <?php dynamic_sidebar('footer-sidebar-' . $i); ?>
                                </aside>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!------ Column of International Logo -->
                <?php if ($footer_international_logo) : ?>
                    <div class="col-lg-2 order-3">
                        <div class="ti-footer-layout-<?= $layout ?>--company-area ti-footer-layout--company-area text-right text-left">
                            <img src="<?= esc_url($footer_international_logo) ?>" alt="<?= $footer_international_alt ?>">
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="ti-footer-layout-<?= $layout ?>--bottom ti-footer-layout--bottom">
            <div class="row">
                <div class="col-sm-6 order-2 order-sm-1">
                    <p class="ti_copyright"><?= esc_html($footer_copyright); ?></p>
                </div>
                <div class="col-sm-6 order-1 order-sm-2 mb-1 mb-sm-0 d-flex justify-content-end">
                    <?php if (is_active_sidebar('footer-sidebar-bottom')) : ?>
                        <?php dynamic_sidebar('footer-sidebar-bottom'); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>