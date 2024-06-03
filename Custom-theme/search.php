<?php
get_header('secondary');
?>
<section class="page-wrap">

    
<div class="container">

    <h1> search Results<?php echo get_search_query();?></h1>
    <?php get_template_part('includes/section','searchresults');?>
    <?php previous_posts_link();?>
    <?php next_posts_link();?>
    

</div>
</section>
<?php get_footer();?>