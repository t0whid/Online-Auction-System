<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		body{
			background: radial-gradient(#fff,#ffd6d6);
		}
	</style>
</head>
<body>
	
<?php 
echo "<img id = 'logo' src = 'item/newauction.png'/>";
echo "<br>";
echo "<a href = 'logout.php' class = 'logout button'>Logout</a>";

$DBHOST = "localhost";
$DBUSER = "root";
$DBPWD = "";
$DBNAME = "Auction_table";

$conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);

if($conn->connect_error)

	{

		die("Connection failed!".$conn->connect_error);

	}

if(!isset($_POST["item_id"]))

	{

		header("Location:display_items.php");

	}

else
	{


$item_id = $_POST["item_id"];
session_start();

$statement = "SELECT * FROM bid WHERE item_id=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("s", $item_id);
$stmt->execute();
$result = $stmt->get_result();

$row = $result->fetch_assoc();

if($_SESSION["username"] == $row["username"])

	{

		echo "You are already the highest bidder, ";

	}/* checks if user is already the highest bidder*/


$statement = "SELECT * FROM item WHERE item_id =?";

$stmt = $conn->prepare($statement);
$stmt->bind_param("s", $item_id);

$stmt->execute();
$result = $stmt->get_result();

$row = $result->fetch_assoc();
$bid = $_POST["bid"];
$username = $_SESSION["username"];

/* determione if user bid properly */

if( $bid <$row["reserve_price"])
{

	echo "<b>Bid higher than Ksh.<b>" .$row["reserve_price"];
	echo "<br>";
	echo "<br>";
	echo "<a href='item_details.php'><button>Bid Again</button></a>";
}

elseif($bid > $row["current_bid"])

{

$statement = "UPDATE item SET current_bid = ? WHERE item_id = ?";
$stmt = $conn->prepare($statement);

$stmt->bind_param("dd", $bid, $item_id);
$stmt->execute();

/* updates the bid values*/

$statement = "UPDATE item SET bid_num=bid_num+1 WHERE item_id = ?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("d", $item_id);
$stmt->execute();

/* updates the number of bids*/


$statement = "INSERT INTO bid (username, item_id, bid_price) VALUES(?, ?, ?)";
$stmt = $conn->prepare($statement);

$stmt->bind_param("sid", $username, $item_id, $bid);
$stmt->execute();

$statement = "DELETE FROM bid WHERE bid_price <? AND item_id =?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("dd", $bid, $item_id);
$stmt->execute();

echo "Congratulations, the current bid value is Ksh.".$bid;
echo "<br>";
echo "<a href='display_items.php'><button>OK</button></a>";

$stmt->close();

}/* inserts a new bid into thr BID table and deletes older ones*/


else

{

	echo "your bid must be greater than the current bid of Ksh.".$row['current_bid'];
	echo "<br>";
	echo "<a href='item_details.php'><button>Bid Again</button></a>";

}/* checkto see if you bid greater than the current bid*/
}/* check to see if you are lready the greatest bidder*/

$conn->close();

/* prevent direct access by the user*/



 ?>
</body>
</html>
