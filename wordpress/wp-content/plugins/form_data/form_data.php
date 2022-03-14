<?php
/*
Plugin Name: Form Data
Plugin URI:   https://www.unicodesystems.com
Description:  this is my very simple plugin for testign and demo purpose in wordpress i am in learning phrase. 
Version:      1.0
Author:       Anshul Mishra
Author URI:   https://www.unicodesystems.com
License:      GPL2
License URI:  https://www.unicodesystems.coml
Text Domain:  wpb-tutorial
Domain Path:  /languages
*/

register_activation_hook(__FILE__,'form_data_activate');
register_deactivation_hook(__FILE__,'form_data_deactivate');

function form_data_activate(){
    global $wpdb;
    global $table_prifix;
    $table=$table_prifix.'form_data';
    
    $sql = "CREATE TABLE `wordpress-project`.$table ( `id` INT(40) NOT NULL AUTO_INCREMENT,
     `name` VARCHAR(40) NOT NULL , 
     `email` VARCHAR(40) NOT NULL , 
     `father` VARCHAR(40) NOT NULL , 
     `mother` VARCHAR(40) NOT NULL , 
     `address` VARCHAR(40) NOT NULL , 
     `password` VARCHAR(40) NOT NULL ,
      PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    $wpdb->query($sql);
}

function form_data_deactivate(){
    global $wpdb;
    global $table_prifix;
    $table=$table_prifix.'form_data';
    $sql ="DROP TABLE `wordpress-project`. $table";
    $wpdb->query($sql);
}
add_action( 'admin_menu', 'disply_admin_menu' );
function disply_admin_menu(){
   // add_menu_page( 'my plugin', 'plugin settings', 'manage_options', 'my-plugin-settings', 'my_plugin_custom_function', plugins_url( 'myplugin/images/icon.png' ), 66 );
   add_menu_page(
       'Form Data', //page title
       'Employee',   //menu title
      'manage_options', //admin level   capability
       'form_data',  //page slug
       'show_form_template',  //callable function
       'dashicons-dashboard',
       8           //position
    );


    add_submenu_page( 'form_data', //parent slug
    'form template',   //page title
    'Add New Employee', //menu_title
    'manage_options', //capability
    'form_data',  //'form template', $menu_slug
    'show_form_template'  //collble function
      );

      add_submenu_page( 'form_data', //parent slug
      'Show_Data',   //page title
      'Employee List', //menu_title
      'manage_options', //capability
      'Show_Data',  //'form template', $menu_slug
      'form_data_list'  //collble function
        );
}
function form_data_list(){
  include('form_data_list.php');
}
add_shortcode( ‘show_form_template_shortcode’,‘show_form_templatesss’);
function show_form_templatesss(){
    echo "hello";
}
function show_form_template(){
    include('show_form_template.php');
}

?>


