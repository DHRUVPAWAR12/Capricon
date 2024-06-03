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
    
        <div class="row">
                    <div class="col-lg-6">
                            

                          <?php get_template_part('includes/section', 'content'); ?>
    
                          <?php wp_link_pages();?>
                    </div>
                    <div class="col-lg-6">
                        <ul>
                            <li>

                                Colour: <?php echo get_post_meta($post->ID,'Color', true);?>
                            </li>
                          

                            <?php if(get_post_meta($post->ID, 'Registration',true)):?>
                            <li>

                                Registration: <?php echo get_post_meta($post->ID,'Registration', true);?>

                            </li>
                            <?php endif;?>
                            <?php get_template_part('includes/form' , 'enquiry')?>
                        </ul>
                    </div>
        </div>

   

</div>
</section>
</div>
<?php get_footer();?>