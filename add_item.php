<!DOCTYPE html>
<html>
<head>
	<title>Uploading Item</title>
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

echo "<form name='regform' form class='add_item_form' action='check_item.php' onsubmit='return validationn()' method='POST' enctype = 'multipart/form-data'>";

if(isset($_GET["item"]))
{  	
	if($_GET["item"] == "duplicate")
		{

	echo "<h4>Already entered this item</h4>";
	echo "<br>";
	echo "<h4>Please try again</h4>";
		}

else if($_GET["item"] == "successful")
		{

	header("Location:item.php");
		}	
}

else
{
	echo "<h4>Please Add an Item</h4>";
}

//here is the script for js validation
echo "<script>
	function retroactive(date){
	current_time=new Date().getTime();
	time_given=new Date(date).getTime();
	if(time_given < current_time){
		return false;
	}
	else
	{
		return true;
		}
	}


function validationn() {
		//create an array to fill the empty fields initialized with the sentense PLEASE ENTER
		var notFilled=['PLEASE ENTER'];
		
		//initialize all the variables here
		//get the item_name from the form ...we will use the name regform since we specified it in the form name='regform'
                var item_name = document.forms['regform']['item_name'];
                var item_description = document.forms['regform']['item_description'];
                var starttime = document.forms['regform']['starttime'];
                var endtime = document.forms['regform']['endtime'];
                var item_pic = document.forms['regform']['item_pic'];
                var reserve_price = document.forms['regform']['reserve_price'];
                var payment_method = document.forms['regform']['payment_method'];
		var product_seller = document.forms['regform']['product_seller'];

		
		

		//add more variables here eg reserve_price etc
  
                
		//validate  the item_name is not empty
		if (item_name.value == '') {
		    //add this field to the array created above
                    notFilled.push('Product Name');
                }

		//validate if item_description is not empty
		if(item_description.value == ''){
		    //add to array
		    notFilled.push('Product Description');
		}

		//validate starttime not empty
		if(starttime.value == '' || retroactive(starttime.value) == false ){
		 	notFilled.push('Valid Bid Start Time');
		}

		//validate endtime not empty
		if(endtime.value == '' || retroactive(endtime.value) == false ){
		 	notFilled.push('Valid Bid End Time');
		}

		//validate item_pic not empty
		if(item_pic.value == ''){
		 	notFilled.push('Product Picture');
		}

		//validate reserve_price not empty
		if(reserve_price.value == ''){
		 	notFilled.push('Reserve Price');
		}

		//validate payment_method not empty
		if(payment_method.value == ''){
		 	notFilled.push('Payment Method');
		}
		
		//validate product_seller not empty
		if(product_seller.value ==''){
		 	notFilled.push('Seller Username');
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



echo "<label class = 'label' for='item_name'>Product Name</label>";

echo "<input class = 'text' type = 'text' name= 'item_name' placeholder='product name' >";
echo "<br>";


echo "<label class = 'label' for= 'item_description'> Product Description:</label>";
echo "<input class = 'text' type = 'text' name = 'item_description' placeholder='product description' >";
echo "<br>";

echo "<label class = 'label' for ='starttime'> Bid Start Time:</label>";
echo "<input class = 'text' type = 'datetime-local' name='starttime' placeholder='yyyy-mm-dd hh:mm:ss'  >";
echo "<br>";


echo "<label class = 'label' for ='endtime'> Bid End Time:</label>";
echo "<input class = 'text' type = 'datetime-local' name='endtime' placeholder='yyyy-mm-dd hh:mm:ss' >";
echo "<br>";


echo "<label class = 'label' for ='item_pic'> Product Picture:</label>";
echo "<input class = 'tex' type = 'file' value = 'item_pic' name='item_pic' >";
echo "<br>";
echo "<br>";


echo "<label class = 'label' for ='reserve_price'> Reserve Price:</label>";
echo "<input class = 'text' type = 'text' placeholder = 'Reserve price' name='reserve_price'  >";
echo "<br>";
echo "<br>";


echo "<label class = 'label' for= 'payment method'> Payment Method: </label>";
echo "<input class = 'text' type='text' list = 'payment_method' name = 'payment_method' placeholder='Payment Method' >";

echo "<datalist id='payment_method'>
<option value = 'Till No:'>
<option value = 'Bank Account:'>
<option value = 'Mpesa No:'>
<option value = 'Paybill No:'>
<option value = 'Cash On Delivery'>
<option value = 'Lipa Pole pole'>
</datalist>";

echo "<br>";

echo "<label class = 'label' for= 'item seller'> Seller Username:</label>";
echo "<input class = 'text' type = 'text' name = 'product_seller' placeholder='Seller Username' >";
echo "<br>";

echo "<input class = 'submit' type = 'submit' value='submit'style='margin-right: 16px'/>";

echo "<input class = 'submit' type ='reset' value = 'reset'>";

echo "<form/>";


?>
</body>
</html>
