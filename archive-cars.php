<?php 

/** ARCHIVE.PHP */
/*  It is the standard page template that WordPress will use whenever a all posts are visited. (Like an Instagram timeline) */

?>

<?php  get_header();?>


<section class="page-wrap">



<div class="container">

    <div class="row">
    
        <div class="col-lg-3">
        <?php 
        //check if header exist
    if ( is_active_sidebar('blog-sidebar') ) : ?>
        
        <?php 
            //render sidebar using id we set on our functions file
        dynamic_sidebar('blog-sidebar');?>

    <?php endif;?>

        </div>
        <div class="col-lg-9">

        <h1><?php echo single_cat_title();?></h1>
<?php  get_template_part('includes/section', 'archive');?>
        </div>
    
    </div>




<?php  previous_posts_link();?>
<?php  next_posts_link();?>


</div>
</section>

<?php  get_footer();?>