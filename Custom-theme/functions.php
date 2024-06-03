<?php

function load_css(){
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false , 'all');

    wp_enqueue_style('bootstrap');
    
    wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), false , 'all');

    wp_enqueue_style('main');
    

}
add_action('wp_enqueue_scripts','load_css');

function load_js(){
    wp_enqueue_script('jquery');
    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js','jquery', false, true);
    wp_enqueue_script('bootstrap');
}

add_action('wp_enqueue_scripts','load_js');

add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');
register_nav_menus(
    array(
        'top-menu' => 'Top Menu Location',
        'mobile-menu' => 'Mobile Menu Location',
    )
);

add_action( 'template_redirect', 'my_custom_skip_link' );

function my_custom_skip_link() {
  wp_enqueue_block_template_skip_link();
}

add_image_size('blog-large',800,400,true);
add_image_size('blog-small',300,200,true);

function my_sidebars(){
        register_sidebar(
            array(
                'name' => 'Page Sidebar',
                'id' => 'page-sidebar',
                'before_title' => '<h4 class="widget">',
                'after_title' => '</h4>',
            )
        );


    register_sidebar(
        array(
            'name' => 'Blog Sidebar',
            'id' => 'blog-sidebar',
            'before_title' => '<h4 class="widget">',
            'after_title' => '</h4>',
        )
    );
}
add_action('widgets_init','my_sidebars');

function first_post_type(){
    $args = array(
        'labels' => array(
                
                'name' => 'Cars',
                'singular_name' => 'Car',
        ),      
                'hierarchical' => true,
                'menu_icon' =>  'dashicons-editor-kitchensink',
                'public' => true,
                'has_archieve' => true,
                'supports' => array('title' , 'editor' , 'thumbnail' ,'custom-fields'),

    );
    register_post_type('cars',$args);
}
add_action('init' , 'first_post_type');

function first_texonomy(){
    $args = array(
        
        'public' => true,
        'hierarchical' => true,
    );
    register_taxonomy('brands' , array('cars'),$args);
}
add_action('init','first_texonomy');


add_action('wp_ajax_enquiry' , 'enquiry_form');
add_action('wp_ajax_nopriv_enquiry' , 'enquiry_form');
function enquiry_form(){
    
    
    
    if( !wp_verify_nonce($_POST['nonce'], 'ajax-nonce')){
        wp_send_json_error('Nonce is incorrect',401);
        die();
    }
    
    
    $formdata = [];
    wp_parse_str($_POST['enquiry'],$formdata);

    $admin_email = get_option('admin_email');
    $header[] = "Content-Type: text/html; charset-UTF-8";
    $header[] = "From: Dhruv Pawar".$admin_email .'>';
    $header[] = 'Reply-to:' .$formdata['email'];

    $send_to = $admin_email;
    $subject = 'Enquiry from' .$formdata['fname'].' ' .$formdata['lname'];
    $message = '';
    foreach($formdata as $index => $field){
        $message .= '<strong>' .$index. '</strong>:' . $field. '<br />';
    }

    try{
        if(wp_mail($send_to,$subject , $message , $header)){
            wp_send_json_success('Email sent');
        }
        else{
            wp_send_json_error('Email not sent');
        }
    }catch(Exception $e){
        wp_send_json_error($e->getMessage());
    }
    wp_send_json_success($formdata['fname']);
}
