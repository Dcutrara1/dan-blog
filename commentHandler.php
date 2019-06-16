<?php
/*
 Project name and version: Blog.version_Final
 Module name and version: Module Final.version_1
 Programmer Name: Daniel Cutrara
 Date: 6/16/2019
 Synopsis: PHP Controller that adds a comment submited by user to SQL database. 
 */

require('myfuncs.php');
$con = dbConnect();

$comment = mysqli_real_escape_string($con, $_POST["comment"]);
$star = mysqli_real_escape_string($con, $_POST["rate"]);
$userid = mysqli_real_escape_string($con, getUserId());
$postid = mysqli_real_escape_string($con, $_POST['pid']);

if(isset($_POST['postComment']))	
{
	$sql = "INSERT INTO comments (comment, star_rating, userid, postid)
	VALUES ('$comment', '$star', '$userid', '$postid');";
    
 	   if(mysqli_query($con, $sql))
  	  
  	  {
  	      $_SESSION["AddPostErrorMessage"] = "Comment was added to Blog Post.";
  	      echo 'Comment was added to Blog Post. <br>';
  	      header('Refresh: 3; comment.php?pid='.$_POST["pid"]);
  	  }
  	  else
   	 {
   	     $_SESSION["AddPostErrorMessage"] = "Comment was NOT added to Blog Post.";
   	     header('Refresh: 3; comment.php?pid='.$_POST["pid"]);
   	 }
	exit();
}
?>