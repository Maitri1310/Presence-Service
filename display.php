<?php
require_once "pdo.php";
require_once "bootstrap.php";
session_start();
$stmt=$pdo->prepare('Select * from timelogin where Status=TRUE');
$stmt->execute();
echo "<link href='style.css' media='screen' rel='stylesheet' type='text/css'/>";
$count=0;
$k=1;
echo "<div class='container-my'>";
echo "<ul id='horizontal-list'>";
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
  // output data of each row
  {
    $st=$row['email'][0];
$na=$row['name'];
$em=$row['email'];
  //  echo "<div>";
    //echo "id: " .$row['email']."";
    if($count<5){
      echo "<li><div class='circle ".$k."'  onmouseover='hovering(".$k.")'> ";

  echo $st." <div class='as".$k."' style='width:190px;height: 60px;display:none;z-index:-1;background-color:#E4F2FF ;border-radius:10px; font-size:20px;font-color:black;'>$na<br><p style='font-size:14px;font-color:black;'>$em</p></div></div></li>";
//  echo "</div>";
      $k++;
}

  $count++;
  }
  $count=$count-$k;
  echo"<div class='circle1'>";
  echo"<a href='print.php'>+".$count."</a>";
  echo "</div>";
  echo "<a href='print.php' class='btn btn-primary small' role='button' style='margin-left:200px;padding:10px;'>View History</a>";
  echo "</ul>";
  echo "<a style='float:right; margin-top:20px; margin-right:20px;' href='logout.php'>Log Out</a>";
echo "</div>";
?>
