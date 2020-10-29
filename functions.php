<?php 
//adding css and js scripts
function load_scripts(){
    // wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(). 'all');
    // wp_enqueue_style( 'current', get_stylesheet_directory_uri());
    // wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/css/main.css', array(). 'all');
    wp_enqueue_style('style', get_template_directory_uri() . '/dist/app.css', [], 1, 'all');

    
    wp_enqueue_script('main', get_template_directory_uri().'/js/bootstrap.min.js','',false,true);
    wp_enqueue_script('app', get_template_directory_uri().'/dist/app.js',[],1,true);

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
            'supports'=> array('title', 'editor', 'thumbnail','custom-fields'),
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

//enabling ajax send
add_action('wp_ajax_enquiry', 'enquiry_form');
add_action('wp_ajax_nopriv_enquiry', 'enquiry_form');


// 
function enquiry_form(){ 


    if( !wp_verify_nonce( $_POST['nonce'], 'ajax-nonce') ) {
        wp_send_json_error('Nonce is incorrect',401);
        die();
    }



    $formdata = [];

    wp_parse_str($_POST['enquiry'], $formdata);



    //Admin Email Address 
    $admin_email = get_option('admin_email');

    //email headers
    $headers[] = 'Content-type: text/html; charset=UTF-8';
    $headers[] = 'From:'. $admin_email;

    //sending the email to the
    $send_to = $admin_email;

    // subject
    $subject = 'Enquiry from:'. $formdata['fname'] . ' ' . $formdata['lname'];

    //Message to send
    $message = '';

    foreach($formdata as  $index => $field) {

        $message .= '<strong>'.  $field. '</strong>'. '<br />';
    }

    try{
         if( wp_mail($send_to, $subject, $message, $headers) ){

            wp_send_json_success('Email Sent');
         } else{
            wp_send_json_error('Email error');
         }
    } catch(Exception $e){
        wp_send_json_error($e -> getMessage());
    }

    wp_send_json_success($formdata['fname']);
}





/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );


add_action('phpmailer_init','custom_mailer');







//add dynamic content in the visual editor
function my_shortcode(){
    // stop and don't to anything yet
    ob_start();
     get_template_part('includes/latest', 'cars');
     //return the  echoed data afterwards
    return ob_get_clean();
}



// [latest_cars]
add_shortcode('latest_cars', 'my_shortcode');





function telephoneNumber(){
    return '0999 333 222';
}

add_shortcode('phone-number','telephoneNumber');




function search_query(){

    $paged = ( get_query_var('paged') ) ?  get_query_var('paged') : 1;
    


    $args = [
        'paged' => $paged,
        'post_type ' => 'cars',
        'posts_per_page' => 1,
        'tax_query' => [],  
        'meta-query' => [
                'relation' =>'AND'
        ],
    ];   
    //if keyword exist in the GET request
    if ( isSet($_GET['keyword']) ) 
    {   
        //if keyword is not empty 
        if(!empty($_GET['keyword'])){
            $args['s'] = sanitize_text_field($_GET['keyword']);
        }
    }

    if( isSet($_GET['brand']))
    {
        if(!empty($_GET['brand'])){

            $args['tax_query'][] = [

                'taxonomy' =>'brands',
                'field' => 'slug',
                'terms' =>array(  sanitize_text_field($_GET['brand'])),
            ];  
        }
    }


    if( isSet($_GET['price_above']))
    {
        if(!empty($_GET['price_above'])){

            $args['meta_query'][] = array(

                'key' => 'price',
                'value' => sanitize_text_field( $_GET['price_above']),
                'type' => 'numeric',
                'compare' => '>=',

            );


        }
    }



    if( isSet($_GET['price_below']))
    {
        if(!empty($_GET['price_below'])){

            $args['meta_query'][] = array(

                'key' => 'price',
                'value' => sanitize_text_field( $_GET['price_below']),
                'type' => 'numeric',
                'compare' => '<=',

            );


        }
    }


    return  new WP_Query($args);

}




?>