<?php

$insert = false;

if(isset($_POST['name'])){
$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server,$username,$password);

if(!$con){
	die("connection to this dataabse failed due to " . mysqli_connect_error());

}


//echo "Success connecting to the database";
$name = $_POST['name'];
$age  = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone  = $_POST['phone'];
$desc = $_POST['desc'];

$sql =  
" INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`,`dt` ) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc' , current_timestamp());";


if($con->query($sql) == true)
{
//echo "Successfully done you are reqistered:";
$insert = true;
}

else{
echo "ERROR : $sql <br> $con->error";
}

$con->close();

}
?>


<!DOCTYPE html>
<html>
<head>
	<title> my webpage </title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link  href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
</head>
<body>
<div class="bgimg"></div>
	<h1>travel form </h1>
	<p class="para">Enter your details and conform your trip</p>
<?php
if($insert == true){
	echo "<p  class='para' class='submitmsg' style='color: red'>THANKS FOR SUBMITTING YOUR FORM WE ARE HAPPY TO CONNECT WITH YOU ....</p>";
}
?>
	<form action="index.php" method="post">
		<p>Name</p>
		<input type="text" name="name" id="name" placeholder="Enter your name">
		<p>age</p>
		<input type="text" name="age" id="age" placeholder="Enter your age">
		<p>gender</p>
		<input type="text" name="gender" id="gender" placeholder="Enter your gender">
		<p>email</p>
		<input type="email" name="email" id="email" placeholder="Enter your email">
		<p>phone number</p>
		<input type="phone" name="phone" id="phone" placeholder="Enter your phone">
           <p>comments...</p>
		<textarea name = "desc" id="desc" cols="30" rows= "5" placeholder="Enter your comments...">
			
		</textarea>
   <button class="btn">Submit</button>
   <button class="btn">Reset</button>
	</form>


<script type="text/javascript" href = "script.js"></script>
</body>
</html>
