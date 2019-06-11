<!DOCTYPE html>
<html>
<!-- 
 Project name and version: Blog.version_7
 Module name and version: Module 7.version_1
 Programmer Name: Daniel Cutrara
 Date: 6/09/2019
 Synopsis: Create the page that allows an authorized user to search for posts using multiple criteria.
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