
<?php 
/**
 *Template Name: Contact Us 
 */




?>

<?php  get_header();?>

<section class="page-wrap">
</section>


<div class="container">
    <h1>
        <?php the_title();?>
    </h1>


        <div class="row">
             <div class="col-lg-6">
                Contact Form
             </div>
             <div class="col-lg-6">
             <?php get_template_part('includes/section', 'content');?>
             </div>
        
        
        </div>


<div>

</div>
   
</div>


<?php  get_footer();?>