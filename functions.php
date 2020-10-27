<?php 
//adding css and js scripts
function load_scripts(){
    wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(). 'all');
    wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/css/main.css', array(). 'all');
    wp_enqueue_script('main', get_template_directory_uri().'/js/bootstrap.min.js','',false,true);
    wp_enqueue_script('jquery');
}

add_action('wp_enqueue_scripts', 'load_scripts');


// Theme Options
add_theme_support('menus');
//add featured image
add_theme_support('post-thumbnails');
//enable sidebar
add_theme_support('widgets');


// Menus
register_nav_menus(
    
        array(
            'top-menu' =>  'Top Menu Location',
            'mobile-menu' =>  'Mobile Menu Location',
            'footer-menu' =>  'Footer Menu Location',

        )

);


function hide_admin_bar(){ return false; }
add_filter( 'show_admin_bar', 'hide_admin_bar' );


// Custom Image Sizes
add_image_size('blog-large', 800, 400, true);
add_image_size('blog-small', 300, 200, true);


//register sidebar
function my_sidebars(){

    
        register_sidebar(

            array(

                'name' => 'Page Sidebar',
                'id' => 'page-sidebar',
                'before_title'=> '<h4 class="widget-title">',
                'after_title'=> '</h4> ',
            )
         );



         
        register_sidebar(

            array(

                'name' => 'Blog Sidebar',
                'id' => 'blog-sidebar',
                'before_title'=> '<h4 class="widget-title">',
                'after_title'=> '</h4> ',
            )
         );
}

add_action('widgets_init', 'my_sidebars');


// adding custom type
function my_first_post_type() {

        $args = array(
            'labels'=> array(
                'name' => 'Cars',
                'singular_name'> 'Car',
            ),
            'hierarchical' => true,
            'public' => true,
            'menu_icon' => 'dashicons-store',
            'has_archive'=> true,
            'supports'=> array('title', 'editor', 'thumbnail'),
            // 'rewrrite' => array('slug' => 'my-cars')
        );

        register_post_type('cars', $args);
}
// load up on first bootup
add_action('init', 'my_first_post_type');



function my_first_taxonomy(){ 

    $args = array(
        'labels'=> array(
            'name' => 'Brands',
            'singular_name'> 'Brand',
        ),
        'public' => true,
        'hierarchical' =>  true,
    );

    register_taxonomy('brands', array('cars'), $args);


}

add_action('init', 'my_first_taxonomy');

?>