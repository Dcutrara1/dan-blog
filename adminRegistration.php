<?php
/*
 Project name and version: Blog.version_Final
 Module name and version: Module Final.version_1
 Programmer Name: Daniel Cutrara
 Date: 6/16/2019
 Synopsis: PHP page that reviews credentials input to determine whether to grant admin access or not. 
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

if(empty(trim($firstname)))
{ die('The First Name is a required field and cannot be blank.<br>'); }

if(empty(trim($lastname)))
{ die('The Last Name is a required field and cannot be blank.<br>'); }

if(empty(trim($email)))
{ die('The email is a required field and cannot be blank.<br>'); }

if(empty(trim($password)))
{ die('The password is a required field and cannot be blank.<br>');}

if(empty(trim($adminkey)))
{ die('The adminKey is a required field and cannot be blank.<br>');}

if($adminkey == "blog")
{
    $admin = True;

    $sql = "INSERT INTO user (firstname, lastname, email, password, admin) 
    VALUES ('$firstname', '$lastname', '$email','$password', '$admin')";
        if(!mysqli_query($con, $sql))
        {
            echo 'The admin user was not added.<br>';
        }
        else
        {
            echo 'New Admin user registered.<br>';
            header('Refresh: 2; adminLogin.html');
        }   
        $con->close();
}
else
{
    echo 'Invalid Admin Key. The admin user was not added.<br>';
    header('Refresh: 2; adminRegister.html');
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

</body>
</html>
