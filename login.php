<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		body{
			background: radial-gradient(#fff,#ffd6d6);
			}
	</style>
</head>
<body>
	
<?php 
	
echo "<img id = 'logo' src ='item/newauction.png'/>";

echo "<br>";
echo "<form name='regform' form class = 'login_form' action = 'check_login.php' onsubmit='return validationn()' method = 'POST'>";

echo "<h4>Login</h4>";

echo "<script>
function validationn() {
		//initialize all the variables here
		//get the username from the form ...we will use the name regform since we specified it in the form name='regform'
                var username = document.forms['regform']['username'];
                var password = document.forms['regform']['password'];

		//add more variables here eg email gender etc

                
		//validate  that the username is not empty
		if (username.value == '') {
                    window.alert('Please enter your username');
		    //move the cursor to username
                    username.focus();
                    return false;
                }


		//validate password not empty
		if(password.value == ''){
		 	window.alert('please enter your Password.');
			window.focus();
			return false;
		}
}
</script>";


echo "<label class = 'label' for = 'username' >Username :</label>";
echo "<input class = 'text' type ='text' name = 'username' placeholder = 'Username' >";
echo "<br>";

echo "<label class = 'label' for = 'password'>Password :</label>";
echo "<input class = 'password' type = 'password' name = 'password' placeholder = 'Password' >";
echo "<br>";

echo "<input class = 'submit' type = 'submit' value = 'Sign in'>";
echo "</form>";




 ?>


 

</body>
</html>
