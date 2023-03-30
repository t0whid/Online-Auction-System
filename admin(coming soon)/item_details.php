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

session_start();

if(!isset($_GET["item_id"]) || !isset($_SESSION["username"]))
{
  header("Location:display_items.php");
}


else


{


echo "<img id = 'logo' src = 'item/newauction.png'>";
echo "<a href = 'logout.php' class = 'logout button'>Logout</a>";

$username = $_SESSION["username"];




$DBHOST = "localhost";
$DBUSER = "root";
$DBPWD = "";
$DBNAME = "Auction_table";

$conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);


if($conn->connect_error)

{

  die("Connection failed!".$conn->connect_error);
}



$statement = "SELECT * FROM item WHERE item_id = ?";

$iid = $_GET["item_id"];

$stmt = $conn->prepare($statement);
$stmt->bind_param("s", $iid);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc(); /* select the data of the specific item from the item table*/



$iid = $row["item_id"]; 
$iname = $row["item_name"];
$i_desc = $row["item_desc"];
$iiprice = $row["init_bid"];
$starttime = $row["starttime"];
$end = $row["endtime"];
$reserve_price = $row["reserve_price"];
$bid_num = $row["bid_num"];
$icprice = $row["current_bid"];
$iimg = "item/";
$iimg = $iimg.$row["item_pic"];
$payment_method = $row["payment_method"];


echo "<div class = 'item'>";

echo "<div class = 'item_row'> Product Id: $iid </div>";

echo "<div class = 'item_row'>Product Name: $iname </div>";

echo "<img class = 'item_img' src = '$iimg' alt = 'image'>";

echo "<div class='item_row'><b>Reserve Price: $reserve_price </b></div>";

echo "<div class = 'item_row'> Product Description: $i_desc</div>";


echo "<div class = 'item_row' id='timer'></div>";
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

echo "<div class = 'item_row'> Number of Bids: $bid_num</div>";

echo "<div class = 'item_row'><b> Current Bid: ksh.$icprice </b></div>";

echo "<div class = 'item_row'> Payment Method: $payment_method</div";
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
echo "</div>";

$conn->close();  /* display the item details*/


}/* prevent direct access by user*/


 ?>

</body>
</html>