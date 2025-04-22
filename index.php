<?php
    $banner = array(
        'isBanner' => true,
        'title' => esc_html__("Blog", 'tumo-international'),
        'type' => ''
    );

    $rendered = "<span>".esc_html__("Blog", 'tumo-international')."</span>";


    if(is_category() || is_author()){
        $banner['isBanner'] = true;
        $object = get_queried_object();
    }

    if(is_category()){

        $banner['title'] = $object->name;
        $banner['type'] = esc_html('Category', 'tumo-international');
        
        $rendered = $banner['type'] . ": <span>". $banner['title']."</span>";
        
    }

    if( is_author() ){
        $banner['title'] = $object->display_name;
        $banner['type'] = esc_html('Author', 'tumo-international');
        $rendered = $banner['type'] . ": <span>". $banner['title']."</span>";
    }
?>

<?php get_header();?>

<div class="tumo_int_blog">
    <?php if($banner['isBanner']):?>
    <div class="tumo_int_blog--banner">
        <div class="container">
            <h2 class="tumo_int_blog--banner--heading"><?=$rendered;?></h2>
        </div>
    </div>
    <?php endif;?>
    <div class="tumo_int_blog--inner">
        <div class="container">
            <div class="tumo_int_blog__wrap">
                <?php if( have_posts() ): ?>
                    <div class="tumo_int_blog__articles">
                        <div class="tumo_int_blog__articles--inside">
                            <?php
                                $isFirst = true;
                            ?>
                            <?php while( have_posts() ): 
                                the_post();
                                $className = $isFirst ? "tumo_int_blog_single-large" : ""; 
                                ?>
                                <div class="tumo_int_blog_single <?=esc_attr($className);?>">
                                    <a class="tumo_int_blog_single--link" href="<?=get_the_permalink();?>" title="<?=get_the_title();?>">
                                        <div class="tumo_int_blog_single--wrap">
                                            <div class="tumo_int_blog_single--wrap__thumbnail">
                                                <?php the_post_thumbnail();?>
                                            </div>
                                            <div class="tumo_int_blog_single--wrap__data">
                                                <h2 class="tumo_int_blog_single--wrap__heading"><?php the_title();?></h2>
                                                <p class="tumo_int_blog_single--wrap__meta"><?= get_the_date();?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php $isFirst = false; endwhile;?>
                            
                        </div>
       
                        <div class="tumo_int_blog__pagination">
                            <?php
                                the_posts_pagination(array(
                                    'mid_size'  => 2,
                                    'prev_text' => __('<'),
                                    'next_text' => __('>')
                                ));
                            ?>
                        </div>
     
                    </div>
                    
                <?php endif;?>
                <aside class="tumo_int_blog__sidebar tumo_int--sidebar">
                    <?php if ( is_active_sidebar( 'blog') ) : ?>
                        <?php dynamic_sidebar( 'blog' ); ?>
                    <?php endif;?>
                </aside>
            </div>
        </div>
    </div>  
</div>

<?php get_footer();?>