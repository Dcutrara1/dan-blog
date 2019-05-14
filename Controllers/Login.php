<!--
Project name and version: Blog.version_2 
Module name and version: Module 2.version_1
Programmer Name: Daniel Cutrara
Date: 5/12/2019
Synopsis: Added User login page and index page to Blog.  
 -->
 
 <?php

$host = 'us-cdbr-iron-east-02.cleardb.net';
$username = 'bd4f97ffd852e1';
$password = '6b182168';
$database = 'heroku_91ac43a3f6024e6';

$con = mysqli_connect($host, $username, $password, $database);
if(mysqli_error($con))
{
    die("Connection Failed: " . mysqli_connect_error());
}

// create short variable names
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);

if(empty(trim($username)))
{
    die('The Username is a required field and cannot be blank.<br>');
}

if(empty(trim($password)))
{
    die('The Password is a required field and cannot be blank.<br>');
}

$query = "SELECT * FROM user WHERE USERNAME = '$username'";

$result = mysqli_query($con, $query);

$row = mysqli_fetch_array($result);

if (mysqli_affected_rows($con) > 1 )
{
    echo 'There are multiple users have registered <br>';
}
else if($password == $row['PASSWORD'])
{
    echo 'Login was successful <br>';
}
else
{
    echo 'Login failed <br>';
}
$con->close();
?>