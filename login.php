<?php
require_once "bootstrap.php";
require_once "pdo.php";
session_start();
if (isset($_POST['cancel'] ) ) {
    header("Location: index.php");
    return;
}



if ( isset($_POST['email']) && isset($_POST['pass']) ) {
    if ( strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1 ) {
        $_SESSION['error'] = "Email and password are required";
header("Location: login.php");
return;
    } else {

        $stmt = $pdo->prepare('SELECT Name,Email FROM checklogin
    WHERE Email = :em AND password= :pw');
$stmt->execute(array( ':em' => $_POST['email'], ':pw' => $_POST['pass']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ( $row !== false  )
            {
            // Redirect the browser to game.php
             $_SESSION['Email'] = $row['Email'];
               $_SESSION['Name'] = $row['Name'];


             error_log("Login success ".$_POST['email']);
            header("Location: welcome.php");
            return;
            }
        else {
            error_log("Login fail ".$_POST['email']);

            $_SESSION['error'] = "User is not authorised to view this page or You may have entered the wrong password";
            header("Location: error.php");
            //unset($_SESSION['error']);
            return;
            }
        }

    }

?>
<!DOCTYPE html>
<html>
<head>
<?php require_once "bootstrap.php"; ?>
<title>Login Page</title>
</head>




<body>
<div class="container">
<h1 >Log In</h1>
  <!-- <

//if ( isset($_SESSION['error']) ) {
    //echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
  //  unset($_SESSION['error']);
//}
?>
-->
<form method="POST" action="login.php">
  <div class="form-row">
    <div class="col-md-6 mb-3">
<label for="nam">Email</label>
<input type="text" class="form-control" name="email" id="nam" required>
</div>
</div>
<div class="form-row">
  <div class="col-md-6 mb-3">
<label for="pass11">Password</label>
<input type="password" class="form-control" name="pass" id="pass11" required></div>
</div>
<input class="btn btn-primary" type="submit" onclick="return doValidate();" value="Log In">
<a href="index.php">Cancel</a>
</form>
<p>

</p>
</div>
    <script>
    function doValidate() {
    console.log('Validating...');
    try {
        pw = document.getElementById('pass11').value;
        nam=document.getElementById('nam').value;
        console.log("Validating pw="+pw);
        console.log("Validating nam="+nam);
        if (pw == null || pw == "" || nam==null || nam=="") {
            alert("Both fields must be filled out");
            return false;
        }
        if(!nam.includes("@"))
            {
                alert("Invaild email address");
                return false;
            }
        return true;
    } catch(e) {
        return false;
    }
    return false;
}
</script>
</body>
