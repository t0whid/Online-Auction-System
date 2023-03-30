<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		body{
			background: radial-gradient(#fff,#ffd6d6);
		}
		h3{
			color: red;
			font-style: italic;
		}
	</style>
</head>
<body>


<?php
session_start();

if(!isset($_SESSION ["username"]))


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


echo "Welcome, " . $_SESSION['username'] ;

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
					echo"		<li><a href='add_item.php' class='submit' >Sell Product</a></li>";
						echo"		<li><a href='display_current.php'class='submit' >Ongoing</a></li>";
						echo"		<li><a href='displayfuture.php' class='submit'>Future Bids</a></li>";
								echo"		<li><a href='displayold.php' class='submit'>Expired Bids</a></li>";
									echo"<li><a href='passwd_reset.php' class='submit'>Change password</a></li>";
					
				

				echo"</ul>";
			echo"</nav>";
	echo"</div>";


echo"	</div>";
echo "<br>";


$username = $_SESSION["username"];


$statement = "SELECT * FROM item ";
$result = $conn->query($statement);



while($row = $result->fetch_assoc())

{
	$iid = $row["item_id"];
	$iname = $row["item_name"];
	$ipic = $row["item_pic"];
	$starttime = $row["starttime"];
	$end = $row["endtime"];
	$reserve_price = $row["reserve_price"];
	$icurrentp = $row["current_bid"];
	$bid_num = $row["bid_num"];
	$iimg = "item/";
	$iimg = $iimg.$row["item_pic"];
	$i_desc = $row["item_desc"];
	$payment_method = $row["payment_method"];
	$product_seller = $row["product_seller"];





	$link = "item_details.php?item_id=";
	$item_details = $link.$iid;


	echo "<div class = 'item'>";

	echo "<div class = 'item_row'>Product Id : $iid</div>";
	echo "<br>";
	
	echo "<div class = 'item_row'>Product Name : $iname</div>";
	
	echo "<img class = 'item_img' src = '$iimg' alt='image'>";

	echo "<div class = 'item_row'><b><h3>Reserve Price : $reserve_price </h3></b></div>";
	
	
	echo "<div class = 'item_row'><b><h3>Current Bid : ksh.$icurrentp </h3></b></div>";

	echo "<div class = 'item_row'><h3> Number of Bids: $bid_num<h3></div>";

	echo "<div class = 'item_row'> Payment Method : $payment_method</div>";
	echo "<br>";


echo "<div class = 'item_row'> Seller Username : $product_seller</div>";

echo "<br>";

echo "<div class = 'item_row'> Bid endtime : $end</div>";

echo "<br>";



echo "<form action = 'bid.php' method='POST'>";
echo "<input type = 'hidden' name='item_id' value = '$iid' >";
echo "<input type = 'hidden' name = 'username' value = '$username'>";
echo "<select name = 'bid'>";

for($i=0; $i<1000; $i++)

{
	$j = $i*10;



	echo "<option value = '$j'>ksh.$j</option>";

}

echo "</select>";

echo "<input type = 'submit' value = 'Bid'>";
echo "</form>";


echo "<div class = 'item_row'><a class = 'link' href='$item_details'><button>Product Details </button></a></div>";
echo "</div>";



}/* display all the items on screen*/

$conn->close();

}/* prevent direct access by the user*/

  ?>






</body>
</html>
