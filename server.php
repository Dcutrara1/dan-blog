<?php
/*
 Project name and version: Blog.version_Final
 Module name and version: Module Final.version_1
 Programmer Name: Daniel Cutrara
 Date: 6/16/2019
 Synopsis: PHP page accpts input from admin user to update, delete, or add a Post to blog site. 
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

if(empty(trim($title)))
{
    echo 'The Title is a required field for a blog post and cannot be blank.<br>';
    header('Refresh: 2; crud.php');
    exit();
}
if(empty(trim($author)))
{
    echo 'The Author is a required field for a blog post and cannot be blank.<br>';
    header('Refresh: 2; crud.php');
    exit();
}
if(empty(trim($textarea)))
{
    echo 'The Text Area is a required field for a blog post and cannot be blank.<br>';
    header('Refresh: 2; crud.php');
    exit();
}

if(isset($_GET['del']))
{  
    $id = mysqli_real_escape_string($con, $_GET['del']);
    $sql = "Delete from posts where id='$id'";
    mysqli_query($con, $sql);
    mysqli_close($con);
    echo 'Post was deleted from the database. <br>';
    header('Refresh: 2; crud.php');
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
  	      header('Refresh: 2;crud.php');
  	  }
  	  else
   	 {
   	     $_SESSION["AddPostErrorMessage"] = "Post was NOT added to database.";
   	     header('Refresh: 2;crud.php');
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
	echo 'Records were updated successfully. <br>';
	header('Refresh: 2;crud.php');
	exit();
}
?>