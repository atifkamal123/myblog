<?php
session_start();
include_once("db.php");

if(isset($_POST['post'])){
	$title = strip_tags($_POST['title']);
	$content = strip_tags($_POST['content']);
	$user_id = strip_tags($_POST['id']);

	$title= mysqli_real_escape_string($db,$title);
	$title= mysqli_real_escape_string($db,$content);

	$date = date('1 js \of F Y h:i:s A');

	$sql = "INSERT into posts1 (title,content,date,user_id) VALUES('$title','$content','$date','$user_id')";
	if($title =="" || $content ==""){
		echo "Pleae Complete your post!";
		return;
	}
	mysqli_query($db,$sql);
	header("Location: index.php");


}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Blog-post</title>
</head>
<body>
	<form action="post.php" method="post" enctype="multipart/form-data">
		<input placeholder="title" name="title" type="text" autofocus size="48"><br><br>
		<textarea placeholder="Content" name="content" rows="20" cols="50"></textarea><br>
		<input name="post" type="submit" value="Post">
		
	</form>
</body>
	
</html>