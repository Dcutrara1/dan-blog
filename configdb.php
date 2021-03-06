<?php
/*
 Project name and version: Blog.version_Final
 Module name and version: Module Final.version_1
 Programmer Name: Daniel Cutrara
 Date: 6/16/2019
 Synopsis: PHP configuration page for blog site. 
 */

	session_start();        
	
	// Connect to database
	require('myfuncs.php');
	$db = dbConnect();
 
	// initialize blog_post table variables 
	$title = "";
	$author = "";
    $textarea = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) 
	{
        // variables for input data
		$title = $_POST['title'];
		$author = $_POST['author'];
        $textarea = $_POST['textarea'];

		mysqli_query($db, "INSERT INTO posts(title, author, textarea) VALUES ('$title', '$author', '$textarea')"); 
		$_SESSION['message'] = "Blog saved";    
	}
        
    if (isset($_POST['update'])) 
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $textarea = $_POST['textarea'];
       	
        mysqli_query($db, "UPDATE posts SET title = '$title', author = '$author', textarea = '$textarea' WHERE id=$id");
	    $_SESSION['message'] = "Blog updated!"; 
	    header('location: crud.php');                   
    }
       
    if (isset($_POST['del'])) 
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $textarea = $_POST['textarea'];
        
        mysqli_query($db, "DELETE FROM posts WHERE id=$id");
        $_SESSION['message'] = "Blog deleted!"; 
        header('location: crud.php');    
    }  
    
    if (isset($_GET['del'])) 
    {
        $id = $_GET['del'];
	
        mysqli_query($db, "DELETE FROM blog_post WHERE id=$id");
        $_SESSION['message'] = "BLOG deleted!"; 
        header('location: crud.php');
    }
?>
