<?php get_header();?>

<div class="tumo_int_single">
    <?php if( have_posts() ): ?>
        <?php while( have_posts() ): the_post();?>
        <div class="tumo_int_single-header">
            <div class="tumo_int_single-header-wrap">
                <figure class="tumo_int_single-header-thumbnail">
                    <?php the_post_thumbnail();?>
                </figure>
                <div class="tumo_int_single-header-info">
                    <div class="container">
                        <div class="tumo_int_single-header-info-title">
                            <?php the_title('<h1>', '</h1>');?>
                        </div>
                        <div class="tumo_int_single-header-info-meta">
                            <?php
                                $categories_list = get_the_category_list(', ');
                            ?>
                            <?php if ($categories_list) :?>
                            <div class="tumo_int_single-header-info-meta-single">
                               <?php echo $categories_list; ?>
                            </div>
                            <?php endif;?>
                            
                            <div class="tumo_int_single-header-info-meta-single"><p>By <a href="<?=get_author_posts_url(get_the_author_meta('ID'));?>" title="<?= get_the_author();?>"><?php the_author();?></a></p></div>
                            <div class="tumo_int_single-header-info-meta-single"><p><?= get_the_date();?></p></div>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="tumo_int_single-content">
            <div class="container">
                <div class="tumo_int_single-content-wrap">
                    <div class="tumo_int_single-content-wrap--inside">
                        <article class="tumo_int_single-content-wrap-article">
                            <?php the_content();?>
                        </article>
                        <div class="tumo_int_single-content-wrap-navigation">

                            <div class="nav-single nav-previous">
                                <div class="nav-single-thumbnail">
                                    <?php echo get_the_post_thumbnail(get_adjacent_post(false, '', true), 'post-navigation-thumbnail'); ?>
                                </div>
                                <div class="nav-single-data">
                                    <span><?php esc_html_e('Previous Article', 'tumo-international'); ?></span>
                                    <?php previous_post_link('%link', '%title', true, '', 'category'); ?>
                                </div>
                            </div>

                            <div class="nav-single nav-next">
                                <div class="nav-single-thumbnail">
                                    <?php echo get_the_post_thumbnail(get_adjacent_post(false, '', false), 'post-navigation-thumbnail'); ?>
                                </div>
                                <div class="nav-single-data">
                                    <span><?php esc_html_e('Next Article', 'tumo-international'); ?></span>
                                    <?php next_post_link('%link', '%title', true, '', 'category'); ?>
                                </div>
                                
                               
                            </div>
                        </div>
                    </div>
                   
                    <aside class="tumo_int_single-content-wrap-sidebar tumo_int--sidebar">
                        <?php if ( is_active_sidebar( 'single-blog') ) : ?>
                            <?php dynamic_sidebar( 'single-blog' ); ?>
                        <?php endif;?>
                    </aside>
                </div>
            </div>
        </div>
        <?php endwhile;?>
    <?php endif;?>
</div>

<?php get_footer();?>