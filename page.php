<!--  A Template Fil-->

<?php  get_header();?>


<section class="page-wrap">
</section>


<div class="container">
    <h1>
        <?php the_title();?>
    </h1>

<div>
<?php 
    //pull our own theme file
    get_template_part('includes/section', 'content');?>
</div>
   
</div>


<?php  get_footer();?>