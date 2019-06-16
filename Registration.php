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
 
$sql = "INSERT INTO user (firstname, lastname, email, password) 
VALUES ('$firstname', '$lastname', '$email','$password')";
    if(!mysqli_query($con, $sql))
    {
        echo 'The user was not added.<br>';
    }
    else
    {
        echo 'Blog User added to database.<br>';
        
    } 
    $con->close();    
    header('Refresh: 2;login.html');
?>