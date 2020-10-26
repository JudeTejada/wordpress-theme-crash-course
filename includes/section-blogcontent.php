<?php 
    if( have_posts() ) :
        while( have_posts() ):
            the_post(); ?>

    <?php  
            $fname = get_the_author_meta('first_name');
            $lname = get_the_author_meta('last_name');         
   ?>

    <span>
  Posted by:   <?php  echo $fname;?> <?php  echo $lname;?>
    </span>
    <span>
        <?php echo get_the_date();?>
    </span>
            
            <span>


            
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


    <?php comments_template() ?>


  <?php endwhile; else: endif ?>


  