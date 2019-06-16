<?php
/*
 Project name and version: Blog.version_Final
 Module name and version: Module Final.version_1
 Programmer Name: Daniel Cutrara
 Date: 6/16/2019
 Synopsis: List of all functions used through the blog site. 
 */
 
function dbConnect()
{
    global $con;
    $host = 'dan-blog-mysqldbserver.mysql.database.azure.com';
    $username = 'mysqldbuser@dan-blog-mysqldbserver';
    $password = 'BlogPass1';
    $database = 'dan-blog';
    
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

function getAllPosts()
{
    $posts = array();
    $con = dbConnect();
    $sql = "Select * from posts";
    $result = mysqli_query($con, $sql);
    while($row = mysqli_fetch_array($result))
    {
        $posts[] = array($row['id'], $row['userid'], $row['title'], $row['author'], $row['textarea']);
    }
    mysqli_close();
    return $posts;
}

function getUsersPosts()
{
    $posts = array();
    $con = dbConnect();
    $user = mysqli_escape_string($con, getUser());
    $sql = "Select * from posts where userid='$user'";
    $result = mysqli_query($con, $sql);
    while($row = mysqli_fetch_array($result))
    {
        $posts[] = array($row['id'], $row['userid'], $row['title'], $row['author'], $row['textarea']);
    }
    mysqli_close();
    return $posts;
}

function getPostsByTitle($searhCriteria)
{
    $posts = array();
    $con = dbConnect();
    $search = mysqli_real_escape_string($con, $searhCriteria);
    $query = "SELECT * FROM posts WHERE title LIKE '%$search%'";
    $result = mysqli_query($con, $query);
    
    While($row = mysqli_fetch_array($result))
    {
        $posts[] = array($row["id"], $row["title"], $row["author"], $row["textarea"]);
    }
    
    mysqli_close($con);
    return $posts;
}
function getPostsBySearch($searhCriteria)
{
    $posts = array();
    $con = dbConnect();
    $search = mysqli_real_escape_string($con, $searhCriteria);
    $query = "SELECT * FROM posts WHERE title LIKE '%$search%' or author LIKE '%$search%' or textarea LIKE '%$search%'";
    $result = mysqli_query($con, $query);
    
    While($row = mysqli_fetch_array($result))
    {
        $posts[] = array($row["id"], $row["title"], $row["author"], $row["textarea"]);
    }
    
    mysqli_close($con);
    return $posts;
}

function getPostsById($searhCriteria)
{
    $posts = array();
    $con = dbConnect();
    $search = mysqli_real_escape_string($con, $searhCriteria);
    $query = "SELECT * FROM posts WHERE id = '$search'";
    $result = mysqli_query($con, $query);
    
    While($row = mysqli_fetch_array($result))
    {
        $posts[] = array($row["id"], $row["title"], $row["author"], $row["textarea"]);
    }
    
    mysqli_close($con);
    return $posts;
}

function getCommentsByPid($searhCriteria)
{
    $postsComments = array();
    $con = dbConnect();
    $search = mysqli_real_escape_string($con, $searhCriteria);
    $query = "SELECT * FROM comments WHERE postid = '$search'";
    $result = mysqli_query($con, $query);
    
    While($row = mysqli_fetch_array($result))
    {
        $postsComments[] = array($row["comment"], $row["star_rating"]);
    }
    
    mysqli_close($con);
    return $postsComments;
}
?>