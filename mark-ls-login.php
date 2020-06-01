<?php
/*
Plugin Name: mark-ls-login
Plugin URI: http://chelan.highline.edu/~csci201
Description: This is Contact-Us form Page
Version: 1.0
Author: Domino Developers
Author URI: http://chelan.highline.edu/~csci201
*/

    //require_once plugin_dir_path(__FILE__) . 'includes/logout.php';
    //require_once plugin_dir_path(__FILE__) . 'includes/process.php';
    //require_once plugin_dir_path(__FILE__) . 'includes/welcome.php';

function login_form() {
    
    
    
    $wpdb = new wpdb('username','password','database','localhost');
		if ($wpdb->wpdbect_error) {
			 die("wpdbection failed: " . $wpdb->wpdbect_error);
		}
    echo "<div class='login-div'>";
    
    echo "<center><h2 class='login-h2'>Login</h2></center>";
	echo"<center>";
	//write the error message
	if(@$_GET['Empty']==true)
	{
		echo"<div class ='alert'>";
		echo $_GET['Empty'];
		echo"</div>";
	}
	
	if(@$_GET['Invalid']==true)
	{
		echo"<div class ='alert'>";
		echo $_GET['Invalid'];
		echo"</div>";
	}
    
    echo '<form class="login-form" action="includes/process.php" method="post">'; 
        echo '<p>';
            echo 'User ID (required) <br />';
            echo '<input class="login-input" type="text" name="login-id" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["login-id"] ) ? esc_attr( $_POST["login-id"] ) : '' ) . '" size="40" />'; //className
        echo '</p>';

        echo '<p>';
            echo 'Password (required) <br />';
            echo '<input class="login-input" type="password" name="longin-password"  value="' . ( isset( $_POST["longin-password"] ) ? esc_attr( $_POST["clongin-password"] ) : '' ) . '" size="40" />'; 
        echo '</p>';
		
        echo '<p><input class="login-input" type="submit" name="login-submitted" value="Login"/></p>'; 
        
    echo '</form>';
	echo"</center>";
    
    echo "</div>";
}

function displayLogin(){
    echo login_form();
}


function cf_shortcode() {
    ob_start(); //This PHP function turns on auto buffering
	displayLogin();
    return ob_get_clean(); //Discards the buffer contents
}


add_shortcode( 'mark-ls-login', 'cf_shortcode' );





