<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		body{
			background: radial-gradient(#fff,#ffd6d6);
		}
	</style>
</head>
<body>

<?php 
echo "<img id='logo' src='item/newauction.png'/>";
echo "<br>";
echo "<form name='regform' class='add_buyer_form' action='check_buyer.php' onsubmit='return validationn()'  method='POST' >";

if(isset($_GET["buyer"]))
	{
		if($_GET["buyer"] == "successful")
		{
			echo "<h4>Successfully Added User!</h4>";

		}

			else if($_GET["buyer"] == "duplicate")
		{

		echo "<h4>User Already Exists. Please Enter another User And Password</h4>";
		}
	}

else
	{
	echo "<h4>Please Register Your Details</h4>";
	}
//here is the script for js validation
echo "<script>
function validationn() {
		//create an array to fill the empty fields initialized with the sentense PLEASE ENTER
		var notFilled=['PLEASE ENTER :'];
		
		//initialize all the variables here
		//get the username from the form ...we will use the name regform since we specified it in the form name='regform'
                var username = document.forms['regform']['username'];
                var firstname = document.forms['regform']['firstname'];
                var lastname = document.forms['regform']['lastname'];
                var email = document.forms['regform']['email'];
                var gender = document.forms['regform']['gender'];
                var phone = document.forms['regform']['phone'];
                var password = document.forms['regform']['password'];

		//add more variables here eg email gender etc
  
                
		//validate  the username is not empty
		if (username.value.length < 7 ) {
		    //add this field to the array created above
                    notFilled.push('atleast 7 Username characters');
                }

		//validate if firstname is not empty
		if(firstname.value.length  < 6 ){
		    //add to array
		    notFilled.push('atleast 6 first name characters');
		}

		//validate lastname not empty
		if(lastname.value.length  < 6){
		 	notFilled.push('atleast 6 last name characters');
		}

		//validate email not empty
		if(email.value.length < 5){
		 	notFilled.push('your email');
		}

		//validate gender not empty
		if(gender.value == ''){
		 	notFilled.push('your gender');
		}

		//validate phone not empty
		if(phone.value.length < 10){
		 	notFilled.push('atleast 10 digit number');
		}

		//validate password not empty
		if(password.value.length < 8 ){
		 	notFilled.push('alteast 8 password characters');
		}
		
		//check if the array has fields in it
		if(notFilled.length>1){
			//join the elements in array using new line
			var message=notFilled.join('\\n');
			//display them
			window.alert(message);
			return false;
		}
		else{
			return True;
			}
 }
</script>";


echo "<label class='label' for = 'username'>Username</label>";
echo "<input class='text' type='text' name='username' placeholder='Username'  >";
echo "<br>";

echo "<label class='label' for = 'firstname'>First Name</label>";
echo "<input class='text' type='text' name='firstname' placeholder='First Name' >";
echo "<br>";

echo "<label class='label' for = 'lastname'>Last Name</label>";
echo "<input class='text' type='text' name='lastname' placeholder='Last Name' >";
echo "<br>";

echo "<label class='label' for = 'email'>Email</label>";
echo "<input class='text' type='text' name='email' placeholder='Email Address' >";
echo "<br>";

echo "<label class='label' for = 'gender'>Gender</label>";
echo "<input class='text' list='gender' type='text' name='gender' placeholder='Your Gender'> "; 

echo "<datalist id='gender'>
<option value = 'Female'>
<option value = 'Male'>
</datalist>";
 

echo "<br>";


echo "<label class='label' for = 'phone'>Phone</label>";
echo "<input class='text' type='text' name='phone' placeholder='Mobile number' >";
echo "<br>";

echo "<label class='label' for = 'password'>Password</label>";
echo "<input class = 'password' type='password' name='password' placeholder='password'>"; 

echo "<br>";

echo "<input class='submit' type='submit' value='Register' style='margin-right: 16px'> <input class='submit' type='reset' value= 'Reset'>"  ;
echo "</form>";

?>

<p>
	
	Already have an account? <a href="login.php" class="link">Login</a>
</p>

</body>
</html>