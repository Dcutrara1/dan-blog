<?php
/*
 Project name and version: Blog.version_7
 Module name and version: Module 7.version_1
 Programmer Name: Daniel Cutrara
 Date: 6/09/2019
 Synopsis: Create the page that allows an authorized user to search for posts using multiple criteria.
 */
?>

<?php 
include 'configdb.php';
$db = dbConnect();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Blog Posts</title>
        
<style>
.header img { float: left; width: 90px; height: 66px; background: #82bcfd; }
* { box-sizing: border-box; }
body { margin: 0; }
.header { background-color: #82bcfd; padding: 1px; text-align: center; } /* Style the header */
.topnav { overflow: hidden; background-color: #333; } /* Style the top navigation bar */
.topnav a { float: left; display: block; color: #f2f2f2; text-align: center; 
			padding: 14px 16px; text-decoration: none; } /* Style the topnav links */ 
.topnav a:hover { background-color: #ddd; color: black; } /* Change color on hover */ 
</style>
<link rel="stylesheet" type="text/css" href="style.css">
</head>   
<body>
<fieldset>
 <?php $results = mysqli_query($db, "SELECT * FROM posts"); ?>
<div id="example1">
</div>
<div class="header">
  <h1><IMG SRC="Blogger-Logo.jpg">Dan's Blog</h1>
  <p>Where you can read the latest and the greatest!</p>
</div>

<div class="topnav">
  <a href="search.html">Blog Search</a>
  <a href="adminLogin.html">Admin User Login</a>
  <a href="index.html">Home Page</a>
   <a href="index.html">Log Out</a>
</div>
  <table>
	<thead>
		<tr>
			<th>Title</th>
			<th>Author</th>
			<th colspan="2">Text Area</th>
		</tr>
	</thead>
	<?php while ($row = mysqli_fetch_array($results)) 
	{ ?>
		<tr>
			<td><?php echo $row['title']; ?></td>
			<td><?php echo $row['author']; ?></td>   
            <td><?php echo $row['textarea']; ?></td>
            <td>
				<a href="comment.php?pid=<?php echo $row['id']; ?>" class="comment_btn" >Comment</a>
			</td>
		</tr>
	<?php 
	} ?>
</table>
     <form method="post" action="userServer.php" >
   <!-- This code displays a confirmation message to tell the user that a new record has been created in the database.-->      
   <?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
    <?php endif ?>
  <!--To retrieve the database records and display them on the page, add this code. -->  
		 <h3>Add a Blog Post!</h3>
		<div class="input-group">
			<label>Title</label>
			<input type="text" name="title" value="">
		</div>
		<div class="input-group">
			<label>Author</label>
			<input type="text" name="author" value="">
		</div>
               <div class="input-group">
			<label>Text Area</label>
			<input type="text" name="textarea" value="">
		</div>
		<div class="input-group">		
		</div>
        
        <p>      
	       <button class="btn" type="submit" name="save" >Save</button>
     	</p>           
	</form>
	</fieldset>
   </body>
</html>