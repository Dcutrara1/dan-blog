<html>
<!-- 
 Project name and version: Blog.version_7
 Module name and version: Module 7.version_1
 Programmer Name: Daniel Cutrara
 Date: 6/09/2019
 Synopsis: Create the page that allows an authorized user to search for posts using multiple criteria.
 -->
	<head>
		<meta charset="ISO-8859-1">
		<title>Add Post</title>
	</head>
	<body>
		<form action="AddPostController.php" method="post">
			<input type="text" placeholder="Title" name="title"/>
			<br>
			<textarea name="post" rows="25" cols="50" placeholder="Blog Post"></textarea> 
			<br>
			
			<input type="submit" name="add Post" value="Add Post"/>
			<input type="button" value="View Blog" onclick="location='blogView.php'" />
		</form> 		
<?php
session_start();
if (isset($_SESSION["AddPostErrorMessage"]))
{
    echo '<p>'.$_SESSION["AddPostErrorMessage"].'</p>';
}
?>
	</body>
</html>