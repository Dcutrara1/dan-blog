<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Add Post</title>
	</head>
	<body>
		<form action="AddPostController.php" method="post">
			<input type="text" placeholder="Title" name="title"/>
			<br>
			<textarea name="post" rows="10" cols="30" placeholder="Blog Post"></textarea> 
			<br>
			
			<input type="submit" name="addPost" value="Add Post"/>
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