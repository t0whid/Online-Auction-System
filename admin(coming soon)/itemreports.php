<?php

// Username is root
$DBHOST = "localhost";
$DBUSER = "root";
$DBPWD = "";
$DBNAME = "Auction_table";


$conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);

if($conn->connect_error)

{

	die("Connection failed!".$conn->connect_error);
}

// SQL query to select data from database
$sql = "SELECT * FROM item ORDER BY item_id DESC ";
$result = $conn->query($sql);
$conn->close();
?>
<!---HTML code to display data in tabular format---->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Item Details</title>

	<h1>ITEM REPORTS</h1>

	<style>
		table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid black;
		}

		h1{
			text-align: center;
		}

		h2 {
			text-align: center;
			
			font-size: xx-large;
			
		}

		td {
			background-color: #E4F5D4;
			border: 1px solid black;
		}

		th,
		td {
			font-weight: bold;
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}

		td {
			font-weight: lighter;
		}
	</style>
</head>

<body>
	<section>
		<h2>Products</h2>
		<!-- TABLE CONSTRUCTION-->
		<table>
			<tr>
				<th>Product Id</th>
				<th>Product Name</th>
				<th>Product description</th>
				<th>Item image</th>
				<th>Reserve Price</th>
				<th>Start Time</th>
				<th>Endtime</th>
				<th>Bids received</th>
				<th>Current bid</th>
				<th>Payment Method</th>
				<th>Product Seller</th>
				
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS-->
			<?php // LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<!--FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN-->
				<td><?php echo $rows['item_id'];?></td>
				<td><?php echo $rows['item_name'];?></td>
				<td><?php echo $rows['item_desc'];?></td>
				<td><?php echo $rows['item_pic'];?></td>
				<td><?php echo $rows['reserve_price'];?></td>
				<td><?php echo $rows['starttime'];?></td>
				<td><?php echo $rows['endtime'];?></td>
				<td><?php echo $rows['bid_num'];?></td>
				<td><?php echo $rows['current_bid'];?></td>
				<td><?php echo $rows['payment_method'];?></td>
				<td><?php echo $rows['product_seller'];?></td>
				
			</tr>



			<?php
				}
			?>
		</table>
	</section>






	
</body>

</html>