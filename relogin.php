<!DOCTYPE html>
<html>
<head>
	<title>Relogin</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		body{
			background: radial-gradient(#fff,#ffd6d6);
		}
	</style>
</head>
<body>
<?php 

echo "<img id = 'logo' src ='item/newauction.png'/>";
echo "<br>";


echo "<form class = 'relogin_form' action = 'check_login.php' method = 'POST'>";

echo "<h4>PLease Login Again!</h4>";


echo "<label class = 'label' for = 'username'>Username :</label>";
echo "<input class = 'text' type ='text' name = 'username' placeholder = 'Username' required>";
echo "<br>";


echo "<label class = 'label' for = 'password'>Password :</label>";
echo "<input class = 'password' type = 'password' name = 'password' placeholder = 'Password' required>";
echo "<br>";

echo "<input class = 'submit' type = 'submit' value = 'Sign in'>";
echo "</form>";






 ?>

</body>
</html>
