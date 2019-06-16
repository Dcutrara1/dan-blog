<!DOCTYPE html>
<html>
<!-- 
 Project name and version: Blog.version_Final
 Module name and version: Module Final.version_1
 Programmer Name: Daniel Cutrara
 Date: 6/16/2019
 Synopsis: HTML page designed to display blog posts from database when called in application. 
 -->
<head>
	<title>Blog Posts</title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>   
<body>
<fieldset>
 <h3 align="center">Dan's Blog</h3>
  <table>
	<thead>
		<tr>
			<th>Title</th>
			<th>Author</th>
			<th colspan="2">Text Area</th>
		</tr>
	</thead>
<?php 
	for($i=0; $i<count($posts); $i++)
	{
	    echo"<tr>"."<td>"
		   .$posts[$i][1]."</td><td>"
           .$posts[$i][2]."</td><td>"
           .$posts[$i][3]."</td>"."</tr>";
	}
	?>
</table>
</fieldset>
</body>	
</html>