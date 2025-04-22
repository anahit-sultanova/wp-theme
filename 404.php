<?php get_header();?>

<div class="not-found-page">
    <div class="not-found-page--title">
        <h1><?php _e('404', 'tumo-international')?></h1>
        <p><?php _e('Page Not Found', 'tumo-international')?></p>
    </div>
    <div class="not-found-page--link">
        <a href="<?=home_url('/')?>" title="<?php bloginfo('name')?>"><?php _e('Home', 'tumo-international')?></a>
    </div>
</div>

<?php get_footer();?>