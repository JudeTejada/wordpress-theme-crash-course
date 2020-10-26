<?php 

/** ARCHIVE.PHP */
/*  It is the standard page template that WordPress will use whenever a all posts are visited. (Like an Instagram timeline) */

?>

<?php  get_header();?>


<section class="page-wrap">



<div class="container">


 

        <h1>Search Results  for <?php echo get_search_query();?></h1>
       <?php  get_template_part('includes/section', 'searchresult');?>

        <?php  previous_posts_link();?>
        <?php  next_posts_link();?>


</div>
</section>

<?php  get_footer();?>