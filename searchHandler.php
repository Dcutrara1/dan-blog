<html>
<!-- 
 Project name and version: Blog.version_7
 Module name and version: Module 7.version_1
 Programmer Name: Daniel Cutrara
 Date: 6/09/2019
 Synopsis: Create the page that allows an authorized user to search for posts using multiple criteria.
 -->
<head>
	<title>Search Results</title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>   
<body>
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
    die('Search criteria is required and cannot be blank.<br>');
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
<input class="btn" type="button" value="Blog Posts" onclick="location='userView.php'" />
<input class="btn" type="button" value="Search Again" onclick="location='search.html'" />
<input class="btn" type="button" value="Main Menu" onclick="location='index.html'" />
</fieldset>
</body>
</html>