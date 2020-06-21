<?php
session_start();
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['times']);
header('Location:login.php');
?>
