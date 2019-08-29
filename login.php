<?php
require('db.php');
session_start(); 	
if(isset($_SESSION['username'])){
	header('Location:index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login | Page</title>
<link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
	
    if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); 
		$username = mysqli_real_escape_string($con,$username); 
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
        $query = "SELECT * FROM `registration` WHERE username='$username' and password='".md5($password)."'";
		$result = mysqli_query($con,$query) or die(mysqli_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			header("Location: index.php"); 
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
   }else{
?>
<div class="form">
<h1 style="text-align: center;">Log In</h1>
<form class="form1" action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required /><br>
<input type="password" name="password" placeholder="Password" required /><br>
<input name="submit" type="submit" value="Login" />
</form>
<p style="margin-left: 50px;">Not registered yet? <a href='registration.php'>Register Here</a></p><br />
</div>
<?php } ?>
</body>
</html>
