<?php
/*
Plugin Name: User_registration
Plugin URI: www.unicodesystems.com 
Discription : This is the simple plugin to register the user and login with the email and password
Author:Anshul Mishra
Author URL: www.unicodesystems.in
*/
function registration_form( $username, $password, $email ) {
    echo '
    <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
    <div>
   User_Name:
    <input type="text" name="username" value="' . ( isset( $_POST['username'] ) ? $username : null ) . '">
    </div>
    <div>
    Email:
    <input type="text" name="email" value="' . ( isset( $_POST['email']) ? $email : null ) . '">
    </div>
    <div>
    Password:
    <input type="password" name="password" value="' . ( isset( $_POST['password'] ) ? $password : null ) . '">
    </div>
    <input type="submit" name="submit" value="Register"/>
    </form>
    ';
}
function registration_validation( $username, $password, $email)  {
    global $reg_errors;
$reg_errors = new WP_Error;
if ( empty( $username ) || empty( $password ) || empty( $email ) ) {
    $reg_errors->add('field', 'Required ');
}
if ( 4 > strlen( $username ) ) {
    $reg_errors->add( 'username_length', 'username should be gretter then 4 characher' );
}
if ( username_exists( $username ) )
    $reg_errors->add('user_name', 'Sorry, that username already exists!');
    if ( ! validate_username( $username ) ) {
        $reg_errors->add( 'username_invalid', 'Sorry, the username you entered is not valid' );
    }
    if ( 5 > strlen( $password ) ) {
        $reg_errors->add( 'password', 'password should be gretter then  5' );
    }
    if ( !is_email( $email ) ) {
        $reg_errors->add( 'email_invalid', 'Email is not valid' );
    }
    if ( email_exists( $email ) ) {
        $reg_errors->add( 'email', 'Email Already exist' );
    }
    if ( is_wp_error( $reg_errors ) ) {
        foreach ( $reg_errors->get_error_messages() as $error ) {
            echo '<div>';
            echo '<strong>ERROR</strong>:';
            echo $error . '<br/>';
            echo '</div>';
        }
    }
}
function complete_registration() {
    global $reg_errors, $username, $password, $email;
    if ( 1 > count( $reg_errors->get_error_messages() ) ) {
        $userdata = array(
        'user_login'    =>   $username,
        'user_email'    =>   $email,
        'user_pass'     =>   $password,
        );
        $user = wp_insert_user( $userdata );  //sir there i am using by default table of wordpress to insert the data which name is wp_users -->which is help to login
        echo 'Registration complete. Goto <a href="' . get_site_url() . '/wp-login.php">login page</a>.';   
    }
}
function custom_registration_function() {
    if ( isset($_POST['submit'] ) ) {
        registration_validation(
        $_POST['username'],
        $_POST['password'],
        $_POST['email']
        ); 
        global $username, $password, $email;
        $username   =   sanitize_user( $_POST['username'] );
        $password   =   esc_attr( $_POST['password'] );
        $email      =   sanitize_email( $_POST['email'] );
        complete_registration(
        $username,
        $password,
        $email
        );
    }
    registration_form(
        $username,
        $password,
        $email
        );
}
  //use this short code to display the form -->[custome_user_registration]
add_shortcode( 'custom_user_registration', 'custom_registration_shortcode' );
 
function custom_registration_shortcode() {
    ob_start();
    custom_registration_function();
    return ob_get_clean();
}