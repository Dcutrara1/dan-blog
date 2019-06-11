<?php
/*
 Project name and version: Blog.version_7
 Module name and version: Module 7.version_1
 Programmer Name: Daniel Cutrara
 Date: 6/09/2019
 Synopsis: Create the page that allows an authorized user to search for posts using multiple criteria.
 */

require('myfuncs.php');
$con = dbConnect();

if(!isset($_POST['update']))
{
    $title = mysqli_real_escape_string($con, $_POST["title"]);
    $author = mysqli_real_escape_string($con, $_POST["author"]);
    $textarea = mysqli_real_escape_string($con, $_POST["textarea"]);
    $userid = mysqli_real_escape_string($con, getUserId());
}
else
{
    $title = mysqli_real_escape_string($con, $_POST["updateTitle"]);
    $author = mysqli_real_escape_string($con, $_POST["updateAuthor"]);
    $textarea = mysqli_real_escape_string($con, $_POST["updateTextarea"]);
    $userid = mysqli_real_escape_string($con, getUserId());
}


if(isset($_GET['del']))
{
    $id = mysqli_real_escape_string($con, $_GET['del']);
    $sql = "Delete from posts where id='$id'";
    mysqli_query($con, $sql);
    mysqli_close($con);
    header('Location: crud.php');
    exit;
}

if(isset($_POST['save']))	
{
	if(forbiddenWords($textarea))
	{
	    $_SESSION["AddPostErrorMessage"] = "There was one or more words you used that are forbidden.";
	    header('Refresh: 2;crud.php');
	    exit;
	}
	else
 	   $_SESSION["AddPostErrorMessage"] = null;
    
	if(strlen($textarea) > 10000)
	{
 	   $_SESSION["AddPostErrorMessage"] = "Your post was too long, start over.";
 	   header('Refresh: 2;crud.php');
 	   exit;    
	}  

	$sql = "INSERT INTO posts (userid, title, author, textarea)
	VALUES ('$userid', '$title', '$author', '$textarea');";
    
 	   if(mysqli_query($con, $sql))
  	  
  	  {
  	      $_SESSION["AddPostErrorMessage"] = "Post was added to database.";
  	      echo 'Post was added to database. <br>';
  	      header('Refresh: 3;crud.php');
  	  }
  	  else
   	 {
   	     $_SESSION["AddPostErrorMessage"] = "Post was NOT added to database.";
   	     header('Refresh: 5;crud.php');
   	 }
	exit();
}
if(isset($_POST['update']))
{
    $id = mysqli_real_escape_string($con, $_POST['id']);
	$sql = "UPDATE posts SET userid = '$userid', title='$title', 
    author='$author', textarea='$textarea' where id='$id'";
	mysqli_query($con, $sql);
	mysqli_close($con);
	header('Location: crud.php');
	exit();
}
?>