<?php 
    if( have_posts() ) :
        while( have_posts() ):
            the_post(); ?>

            <div class="card mb-3">
    
    

                <div class="card-body d-flex justify-content align-items-center">
                <?php
            //check if it has featured image
            if(has_post_thumbnail()): ?>
            
            <img src="<?php the_post_thumbnail_url('blog-small'); ?>" alt="<?php the_title(); ?>" class="img-fluid mb-3 img-thumbnail mr-3">
            <?php endif;?>
    

                <div class="blog-content">
                <h3><?php  the_title();?></h3>
                    <?php  the_excerpt();?>
                    <a href="<?php the_permalink(); ?>" class='btn btn-success'>Read Post</a>   
                </div>
                              
                </div>
            </div>


  <?php endwhile; else:  ?> 
        <h1>
            no result found for  <?php echo get_search_query();?>
        </h1>

      <?php  endif ?>


  