<?php
/*
 Project name and version: Blog.version_Final
 Module name and version: Module Final.version_1
 Programmer Name: Daniel Cutrara
 Date: 6/16/2019
 Synopsis: PHP page that reviews credentials input to determine whether to grant user access or not. 
 */  

// Connect to database
require('myfuncs.php');
$con = dbConnect();

// create short variable names
$firstname = mysqli_real_escape_string($con, $_POST['FirstName']);
$lastname = mysqli_real_escape_string($con, $_POST['LastName']);
$email = mysqli_real_escape_string($con, $_POST['Email']);
$password = mysqli_real_escape_string($con, $_POST['Password']);

if(empty(trim($firstname)))
{ 
    echo 'The First Name is a required field and cannot be blank.<br>'; 
    header('Refresh: 2; register.html');
    exit();
}
if(empty(trim($lastname)))
{ 
    echo 'The Last Name is a required field and cannot be blank.<br>'; 
    header('Refresh: 2; register.html');
    exit();
}
if(empty(trim($email)))
{ 
    echo 'The email is a required field and cannot be blank.<br>';
    header('Refresh: 2; register.html');
    exit();
}
if(empty(trim($password)))
{ 
    echo 'The password is a required field and cannot be blank.<br>';
    header('Refresh: 2; register.html');
    exit();
}

$dup = "Select * FROM user WHERE email = '$email'";
$result = mysqli_query($con, $dup);  
if(mysqli_num_rows($result)>0)
{
    echo 'User already exists. Unable to register.';
    header('Refresh: 3;register.html'); 
}
else 
{
    $sql = "INSERT INTO user (firstname, lastname, email, password) 
    VALUES ('$firstname', '$lastname', '$email','$password')";
    mysqli_query($con, $sql);    
    echo 'Blog User added to database.<br>';
    header('Refresh: 2;login.html');
    $con->close();    
}
?>