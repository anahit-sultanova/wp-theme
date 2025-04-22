<?php

$stickyTEXT = get_theme_mod('tumo_int_sticky_button_text', '');
$stickyURL = get_theme_mod('tumo_int_sticky_button_url', '');

$render = ($stickyTEXT && $stickyURL);

if($render):
?>
<a href="<?=esc_url($stickyURL )?>" class="tumo_int_sticky_btn" target="_blank">
    <span class="tumo_int_sticky_btn_content"><?=esc_html($stickyTEXT);?></span>
</a>
<?php
endif;