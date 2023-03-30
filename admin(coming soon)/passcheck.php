<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


<?php 


if(!empty($_POST["email"]) && !empty($_POST["opassword"]) && !empty($_POST["npassword"]))
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



$email = $_POST["email"];
$npassword = $_POST["npassword"];

$statement = "SELECT * FROM  buyer WHERE email=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();
$hash = $row["password"];





if(password_verify($_POST["opassword"], $hash))


	{
		echo "Password Changed!";
		echo "<br>";
		echo "<a href='display_items.php'><button>Ok</button></a>";


		$statement = "UPDATE buyer SET password=? WHERE email=?";
		$phash = password_hash($npassword, PASSWORD_DEFAULT);
		$stmt = $conn->prepare($statement);
		$stmt->bind_param("ss", $phash, $email);
		$stmt->execute();

		
	}

	else
	{
		echo "wrong old password!";
		echo "<a href='passwd_reset.php'><button>Try Again</button></a>";
	}

}

 


 ?>	

</body>
</html>