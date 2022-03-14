<?php
/*
Plugin Name:  Custome plugin
Plugin URI:   https://www.unicodesystems.com
Description:  This is my custome plugin
Version:      1.0
Author:       Anshul Mishra
Author URI:   https://www.wpbeginner.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wpb-tutorial
Domain Path:  /languages
*/



define("PLUGIN_DIR_PATH",plugin_dir_path(__FILE__));
define("PLUGIN_URL",plugins_url());
define("PLUGIN_VERSION","1.0");

register_activation_hook(__FILE__,'custome_plugin_activate');
register_deactivation_hook(__FILE__,'custome_plugin_deactivate');
//during unistallation of plugin the table will deleted
//register_uninstall_hook(__FILE__,'custome_plugin_deactivate');

// echo PLUGIN_URL.",".PLUGIN_DIR_PATH;
// die();

//create database table 



function custome_plugin_activate(){
    global $wpdb;
    global $table_prifix;
    $table=$table_prifix.'custome_plugin';
    if($wpdb->get_var("SHOW TABLES LIKE '$table'") != $table) {
    $sql = "CREATE TABLE `wordpress-project`.$table ( `id` INT NOT NULL AUTO_INCREMENT ,
     `name` VARCHAR(150) NOT NULL , 
     `email` VARCHAR(150) NOT NULL , 
     `address` VARCHAR(150) NOT NULL , 
     `created_at` TIMESTAMP NOT NULL , 
     PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    $wpdb->query($sql);
    }
}


function custome_plugin_deactivate(){
    global $wpdb;
    global $table_prifix;
    $table=$table_prifix.'custome_plugin';
    $sql ="DROP table `wordpress-project`.$table";
    $wpdb->query($sql);
    $the_post_id=get_option("custome_plugin_page_id");
    if(!empty($the_post_id)){
        wp_delete_post($the_post_id,true);
    }
}


function add_custome_menu(){
   // add_menu_page( 'my plugin', 'plugin settings', 'manage_options', 'my-plugin-settings', 'my_plugin_custom_function', plugins_url( 'myplugin/images/icon.png' ), 66 );
   add_menu_page(
       'Custome Plugin', //page title
       'Custome Plugin',   //menu title
      'manage_options', //admin level   capability
       'Custome Plugin',  //page slug
       'add_new_function',  //callable function
       'dashicons-dashboard',
       11  //position
    );

    add_submenu_page( 'Custome Plugin', //parent slug
    'Add New',   //page title
    'Add New', //menu_title
    'manage_options', //capability
    'Custome Plugin',  //'form template', $menu_slug
    'add_new_function'  //collble function
      );

      add_submenu_page( 'Custome Plugin', //parent slug
      'All Pages',   //page title
      'All Pages', //menu_title
      'manage_options', //capability
      'all_pages',  //'form template', $menu_slug
      'all_pages_function'  //collble function
        );

}

add_action( 'admin_menu', 'add_custome_menu');

function add_new_function(){
 include_once PLUGIN_DIR_PATH."/views/add_new.php";
}


function all_pages_function(){
    include_once PLUGIN_DIR_PATH."/views/all_pages.php";
}

// add custome css in custome plugin 

function custome_plugin_assets(){
    wp_enqueue_style(
        'mycustomecss', //unique name
        PLUGIN_URL.'/custome_plugin/assets/css/style.css',
        '', //dependecy
        PLUGIN_VERSION  //version
    );
    wp_enqueue_script(
        'mycustomejs', //unique name
        PLUGIN_URL.'/custome_plugin/assets/js/myscript.js',
        '', //dependecy
        PLUGIN_VERSION,  //version
        true
    );
    wp_localize_script("mycustomejs","ajexurl",admin_url("admin-ajex.php"));

    
}
add_action("init","custome_plugin_assets");
//create the page 
function create_custome_page(){
    $page=array();
    $page["post_title"]="Custome_plugin_page";
    $page["post_content"]="this is my custome page created by the custome plugin";
    $page["post_status"]="publish";
    $page["post_slug"]="Custome_plugin_page";
    $page["post_type"]="page";
    $post_id=wp_insert_post($page);
    add_option("custome_plugin_page_id",$post_id);
}
register_activation_hook(__FILE__,'create_custome_page');

?>
