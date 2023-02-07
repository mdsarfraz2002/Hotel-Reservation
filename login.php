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
        $query = "select * from users where user_name ='$user_name' limit 1";
        
        $result= mysqli_query($con, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result)>0)
            {
             $user_data =mysqli_fetch_assoc($result) ;
             
             if($user_data['password']==$password)
             {
                    $_SESSION['user_name'] = $user_data['user_name'];
                header("Location: restuarant.php");
                die;
             }
            }
        }
        echo '<span style="color:#c10400;text-align:center;">Wrong User Name or Password!</span>';
        echo '<span style="color:#c10400;text-align:center;">Please Try Again</span>';
    }else
    {
        
        echo '<span style="color:#c10400;text-align:center;">Wrong User Name or Password!</span>';
        echo '<span style="color:#c10400;text-align:center;">Please Try Again</span>';
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="style1.css">
</head>
<body>
	<div class="box">
		<form autocomplete="off" method="post">
			<h2>SIGN IN</h2>
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
            <br>
            <br>
			<center><input type="submit" value="Login"></center>
            </form>
	</div>
	<br>
	<h2>New User?</h2><div class="box1"></div>
	<a href="signup.php"><input type="submit" value="SIGN UP"></a>
    
</body>
</html>