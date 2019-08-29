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
<title>Registration</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
    if (isset($_REQUEST['username'])){
		$username = stripslashes($_REQUEST['username']); 
		$username = mysqli_real_escape_string($con,$username); 
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

		$sql = "SELECT * from registration WHERE username='$username'";
		$sql1 = "SELECT * from registration WHERE email='$email'";
		$res = mysqli_query($con,$sql);
		$res1 = mysqli_query($con,$sql1);
		if(mysqli_num_rows($res) > 0) {
			$username_error = "sorry....username already exists ";
			print_r($username_error);
		}
		elseif (mysqli_num_rows($res1) > 0) {
			$email_error = "sorry...email already exists";
			print_r($email_error);
		}
		else{
		$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `registration` (username, password, email, trn_date) VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }
}else{
?>
<div class="form">
<h1 style="margin-left: 130px;">Registration</h1>
<form class="form1" name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required /><br>
<input type="email" name="email" placeholder="Email" required /><br>
<input type="password" name="password" placeholder="Password" required /><br>
<input type="submit" name="submit" value="Register" />
</form><br />
</div>
<?php } ?>
</body>
</html>
