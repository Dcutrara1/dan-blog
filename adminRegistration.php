<?php
/*
  Project name and version: Blog.version_6
 Module name and version: Module 6.version_1
 Programmer Name: Daniel Cutrara
 Date: 6/02/2019
 Synopsis: Create the page that displays the content of the blog site. 
 Create a management interface for the blog administrator to manage user roles and permissions.
 */  

// Connect to database
require('myfuncs.php');
$con = dbConnect();

// create short variable names
$firstname = mysqli_real_escape_string($con, $_POST['FirstName']);
$lastname = mysqli_real_escape_string($con, $_POST['LastName']);
$email = mysqli_real_escape_string($con, $_POST['Email']);
$password = mysqli_real_escape_string($con, $_POST['Password']);
$adminkey = ($_POST['AdminKey']);
 
if($adminkey == "blog")
{
    $admin = True;

    $sql = "INSERT INTO user (firstname, lastname, email, password, admin) 
    VALUES ('$firstname', '$lastname', '$email','$password', '$admin')";
        if(!mysqli_query($con, $sql))
        {
            echo 'The admin was not added.<br>';
        }
        else
        {
            echo 'Admin inserted.<br>';
        }   
        $con->close();
}
else
{
    echo 'Invalid Admin Key. The admin was not added.<br>';
}
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
<a href="adminLogin.html" class="next">Admin Login &raquo;</a>
</body>
</html>
