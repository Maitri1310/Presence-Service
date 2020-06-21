

<?php

require_once "bootstrap.php";
require_once "pdo.php";
session_start();
if(isset($_POST['cancel']))
{
  header('Location:index.php');
  return;
}
if(isset($_POST['username']) && isset($_POST['email'])&& isset($_POST['pass']))
{
  if ( strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1||strlen($_POST['username'])<1 ) {
      $_SESSION['error'] = "All the fields are required";
header("Location: signup.php");
return;
  }
  else {

      $stmt1=$pdo->prepare('Insert into checklogin VALUES(:n,:em,:pw)');
      $stmt1->execute(array(':n'=>$_POST['username'],':em'=>$_POST['email'],':pw'=>$_POST['pass']));
      echo "1122";
      echo  "<div class='alert alert-success' role='alert'>
    The user has been successfully registered
  </div>";
  echo "<script>
alert('The user has been successfully registered.Click Ok');
window.location.href='index.php';
</script>";

  //  if ($row)
    /*    {

        $target_path = createAvatarImage($_POST['username']);
         $_SESSION['Name'] = $row['Name'];
          echo $target_path;
         error_log("Signup success ".$_POST['email']);
        header("Location: welcome.php");
        return;
        }
    else {
        error_log("Not registered ".$_POST['email']);

        $_SESSION['error'] = "Not registered";
        header("Location: signup.php");
        return;
      }*/
    }



}

?>




<html>
<head>
<title>Sign Up</title>
</head>
<body>
<div>
  <p style="color:black;text-align:center">Sign Up</p>
<div>
  <?php

if ( isset($_SESSION['error']) ) {
 echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
 unset($_SESSION['error']);
}
?>
<form method="POST" action="signup.php">
<label for="user">User Name</label>
<input type="text" name="username" id="user"></br>
<label for="email">Email Address</label>
<input type="text" name="email" id="email"></br>
<label for="pass2">Password</label>
<input type="password" name="pass" id="pass2"></br>
<input type="submit" onclick="return validate()" value="Sign Up">
</form>
<script>
function validate(){
  console.log('Signing up the user');
  try
  {  var username=document.getElementById("user");
    var email=document.getElementById("email");
    var pw=document.getElementById("pass2");
    if(pw==null||pw=""||user==null||user=""||email=""||email=null)
    {alert('All fields must be filled out');
    return false;
  }
  if(!email.includes("@"))
  {
    alert('Please enter a valid email address');
    return false;
  }
    return true;
  }
  catch(e)
  {
    return false;
  }
  return false;
}
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>
