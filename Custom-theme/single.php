<?php
get_header('secondary');
?>
<div class="card-body d-flex justify-content-center align-items-center">
<section class="page-wrap">
<?php if(has_post_thumbnail()):?>
    
                    
<img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title();?>" class="img-fluid mb-3 img-thumbnail" >
<?php endif;?>
<div class="container">
    <h1><?php the_title();?></h1>
    <?php get_template_part('includes/section', 'cars'); ?>
    
    <?php wp_link_pages();?>

</div>
</section>
</div>
<?php get_footer();?>