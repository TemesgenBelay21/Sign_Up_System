<?php

session_start();

if(!isset($_SESSION['user_id'])) {
    header("location: login.php");
    exit;
}
?>

<h1>welcome <?php echo $_SESSION['username'];?></h1>
<a href= "logout.php">Logout</a>
