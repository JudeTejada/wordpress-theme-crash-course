<!--  TEMPLATE FOR POST ON OUR BLOG-->

<?php  get_header();?>


<section class="page-wrap">
<div class="container">

    <?php
    //check if it has featured image
    if(has_post_thumbnail()): ?>
            
    <img src="<?php the_post_thumbnail_url('blog-large'); ?>" alt="<?php the_title(); ?>" class="img-fluid mb-3 img-thumbnail">
    <?php endif;?>

    <h1><?php the_title();?></h1>
    <?php 
    //pull our own theme file
    get_template_part('includes/section', 'blogcontent');?>




   
</div>
</section>

<?php  get_footer();?>