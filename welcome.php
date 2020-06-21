<?php
require_once "pdo.php";
session_start();

if(isset($_SESSION['Email']) && isset($_SESSION['Name'])){
    if(strlen($_SESSION['Email'])<1 || strlen($_SESSION['Name'])<1)
    {
        echo "User not authorised to read this page";
      }


    else{
     $stmt1=$pdo->prepare('Select * from timelogin where email=:em');
     $stmt1->execute(array(':em'=>$_SESSION['Email']));
     if($stmt1->rowCount()<=0){

    $stmt=$pdo->prepare('Insert into timelogin(name,email,status) VALUES(:n,:em,:st)');
    $stmt->execute(array(':n'=>$_SESSION['Name'],':em'=>$_SESSION['Email'],':st'=>TRUE));

              }
  else {
    $email=$_SESSION['Email'];
    $f=TRUE;
    $stmt=$pdo->prepare('UPDATE timelogin SET status=:st,times=NOW() WHERE email=:em');
    $stmt->execute(array(':st'=>TRUE,':em'=>$email));
  }
    }
}
else
{ die("Not logged in");
}



//echo "welcome to main page";

//unset($_SESSION['Name']);
//unset($_SESSION['Email']);
//echo "session end";

?>


<html>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">




</script>
<script type="text/javascript">
//$.ajax({type:"GET",url:"display.php",dataType:"html",success:function(data){$('#maitri').html(data);}});
//$(document).ready(function() { window.setInterval(function() { $.ajax({type:"GET",url:"display.php",dataType:"html",success:function(data){$('#maitri').html(data);}});}, 10000); }



$('document').ready(function () {
 setInterval(function () {getRealData()}, 1000);//request every x seconds

 });


 function getRealData() {

      $.ajax({    //create an ajax request to display.php
        type: 'GET',
        url: 'display.php',
        dataType: 'html',   //expect html to be returned
        success: function(response){
            $("#maitri").html(response);
         //alert(response);
        }

    });
}



$(window).on('unload',function()
{
  $.ajax({
      type: 'POST',
      url: 'log.php',
      async:false,
      data: {email:$_SESSION['Email']}
    //  navigator.sendBeacon(url, data);

  });
});

function hovering(p){
    console.log(p);
    $(".as"+p).toggle();

}

</script>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title>Main Page</title>
  <style>
  #abs{
    color: :red;
    font-family: Arial,Helvetica,sans-serif;
  }

  </style>
</head>
<body>


    <div id="responsecontainer" align="center">

</div>



<div id="maitri"></div>

<!--
    <p id="hide">Email Address</p>
     <div id="a" style=" width: 100px;height: 100px;background-color: aqua;display: none">
         <p>This is the extra info.</p>
    </div>
  -->
<!-- Script -->
<!--<script type='text/javascript'>

 var count = 0;
 var myInterval;
 // Active
 window.addEventListener('focus', startTimer);

 // Inactive
 window.addEventListener('blur', stopTimer);

 function timerHandler() {
  count++;
  document.getElementById("seconds").innerHTML = count;
 }

 // Start timer
 function startTimer() {
  console.log('focus');
  myInterval = window.setInterval(timerHandler, 1000);
 }

 // Stop timer
 function stopTimer() {
  window.clearInterval(myInterval);
 }
</script>
-->


</body>
<html>
