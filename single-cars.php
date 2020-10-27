<!--  TEMPLATE FOR POST ON OUR BLOG-->

<?php  get_header();?>


<section class="page-wrap">
<div class="container">
<h1><?php the_title();?></h1>
    <?php
    //check if it has featured image
    if(has_post_thumbnail()): ?>
            
    <img src="<?php the_post_thumbnail_url('blog-large'); ?>" alt="<?php the_title(); ?>" class="img-fluid mb-3 img-thumbnail">
    <?php endif;?>



        <div class="row">
        
            <div class="col-lg-6">
            
                <?php  get_template_part('includes/section', 'cars');?>

            </div>

            <div class="col-lg-6">

            
            <?php  get_template_part('includes/form', 'enquiry')?>
            
                    <ul>
                        <li> Color : <?php the_field('color');?></li>
                        <li> Registration : <?php the_field('registration');?></li>

                     
                    </ul>

            </div>

        </div>




   
</div>
</section>

<?php  get_footer();?>