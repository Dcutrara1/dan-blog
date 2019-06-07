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
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);

if(empty(trim($username)))
{
    die('The Username is a required field and cannot be blank.<br>');
    header('Refresh: 5;login.html');
}

if(empty(trim($password)))
{
    die('The Password is a required field and cannot be blank.<br>');
    header('Refresh: 5;login.html');
}

$query = "SELECT * FROM user WHERE email = '$username'";

$result = mysqli_query($con, $query);

$row = mysqli_fetch_array($result);

if (mysqli_affected_rows($con) > 1 )
{
    echo 'There are multiple users have registered <br>';
}
else if($password == $row['password'])
{
    if($row['admin'] == 1)
    {
        echo 'Admin User Login Successful! <br>';
        saveUserId($row['id']); // Save User ID in the Session
        header('Refresh: 2;adminManager.php');
    }
    else 
    {
        echo 'User not recognized as an Admin User. Login failed! <br>';
        header('Refresh: 4;index.html');
    }
}
else
{
    echo 'Login failed <br>';
    echo '<a href="adminLogin.html">Try Again</a>';
}
$con->close();
?>