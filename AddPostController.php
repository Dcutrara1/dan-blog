<?php
/*
 Project name and version: Blog.version_3
 Module name and version: Module 3.version_1
 Programmer Name: Daniel Cutrara
 Date: 5/19/2019
 Synopsis: Create a new blog post, capture the new post and store in the database,
 and implement a simple language filter
 */

//Get database connection
require('myfuncs.php');
$conn = dbConnect();

//Get Variables
$title = mysqli_real_escape_string($conn, $_POST["title"]);
$post = mysqli_real_escape_string($conn, $_POST["post"]);
$userid = mysqli_real_escape_string($conn, getUserId());

if(forbiddenWords($post))
{
    $_SESSION["AddPostErrorMessage"] = "There was one or more words you used that are forbidden.";
    header('Location: addPostView.php');
    exit;
}
else
    $_SESSION["AddPostErrorMessage"] = null;
    
    if(strlen($post) > 10000)
    {
        $_SESSION["AddPostErrorMessage"] = "Your post was too long, start over.";
        header('Location: addPostView.php');
        exit;
    }
    
    $sql = "INSERT INTO posts (userid, post, posttitle) VALUES ('$userid', '$post', '$title');";
    if(mysqli_query($conn, $sql))
       $_SESSION["AddPostErrorMessage"] = "Post added to database.";
    
    else 
       $_SESSION["AddPostErrorMessage"] = "Post was NOT added to database.";
       header('Location: addPostView.php');
            
?>