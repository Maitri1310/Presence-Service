<?php
try{
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=logincred',
   'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "connected successfully";
}
catch(PDOException $e)
{
  echo "Connection failed" .$e->getMessage();
}
?>
