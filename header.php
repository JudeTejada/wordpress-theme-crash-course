<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php  wp_head();?>
    
</head>
<body>

<header>

<div class="container">
<?php 
        wp_nav_menu(

            array(
                'top-menu' =>  'Top Menu Location',

                'menu_class' => 'top-bar'
            )

        );
    ?>
</div>

 

</header>
    






