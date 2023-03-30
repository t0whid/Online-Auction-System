<!DOCTYPE html>
<html>
<head>
	<title>Account deletion</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		body{
			background: radial-gradient(#fff,#ffd6d6);
		}
	</style>
</head>
<body>


<?php
echo "<img src = 'item/newauction.png' id = 'logo'/>"; 
echo "<br>";

echo "<form class = 'delete_buyer_form' action = 'check_delete_buyer.php' method = 'POST'>";

if(isset($_GET["buyer"]))

{
		if($_GET["buyer"] == "no_account")

		{
			echo "<h4>No Such User To Delete!</h4>";

			echo "<br>";

			echo "<h4>Please Try Again!</h4>";
		}

		else if($_GET["buyer"] == "deleted")
		
		{
				
			echo "<h4>Successfully Deleted User!</h4>";
			
		}	

		else if($_GET["buyer"] == "wrong_password")
			
		{

			echo "<h4>Wrong User And Password Combination</h4>";
			
			echo "<br>";
			
			echo "<h4>Please Try Again</h4>";
			
		}

}

else

		{

			echo "<h4>To delete An Account, Please Enter The Buyer's Username And Password </h4>";
	
		}






echo "<label class = 'label' for ='username'> Username </label>";
echo "<input class = 'text' type = 'text' name = 'username' placeholder = 'Username' required>";
echo "<br>";

echo "<label class = 'label' for = 'password'>Password</label>";
echo "<input class = 'password' type = 'password' name = 'password' placeholder = 'Password' required>";
echo "<br>";

echo "<input class = 'submit' type = 'submit' value = 'Delete User'>";
echo "<br>";


echo "</form>";
echo "<a href='display_items.php '><button>back</button></a>";






 ?>
</body>
</html>