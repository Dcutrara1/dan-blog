<?php
/*
 Project name and version: Blog.version_Final
 Module name and version: Module Final.version_1
 Programmer Name: Daniel Cutrara
 Date: 6/16/2019
 Synopsis: PHP page accpts input that updates, deletes, or adds a user to blog site. 
 */

require('myfuncs.php');
$con = dbConnect();

if(!isset($_POST['update']))
{
    $firstname = mysqli_real_escape_string($con, $_POST["firstname"]);
    $lastname = mysqli_real_escape_string($con, $_POST["lastname"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);
    $admin = mysqli_real_escape_string($con, $_POST["admin"]);
}
else
{
    $firstname = mysqli_real_escape_string($con, $_POST["updateFirstname"]);
    $lastname = mysqli_real_escape_string($con, $_POST["updateLastname"]);
    $email = mysqli_real_escape_string($con, $_POST["updateEmail"]);
    $password = mysqli_real_escape_string($con, $_POST["updatePassword"]);
    $admin = mysqli_real_escape_string($con, $_POST["updateAdmin"]);
}

if(empty(trim($firstname)))
{
    echo 'The First Name is a required field and cannot be blank.<br>';
    header('Refresh: 2; userManager.php');
    exit();
}
if(empty(trim($lastname)))
{
    echo 'The Last Name is a required field and cannot be blank.<br>';
    header('Refresh: 2; userManager.php');
    exit();
}
if(empty(trim($email)))
{
    echo 'The email is a required field and cannot be blank.<br>';
    header('Refresh: 2; userManager.php');
    exit();
}
if(empty(trim($password)))
{
    echo 'The password is a required field and cannot be blank.<br>';
    header('Refresh: 2; userManager.php');
    exit();
}
if(empty(trim($admin)))
{
    echo 'The admin Key is a required field and cannot be blank.<br>';
    header('Refresh: 2; userManager.php');
    exit();
}

if(isset($_GET['del']))
{
    $id = mysqli_real_escape_string($con, $_GET['del']);
    $sql = "Delete from user where id='$id'";
    mysqli_query($con, $sql);
    mysqli_close($con);
    echo 'User was deleted from the database. <br>';
    header('Refresh: 2;userManager.php');
    exit();
}

if(isset($_POST['save']))
{        
    $sql = "INSERT INTO user (firstname, lastname, email, password, admin)
	VALUES ('$firstname', '$lastname', '$email', '$password', '$admin');";
        
        if(mysqli_query($con, $sql))
        {
            $_SESSION["AddPostErrorMessage"] = "Post was added to database.";
            echo 'Post was added to database. <br>';
            header('Refresh: 2;userManager.php');
        }
        else
        {
            $_SESSION["AddPostErrorMessage"] = "Post was NOT added to database.";
            header('Refresh: 2;userManager.php');
        }
        exit();
}
if(isset($_POST['update']))
{   
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $sql = "UPDATE user SET firstname='$firstname', lastname='$lastname',
    email='$email', password='$password', admin='$admin' where id='$id'";
    mysqli_query($con, $sql);
    mysqli_close($con);  
    echo 'Records were updated successfully. <br>';  
    header('Refresh: 2;userManager.php');
    exit();
}
?>