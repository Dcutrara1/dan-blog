 <?php
/*
Project name and version: Blog.version_3
Module name and version: Module 3.version_1
Programmer Name: Daniel Cutrara
Date: 5/19/2019
Synopsis: Create a new blog post, capture the new post and store in the database, 
and implement a simple language filter 
 */

 // Connect to database
 require('myfuncs.php');
 $con = dbConnect();

// create short variable names
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);

if(empty(trim($username)))
{
    die('The Username is a required field and cannot be blank.<br>');
}

if(empty(trim($password)))
{
    die('The Password is a required field and cannot be blank.<br>');
}

$query = "SELECT * FROM user WHERE email = '$username'";

$result = mysqli_query($con, $query);

$row = mysqli_fetch_array($result);

if (mysqli_affected_rows($con) > 1 )
{
    echo 'There are multiple users have registered <br>';
}
else if($password == $row['password'])
{
    echo 'Login successful <br>';
    saveUserId($row['id']); // Save User ID in the Session
    echo '<a href="addPostView.php">continue</a>';
}
else
{
    echo 'Login failed <br>';
}
$con->close();
?>