<?php
session_start();
echo 'Welcome'. $_SESSION['User'];
echo '<a href="logout.php?logout">Logout</a>';

?>


