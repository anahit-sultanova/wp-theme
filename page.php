<?php get_header(); 

$elementor_page = get_post_meta( get_the_ID(), '_elementor_edit_mode', true ) ? true : false;


?>

<?php if ($elementor_page) :?>
    <?php
        if( have_posts() ){
            while( have_posts() ){
                the_post();

                the_content();
            }
        }
    ?>
<?php else:?>

    <div class="page-single">
        <div class="page-single-inside">
            <div class="page-single-banner">
                <div class="container">
                    <h1><?php the_title();?></h1>
                </div>
                
            </div>
            <article class="page-single-article">
                <div class="container">
                    <?php
                        if( have_posts() ){
                            while( have_posts() ){
                                the_post();

                                the_content();
                            }
                        }
                    ?>
                </div>
               
            </article>
        </div>
    </div>

<?php endif;?>

<?php get_footer();?>