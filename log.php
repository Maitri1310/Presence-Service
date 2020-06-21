<?php
require_once "pdo.php";
//session_start();
$email=$_SESSION['Email'];
$stmt = $pdo->prepare('UPDATE timelogin SET status=:st,times=NOW() WHERE email=:em');
$stmt->execute(array(':st'=>FALSE,':em'=>$email));
echo "hehehe";
unset($_SESSION['Email']);
unset($_SESSION['Name']);
 ?>
