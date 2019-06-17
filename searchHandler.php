<html>
<!-- 
 Project name and version: Blog.version_Final
 Module name and version: Module Final.version_1
 Programmer Name: Daniel Cutrara
 Date: 6/16/2019
 Synopsis: PHP page that returns the results of SQL search based on criteria entered in search page. 
 -->
<head>
	<title>Search Results</title>
        <link rel="stylesheet" type="text/css" href="style.css">
<style>
* { box-sizing: border-box; }
body { margin: 0; }
.header { background-color: white; padding: 1px; text-align: center; } /* Style the header */
.topnav { overflow: hidden; background-color: #333; } /* Style the top navigation bar */
.topnav a { float: left; display: block; color: #f2f2f2; text-align: center; 
			padding: 14px 16px; text-decoration: none; } /* Style the topnav links */ 
.topnav a:hover { background-color: #ddd; color: black; } /* Change color on hover */ 
</style>
</head>   
<body>
<div class="header">
  	<h1>Dan's Blog</h1>
  	<p>Where you can read the latest and the greatest!</p>
	</div>

	<div class="topnav">
  	<a href="search.html">Search Again</a>
  	<a href="userView.php">User View</a>
  	<a href="index.html">Home Page</a>
	</div>
<fieldset>
<?php
/*
 ...
 */

require ('myfuncs.php');

$con = dbConnect();

// create short variable names
$searchCriteria = mysqli_real_escape_string($con, $_POST['searchCriteria']);
$posts = getPostsBySearch($searchCriteria);

if(empty(trim($searchCriteria)))
{
    echo 'Search criteria is required and cannot be blank.<br>';
    header('Refresh: 5; search.html');
    exit;
}

if ($posts == null)
{
    echo 'There are no posts found based on the search criteria. <br>';
}
else 
{
    echo '<h3>Search Results</h3>';
    include('_displayPosts.php');
}
?>
<input class="btn" type="button" value="Search Again" onclick="location='search.html'" />
</fieldset>
</body>
</html>