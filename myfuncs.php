<?php
/*
Project name and version: Blog.version_3
Module name and version: Module 3.version_1
Programmer Name: Daniel Cutrara
Date: 5/19/2019
Synopsis: Create a new blog post, capture the new post and store in the database, 
and implement a simple language filter 
 */
 
function dbConnect()
{
    global $con;
    $host = 'us-cdbr-iron-east-02.cleardb.net';
    $username = 'bd4f97ffd852e1';
    $password = '6b182168';
    $database = 'heroku_91ac43a3f6024e6';
    
    $con = mysqli_connect($host, $username, $password, $database);
    if(mysqli_error($con))
    {
        die("Connection Failed: " . mysqli_connect_error());
    }
 
    return $con;
}

function saveUserId($id)
{
    session_start();
    $_SESSION["USER_ID"] = $id;
}

function getUserId()
{
    session_start();
    return $_SESSION["USER_ID"];
}

function forbiddenWords($post)
{
    
    $forbiddenWords = array("Army", "Navy", "Air Force", "AirForce", "Homework", "Assignments", "Work");
    
    foreach($forbiddenWords as $word)
    {
        if(stristr($post, $word))
            return true;
    }
    return false; 
}
?>