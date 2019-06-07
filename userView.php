<?php
/*
 Project name and version: Blog.version_6
 Module name and version: Module 6.version_1
 Programmer Name: Daniel Cutrara
 Date: 6/02/2019
 Synopsis: Create the page that displays the content of the blog site. 
 Create a management interface for the blog administrator to manage user roles and permissions.
 */
?>

<?php 
include 'configdb.php';
$db = dbConnect();
?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD: Create, Update, Delete PHP MySQL</title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>   
<body>
 <?php $results = mysqli_query($db, "SELECT * FROM posts"); ?>
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
   </body>
</html>