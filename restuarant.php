<?php
session_start();
include("connection.php");
include("function.php");
$user_data = check_login($con);
$_SESSION;
?>

<html>
    <head><title>Restuarant</title></head>
    <frameset rows="30%,70%" border="0">
        <frame src="top_page.html" name="Top_page">
        <frame src="bottom_page.html" name="bottom_page">
    </frameset>
</html>