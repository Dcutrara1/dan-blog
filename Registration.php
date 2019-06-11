<?php
/*
 Project name and version: Blog.version_7
 Module name and version: Module 7.version_1
 Programmer Name: Daniel Cutrara
 Date: 6/09/2019
 Synopsis: Create the page that allows an authorized user to search for posts using multiple criteria.
 */  

// Connect to database
require('myfuncs.php');
$con = dbConnect();

// create short variable names
$firstname = mysqli_real_escape_string($con, $_POST['FirstName']);
$lastname = mysqli_real_escape_string($con, $_POST['LastName']);
$email = mysqli_real_escape_string($con, $_POST['Email']);
$password = mysqli_real_escape_string($con, $_POST['Password']);
 
$sql = "INSERT INTO user (firstname, lastname, email, password) 
VALUES ('$firstname', '$lastname', '$email','$password')";
    if(!mysqli_query($con, $sql))
    {
        echo 'The name was not added.<br>';
    }
    else
    {
        echo 'Name inserted.<br>';
        
    } 
    $con->close();    
?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
	a { text-decoration: none; display: inline-block; padding: 8px 16px; }
	a:hover { background-color: #ddd; color: black; }
	.previous { background-color: #f1f1f1; color: black; }
	.next { background-color: #4CAF50; color: white; }
	.round { border-radius: 50%; }
</style>
<body>
<a href= "index.html" class="next">&laquo; Home</a>
<a href="login.html" class="next">Login &raquo;</a>
</body>
</html>
