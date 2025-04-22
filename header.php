<?php
/**
 * The header.
 * 
 * 
 */

 ?>

<!doctype html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head();?>
</head>
<body  <?php body_class(); ?> >
    <?php wp_body_open(); ?>
    <div id="page" class="ti_website">
        <?php get_template_part( 'template-parts/header/site-header' ); ?>
        <div id="content" class="ti_website_content">
            <main id="main" class="ti_site-main">