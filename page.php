<!--  A Template Fil-->

<?php  get_header();?>


<section class="page-wrap">
<div class="container">

    <section class="row"> 


    <div class="col-lg-3">
    <?php 
        //check if header exist
    if ( is_active_sidebar('page-sidebar') ) : ?>
        
        <?php 
            //render sidebar using id we set on our functions file
        dynamic_sidebar('page-sidebar');?>

    <?php endif;?>

    </div>


    <div class="col-lg-9">
    <h1>  <?php the_title();?> </h1>


    <?php   get_template_part('includes/section', 'content');?>
    </div>
   


    



    </section>
  

</div>
</section>



<?php  get_footer();?>