<?php


session_start();

//$wpdb = new wpdb('username','password','database','localhost');
//		if ($wpdb->wpdbect_error) {
//			 die("wpdbection failed: " . $wpdb->wpdbect_error);
//		}

global $wpdb;

$userId = $_POST['login-id'];
$userPassword = $_POST['longin-password'];
if(isset($_POST['login-submitted']))
{
   if(empty($_POST['login-id']) || empty($_POST['longin-password']))
   {
    header("location:../mark-ls-login.php?Empty= Please fill the blanks");
   }
   else
   {
		
$results = $wpdb->get_results( "SELECT * FROM users WHERE uidUsers='".$_POST['login-id']."' AND pwdUsers='".$_POST['longin-password']."'", OBJECT );
    //$wpdb  = "SELECT * FROM users WHERE uidUsers='".$_POST['login-id']."' AND pwdUsers='".$_POST['longin-password']."'";
    //$sql = "SELECT * FROM user WHERE uidUsers='".$_POST['login-id'].;
    //$sql = "SELECT FROM users WHERE uidUsers= $userId AND pwdUsers= $userPassword";
    
    $result=mysqli_query($conn, $sql);
    
    if(mysqli_fetch_assoc($result))
    {
        $_SESSION['User']=$_POST['login-id'];
        header("location:welcome.php");
    }
    else
    {
        header("location:../mark-ls-login.php?Invalid= Please Enter the correct user name and password");
    }
   }
}
else{
    echo 'Not WOrking!!';
}

?>

