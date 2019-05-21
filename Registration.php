<?php
/*
Project name and version: Blog.version_3
Module name and version: Module 3.version_1
Programmer Name: Daniel Cutrara
Date: 5/19/2019
Synopsis: Create a new blog post, capture the new post and store in the database, 
and implement a simple language filter 
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

<a href="login.html" class="button">Login &raquo;</a>