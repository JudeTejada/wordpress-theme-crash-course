<!-- SHORTCODE TO DISPLAY POSTS ON CARS-->
<?php 

    $args = [
            'post_type' => 'Cars',
            // filter out that's going to show
            // 'meta_key' => 'color',
            // 'meta_value' => 'white'

    ];

    $query = new WP_Query($args);

?>


<?php 
    //check cars has posts
    if( $query->have_posts() ) : ?>

      
        <?php
           // loop through post and display
         while( $query-> have_posts() ) : $query-> the_post();?>
        <div class="card mb-3">

        <?php
    //check if it has featured image
    if(has_post_thumbnail()): ?>
            
    <img src="<?php the_post_thumbnail_url('blog-large'); ?>" alt="<?php the_title(); ?>" class="img-fluid mb-3 img-thumbnail">
    <?php endif;?>



          <h3><?php the_title();?></h3>  
          <?php the_field('registration')?>


        </div>


        <?php endwhile;?>


<?php endif;?>


