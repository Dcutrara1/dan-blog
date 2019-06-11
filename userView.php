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
	<title>Blog PostsL</title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>   
<body>
<fieldset>
 <?php $results = mysqli_query($db, "SELECT * FROM posts"); ?>
 <h2 align="center">Dan's Blog</h2>
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
	       <input class="btn" type="button" value="search blog" onclick="location='search.html'" />
	       <input class="btn" type="button" value="Main Menu" onclick="location='index.html'" />
     	</p>           
	</form>
	</fieldset>
   </body>
</html>