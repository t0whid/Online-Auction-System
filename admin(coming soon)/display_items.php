<!DOCTYPE html>
<html>
<head>
	<title>Products display</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		
	</style>
</head>
<body>


<?php
session_start();

//here we check if the username is set or the admin field is set if either is true redirect to login.php
if(!isset($_SESSION ["username"]) || $_SESSION['isadmin']==0)


{
	header("Location:login.php");
	
}

else

{

$DBHOST = "localhost";
$DBUSER = "root";
$DBPWD = "";
$DBNAME = "Auction_table";


$conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME); 

if($conn->connect_error)

{

	die("Connection failed!".$conn->connect_error);
}

echo "<img id = 'logo' src = 'item/newauction.png' width='125px'>";
echo "<a  href='logout.php'   onclick='myFunction()' class = 'logout button'><button>Sign out</button></a>";

echo "<script>
function myFunction() {
  alert('Thank you for Coming, see  you again!');
}
</script>
";





echo"<div class='container'>";
			
	echo"	<div class = 'navbar'>";

			echo"	<nav>";
					
				echo"		<ul>";
					echo"		<li><a href='add_item.php' class='submit'>Sell Product</a></li>";
					echo"		<li><a href='delete_item.php' class='submit'>Delete Product</a></li>";
					echo"		<li><a href='delete_buyer.php' class='submit'>Delete Account</a></li>";
					echo"		<li><a href='add_buyer.php' class='submit'>Create User</a></li>";
					echo"		<li><a href='userreports.php' class='submit'>Accounts Report </a></li>";
					echo"		<li><a href='itemreports.php' class='submit'>Products Report </a></li>";
					echo"		<li><a href='bidwinners.php' class='submit'>Bids Report</a></li>";
					echo"		<li><a href='passwd_reset.php' class='submit'>Change Password</a></li>";
				echo"</ul>";
			echo"</nav>";
	echo"</div>";

echo"	</div>";

echo "<br>";

$statement = "SELECT * FROM item";
$result = $conn->query($statement);

while($row = $result->fetch_assoc())

{
	$iid = $row["item_id"];
	$iname = $row["item_name"];
	$ipic = $row["item_pic"];
	$reserve_price = $row["reserve_price"];
	$icurrentp = $row["current_bid"];
	$iimg = "item/";
	$iimg = $iimg.$row["item_pic"];
	$payment_method = $row["payment_method"];
	$product_seller = $row["product_seller"];

	$link = "item_details.php?item_id=";
	$item_details = $link.$iid;



	echo "<div class = 'item'>";

	echo "<div class = 'item_row'>Product Id: $iid</div>";
	
	echo "<div class = 'item_row'>Product Name : $iname</div>";
	
	echo "<img class = 'item_img' src = '$iimg' alt='image'>";

	echo "<div class = 'item_row'><b>Reserve Price : $reserve_price</b></div>";
	
	
	echo "<div class = 'item_row'><b>Current Bid : ksh.$icurrentp </b></div>";

	echo "<div class = 'item_row'> Payment Method : $payment_method</div>";
	echo "<br>";

	echo "<div class = 'item_row'> Product Seller : $product_seller</div>";
	echo "<br>";
	
	echo "<div class = 'item_row'><a class = 'link' href='$item_details'><button>Product Details </button></a></div>";


	echo "</div>";


}/* display all the items on screen*/

$conn->close();

}/* prevent direct access by the user*/

  ?>






</body>
</html>