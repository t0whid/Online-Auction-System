<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		body{
			background: radial-gradient(#fff,#ffd6d6);
		}
	</style>
</head>
<body>

<?php 

session_start();

if(isset($_SESSION["username"]))

{
	$_SESSION = array();


	session_destroy();

	header("Location:index.php");
}


 ?>


</body>
</html>
