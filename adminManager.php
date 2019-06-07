<!DOCTYPE html>
<!--
 Project name and version: Blog.version_6
 Module name and version: Module 6.version_1
 Programmer Name: Daniel Cutrara
 Date: 6/02/2019
 Synopsis: Create the page that displays the content of the blog site. 
 Create a management interface for the blog administrator to manage user roles and permissions.
 -->
 
<html>
<head>
<meta charset="ISO-8859-1">
<title>Login Form</title>
</head>
<style>
	a { text-decoration: none; display: inline-block; padding: 8px 16px; }
	a:hover { background-color: #ddd; color: black; }
	.previous { background-color: #f1f1f1; color: black; }
	.next { background-color: #4CAF50; color: white; }
	.round { border-radius: 50%; }
	
	fieldset { width: 33%; border: 2px solid black; } 
	legend { font-weight: bold; font-size: 125%; } 
	label { width: 125px; float: left; text-align: left; font-weight: bold; } 
	input { border: 1px solid #000; padding: 3px; } 
	button { margin-top: 12px; } 
</style>
<body>
<fieldset>
	<legend>Admin Management</legend> 	
	<a href="crud.php" class="previous">&laquo; Blog Page Administration</a>
	<a href="userManager.php" class="next">Blog User Adminstration &raquo;</a>		
</fieldset> 
</body>
</html>