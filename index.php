<?php include("auth.php"); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="form">
<p>Welcome <?php echo $_SESSION['username']; ?>!</p>
<p><a href="Menu.php">Menu</a></p>
<p><a href="logout.php">Logout</a></p><br />
</div>
</body>
</html>
