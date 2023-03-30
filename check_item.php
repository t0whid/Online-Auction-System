<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<?php 

if(!empty($_POST["item_name"]) && !empty($_POST["item_description"]) && !empty($_POST["endtime"]) && !empty($_FILES["item_pic"]["name"])  && !empty($_POST["payment_method"]) && !empty($_POST["product_seller"]))
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

$iname = $_POST["item_name"];
$idesc = $_POST["item_description"];
$iipic = $_FILES["item_pic"]["name"];
$starttime = $_POST["starttime"];
$endtime = $_POST["endtime"];
$reserve_price = $_POST["reserve_price"];
$payment_method = $_POST["payment_method"];
$product_seller = $_POST["product_seller"];


$statement = "SELECT * FROM item WHERE item_name=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("s", $iname);
$stmt->execute();

$result = $stmt->get_result();
/*grab from table all see if there is an item of the samename*/
if($result->num_rows >= 1)
{
$value = "duplicate";
$conn->close();
header("Location:add_item.php?item=$value");

}

else
		
{

$statement = "INSERT INTO item (item_name, item_desc, item_pic,starttime, endtime, reserve_price, payment_method, product_seller) VALUES(?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($statement);
$stmt->bind_param("ssssssss", $iname, $idesc, $iipic,$starttime, $endtime, $reserve_price, $payment_method, $product_seller);
$stmt->execute();

$value = "successful";
$conn->close();
header("Location:add_item.php?item=$value");

} /*insert intotable if item name not duplicate */

}

else
{
			
header("Location:add_item.php");

}/*verify user not directly accessing*/

?>	

</body>
</html>
