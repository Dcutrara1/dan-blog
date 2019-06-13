<html>
<!-- 
...
 -->
<?php 
require 'myfuncs.php';
$con = dbConnect();
$postid = $_GET['pid'];
if(isset($_GET["pid"]))
{   
    $post = mysqli_real_escape_string($con, $_GET["pid"]);
    $posts = getPostsById($post);
    $comments = getCommentsByPid($_GET["pid"]);
}

?>

</html>
<head>
	<title>Add a Comment</title>
		<link rel="stylesheet" type="text/css" href="style.css">
</head>
	<body>
	<fieldset>
	<legend>Add a Comment</legend>
		<table>
	<thead>
		<tr>
			<th>Title</th>
			<th>Author</th>
			<th >Text Area</th>
		</tr>
	</thead>
	
	<?php
	for($i=0; $i<count($posts); $i++)
	{
	    echo"<tr>"."<td>"
        .$posts[$i][1]."</td><td>"
        .$posts[$i][2]."</td><td>"
        .$posts[$i][3]."</td>"."</tr>";
	}?>
	
	<thead>
		<tr>
			<th></th>
			<th>Rating</th>
			<th>Comment</th>
		</tr>
	</thead>
	
	<?php	
	for($i=0; $i<count($comments); $i++)
	{
	    echo"<tr>"."<td></td><td>"
        .$comments[$i][1]."</td><td>"
        .$comments[$i][0]."</td>"."</tr>";
	}
	?>
</table>	
		
		<form action="commentHandler.php" method="post"> 
			
   			<br>
			<textarea name="comment" rows="5" cols="75" placeholder="Add a comment: "></textarea> 
			<br><br>
			
  			<h4>Add a Rating</h4>
			<div class="rate">
        	<input type="radio" id="star5" name="rate" value="5" /><label for="star5" title="text">5 stars</label>
        	<input type="radio" id="star4" name="rate" value="4" /><label for="star4" title="text">4 stars</label>
        	<input type="radio" id="star3" name="rate" value="3" /><label for="star3" title="text">3 stars</label>
        	<input type="radio" id="star2" name="rate" value="2" /><label for="star2" title="text">2 stars</label>
        	<input type="radio" id="star1" name="rate" value="1" /><label for="star1" title="text">1 star</label>
    		</div><br><br>
  			
  			<br>
  			<?php echo  '<input type="hidden" name="pid" value="'.$postid.'" />'; ?>
  			<input type="submit" class="comment_btn" name="postComment" value="Post Comment"/>
			<input type="button" class="comment_btn" value="View Blog" onclick="location='userView.php'" />
		</form><br>
		
	</fieldset>
	</body>
</html> 