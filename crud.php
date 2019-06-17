<?php
/*
 Project name and version: Blog.version_Final
 Module name and version: Module Final.version_1
 Programmer Name: Daniel Cutrara
 Date: 6/16/2019
 Synopsis: PHP page for admin user to edit or delete blog posts from users. 
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
.header img { float: left; width: 90px; height: 66px; background: #82bcfd; }
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
  	<h1><IMG SRC="Blogger-Logo.jpg">Dan's Blog</h1>
  	<p>Where you can read the latest and the greatest!</p>
	</div>

	<div class="topnav">
  	<a href="userManager.php">Blog User Adminstration</a>
  	<a href="search.html">Blog Search</a>
  	<a href="userView.php">User View</a>
  	<a href="index.html">Home Page</a>
  	<a href="index.html">Log Out</a>
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
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn"
				 onclick="return confirm('Are you sure you want to delete this post?');"> Delete</a>
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
        	<br>
           <?php if ($update == true): ?>
	       <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
           <?php else: ?>
           
	       <button class="btn" type="submit" name="save" >Save</button>
           <?php endif ?>
     	</p> 
     	       
	</form>
	</fieldset>
   </body>
</html>