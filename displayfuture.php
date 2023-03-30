<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		body{
			background: radial-gradient(#fff,#ffd6d6);
		}
		h2{
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
echo "<a  href='logout.php'   onclick='myFunction()' class = 'logout button'>Sign out</a>";

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
					echo"		<li><a href='add_item.php'class='submit' >Sell Product</a></li>";
						echo"		<li><a href='display_current.php' class='submit'>Ongoing</a></li>";
								echo"		<li><a href='displayold.php' class='submit'>Expired Bids</a></li>";
								echo"		<li><a href='display_items.php' class='submit'>Back to Display</a></li>";

					
				
				echo"</ul>";
			echo"</nav>";
	echo"</div>";

	echo "<b>*All bids having their start times after midnight of the current day<b>";

echo"	</div>";
echo "<br>";
$username = $_SESSION["username"];


$statement = "SELECT * FROM item WHERE starttime > curdate() ";
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

	echo "<div class = 'item_row'><b><h2>Reserve Price : $reserve_price </h2></b></div>";
	
	
	echo "<div class = 'item_row'><b><h2>Current Bid : ksh.$icurrentp </h2></b></div>";

	echo "<div class = 'item_row'> Payment Method : $payment_method</div>";
	echo "<br>";

echo "<div class = 'item_row'> Product Description: $i_desc</div>";
echo "<br>";

echo "<div class = 'item_row'> Seller Username : $product_seller</div>";

echo "<br>";

echo "<div class = 'item_row'> Bid endtime : $end</div>";

echo "<br>";
echo "<div class = 'item_row' id='r'></div>";

echo " 
<script>

// set an interval that runs every one second
var x = setInterval(function() {
  //set the starttime that bid begins
  var starttime = new Date(\"$starttime\").valueOf();
  //set the endtime that bid begins
  var endtime = new Date(\"$end\").valueOf();
  //get the current time and date
  var now = new Date().getTime();
  
  //compare the current time and starttime..if the starttime is greater than current time...the time_type should be starttime countdown
  if (now<starttime)
  {
    //set timer type to starting time because starting type is greater than current time
    var timer_type='starttimer';
    // Set the countdown date to starttime
    var countDownDate = starttime;
  }
  else
  {
    //set timer type to ending time because starting type is less than current time
    var timer_type='endtimer';
    var countDownDate = endtime;
  }

    // Find the distance between now and the count down date
  var distance = countDownDate - now;
  // timer calculation for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  
  // Output the result in an element with id=timer according to type of timer
  if(timer_type=='starttimer'){
    document.getElementById(\"timer\").innerHTML =\"Starts in :\"+  days + \"d \" + hours + \"h \"+ minutes + \"m \" + seconds + \"s \";
  }
  if(timer_type=='endtimer'){
    document.getElementById(\"timer\").innerHTML =\"End Time :\"+  days + \"d \" + hours + \"h \"+ minutes + \"m \" + seconds + \"s \";
      // If the count down is over, write some text
      if (distance < 0) {
        //stop interval counting
        clearInterval(x);
        document.getElementById(\"timer\").innerHTML =  \"End Time:EXPIRED\";
      }
  }
}, 1000);
</script>";
	
echo "<br>";

echo "<form action = 'bid.php' method='POST'>";
echo "<input type = 'hidden' name='item_id' value = '$iid' >";
echo "<input type = 'hidden' name = 'username' value = '$username'>";
echo "<select name = 'bid'>";

for($i=0; $i<10000; $i++)

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
