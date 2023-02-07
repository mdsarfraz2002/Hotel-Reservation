<?php
session_start();
include("connection.php");
include("function.php");

if($_SERVER['REQUEST_METHOD']=="POST")
{
   $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password)&& !is_numeric($user_name))
    {
        
        $query = "insert into users (user_name,password) values('$user_name','$password')";
        
        mysqli_query($con, $query);
          
          header("Location:login.php");
        die;
    }else
    {
        echo "please enter some valid info";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Animated Login Form</title>
	<link rel="stylesheet" href="style1.css">
</head>
<body >
	<div class="box">
		<form autocomplete="off" method="post">
			<h2>SIGN UP</h2>
            <div class="inputBox">
				<input type="text" required="required" name="fname" id="text">
				<span>Name</span>
				<i></i>
			</div>
			<div class="inputBox">
				<input type="text" required="required" name="user_name" id="text">
				<span>Userame</span>
				<i></i>
			</div>
			<div class="inputBox">
				<input type="password" required="required" name="password" id="text">
				<span>Password</span>
				<i></i>
			</div>
			<center><input type="submit" value="Let's Go"></center>
		</form>
	</div>
	<br>
	<h2>Registered User?</h2><div class="box2"></div>
	<a href="login.php"><input type="submit" value="SIGN IN"></a>
</body>
</html>