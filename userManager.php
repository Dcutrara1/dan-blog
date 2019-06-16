<?php
/*
 Project name and version: Blog.version_Final
 Module name and version: Module Final.version_1
 Programmer Name: Daniel Cutrara
 Date: 6/16/2019
 Synopsis: PHP page allows admin user to update, delete, or add a Post to blog site. 
 */
?>

<?php 
include 'configdb.php';
$db = dbConnect();

if (isset($_GET['edit'])) 
{
	$id = $_GET['edit'];
	$update = true;
	$record = mysqli_query($db, "SELECT * FROM user WHERE id=$id");

	if (count($record) == 1 ) 
	{
		$n = mysqli_fetch_array($record);
		$firstname = $n['firstname'];
		$lastname = $n['lastname'];
        $email = $n['email'];
        $password = $n['password'];
        $admin = $n['admin'];
	}   	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>User Manager: Create, Update, Delete PHP MySQL</title>
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
  	<a href="crud.php">Blog Post Administration</a>
  	<a href="index.html">Home Page</a>
	</div>
    <?php $results = mysqli_query($db, "SELECT * FROM user"); ?>
  <fieldset>
  <table>
  	<thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>User Name</th>
			<th>password</th>
			<th>Admin User</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) 
	{ ?>
		<tr>
			<td><?php echo $row['firstname']; ?></td>
			<td><?php echo $row['lastname']; ?></td>   
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['admin']; ?></td>
			<td>
				<a href="userManager.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="managerServer.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php 
	} ?>
</table>
     <form method="post" action="managerServer.php" >
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
 		<h3>Add a New User</h3>
		<div class="input-group">
			<label>First Name</label>
			<input type="text" name="firstname" value="">
		</div>
		
		<div class="input-group">
			<label>Last Name</label>
			<input type="text" name="lastname" value="">
		</div>
        
        <div class="input-group">
			<label>User Name</label>
			<input type="text" name="email" value="">
		</div>
		
		<div class="input-group">
			<label>Password</label>
			<input type="text" name="password" value="">
		</div>
		
		<div class="input-group">
			<label>Admin User</label>
			<input type="text" name="admin" value="">
		</div>
		
		<div class="input-group">		
		</div>
        
        <div>
        <h4>Edit User Information</h4>
             <!--/ newly added field -->
             <input type="hidden" name="id" value="<?php echo $id; ?>">
             <!--/ modified Field -->
             <input type="text" name="updateFirstname" value="<?php echo $firstname; ?>">
             <input type="text" name="updateLastname" value="<?php echo $lastname; ?>">
             <input type="text" name="updateEmail" value="<?php echo $email; ?>">
             <input type="password" name="updatePassword" value="<?php echo $password; ?>">
             <input type="text" name="updateAdmin" value="<?php echo $admin; ?>">
	    
	    </div>
        <p>
        <br>
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