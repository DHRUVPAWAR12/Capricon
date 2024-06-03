<?php
get_header('secondary');
?>
<section class="page-wrap">

    
<div class="container">
<h1><?php echo single_cat_title();?></h1>
<section class="row">
        <div class="col-lg-3">

 
                <?php if( is_active_sidebar('blog-sidebar')):?>
                    <?php dynamic_sidebar('blog-sidebar')?>
<?php endif;?>
</div>
<div class="col-lg-9">
    <?php get_template_part('includes/section', 'archive'); ?>

    <?php previous_posts_link();?>
    <?php next_posts_link();?>
    <?php wp_link_pages();?>
</div>
</section> 
</div>
</section>
<?php get_footer();?>
