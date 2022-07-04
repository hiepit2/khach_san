<?php 
session_start();
unset($_SESSION['user']);
$_SESSION['success'] = "";
header("Location:../adminn/index.php");
exit();
?>
