<?php 
    if( have_posts() ) :
        while( have_posts() ):
            the_post(); ?>


            <!-- Get tags -->
            <?php
                  // Tags array
                  $tags = get_the_tags();
                  // Make sure tags exists
                  if($tags):
                  // Loop through the array
                  foreach($tags as $tag): ?>

                        <a class="badge badge-success" href="<?php echo get_tag_link( $tag->term_id );// grab link of the taG so we can maybe click and see an archive of all the posts associated to this tag ?>">
                              <?php echo $tag->name; ?>
                        </a>

                  <?php endforeach; endif;?>

    
    <?php  the_content(); ?>


    <?php 
        //get the category of  a post
        $categories = get_the_category();

        foreach($categories as $cat):?>

            <a href="<?php echo get_category_link($cat->term_id);?>">             <?php echo $cat->name;?>
</a>

    <?php endforeach; ?>





  <?php endwhile; else: endif ?>


  