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

if (isset($_GET['edit'])) 
{
	$id = $_GET['edit'];
	$update = true;
	$record = mysqli_query($db, "SELECT * FROM posts WHERE id=$id");

	if (count($record) == 1 ) 
	{
		$n = mysqli_fetch_array($record);
		$title = $n['title'];
		$author = $n['author'];
        $textarea = $n['textarea'];
	}   	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD: Create, Update, Delete PHP MySQL</title>
        <link rel="stylesheet" type="text/css" href="style.css">
<style>
* { box-sizing: border-box; }
body { margin: 0; }
.header { background-color: #82bcfd; padding: 1px; text-align: center; } /* Style the header */
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
  	<a href="userManager.php">Blog User Adminstration</a>
  	<a href="index.html">Home Page</a>
	</div>
    
  <?php $results = mysqli_query($db, "SELECT * FROM posts"); ?>
  <fieldset>
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
				<a href="crud.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php 
	} ?>
</table>
     <form method="post" action="server.php" >
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
        
        <div>
         <h4>Edit Blog Post</h4>
             <!--/ newly added field -->
             <input type="hidden" name="id" value="<?php echo $id; ?>">
             <!--/ modified Field -->
             <input type="text" name="updateTitle" value="<?php echo $title; ?>">
             <input type="text" name="updateAuthor" value="<?php echo $author; ?>">
             <input type="text" name="updateTextarea" value="<?php echo $textarea; ?>">
	    
	    </div>
        <p>
           <?php if ($update == true): ?>
	       <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
           <?php else: ?>
           <br>
	       <button class="btn" type="submit" name="save" >Save</button>
           <?php endif ?>
     	</p> 
     	       
	</form>
	</fieldset>
   </body>
</html>