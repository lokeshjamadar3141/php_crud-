<?php
 
require('db.php');
include("auth.php"); 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Menu - Secured Page</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="form">
<p>Welcome to Menu.</p>
<p><a href="index.php">Home</a><p>
<p><a href="insert.php">Insert New Record</a></p>
<p><a href="view.php">View Records</a><p>
<p><a href="logout.php">Logout</a></p><br />
</div>
</body>
</html>
