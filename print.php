<?php
require_once "bootstrap.php";
require_once "pdo.php";
$stmt=$pdo->prepare('Select * from timelogin where Status=TRUE');
$stmt->execute();
echo "<table class='table'>";
echo "<thead>";
echo "<tr>
      <th scope='col'>S.No.</th>
      <th scope='col'>Name</th>
      <th scope='col'>Email</th>
      <th scope='col'>Last Viewed</th>
    </tr>
  </thead>";
echo "<tbody>";
$count=0;
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
$count++;
echo "<tr>";
echo "<td>".$count."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['email']."</td>";
echo "<td>".$row['times']."</td>";
echo "</tr>";


}
echo "</tbody>";
echo "<table>";
 ?>
