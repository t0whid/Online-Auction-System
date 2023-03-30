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
$sql = "SELECT * FROM buyer ORDER BY buyer_id DESC ";
$result = $conn->query($sql);
$conn->close();
?>
<!---HTML code to display data in tabular format---->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Auction Subscriber Details</title>

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
	<h1>ACCOUNT REPORTS</h1>
	<section>
		<h2>Subscribers</h2>
		<!-- TABLE CONSTRUCTION-->
		<table>
			<tr>
				<th>Buyer Id</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Gender</th>
				<th>Mobile No.</th>
				<th>Date Account Created</th>
			

			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS-->
			<?php // LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<!--FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN-->
				<td><?php echo $rows['buyer_id'];?></td>
				<td><?php echo $rows['firstname'];?></td>
				<td><?php echo $rows['lastname'];?></td>
				<td><?php echo $rows['username'];?></td>
				<td><?php echo $rows['email'];?></td>
				<td><?php echo $rows['gender'];?></td>
				<td><?php echo $rows['phone'];?></td>
				<td><?php echo $rows['date_registered'];?></td>

				
			</tr>



			<?php
				}
			?>
		</table>
	</section>






	
</body>

</html>