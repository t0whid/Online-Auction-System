<!DOCTYPE html>
<html>
<head>
	<title>Product deletion</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		body{
			background: radial-gradient(#fff,#ffd6d6);
		}
	</style>
</head>
<body>

<?php 

echo "<img  id = 'logo' src = 'item/newauction.png'>";
echo "<br>";

echo "<form class = 'delete_item_form' action = 'check_delete_item.php' method ='POST'>";

if(isset($_GET["item"]))
{
	if($_GET["item"] == "no_item")
	{
		echo "<h4>No such item exists!</h4>";

		echo "<br>";
		
		echo "<h4>Please try Again!</h4>";
	}

	else if($_GET["item"] == "successful")

	{

		echo "<h4>Successfully deleted the item!</h4>";
	}
}


else

{

	echo "<h4>To Delete An Item, Please Enter The Item Name</h4>";

	
}

echo "<label class = 'label' for = 'item_name'>Item Name</label>";
echo "<input class = 'text' type = 'text' name = 'item_name' placeholder = 'Item name'>";

echo "<input class ='submit' type = 'submit' value = 'Delete Item'/>";

echo "<br>";


echo "</form>";

echo "<a href='display_items.php'><button>back<button></a>";

 ?>

</body>
</html>