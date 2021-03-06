<?php 
/*
 Project name and version: Blog.version_Final
 Module name and version: Module Final.version_1
 Programmer Name: Daniel Cutrara
 Date: 6/16/2019
 Synopsis: PHP Controller which accepts user input and determines if credentials are in the database and grant access.
 */

// Connect to database
require('myfuncs.php');
$con = dbConnect();

// create short variable names
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);

if(empty(trim($username)))
{
    echo('The Username is a required field and cannot be blank.<br>');
    header('Refresh: 3;adminLogin.html');
    exit();
}

if(empty(trim($password)))
{
    echo('The Password is a required field and cannot be blank.<br>');
    header('Refresh: 3;adminLogin.html');
    exit();
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
        header('Refresh: 2;crud.php');
        exit();
    }
    else 
    {
        echo 'User not recognized as an Admin User. Login failed! <br>';
        header('Refresh: 4;index.html');
        exit();
    }
}
else
{
    echo 'Login failed <br>';
    echo '<a href="adminLogin.html">Try Again</a>';
}
$con->close();
?>