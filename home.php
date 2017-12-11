<?php
session_start();
if (isset($_GET['logout']) && $_GET['logout']==1) {
	$_SESSION['logged_in']=0;
	session_destroy();
	header('location:login.php');
}
if($_SESSION['logged_in']!=1){
	header('location:login.php');
}
$link= mysqli_connect("localhost","root","","blog");
if(isset($_GET['delete'])){
	$id_del=$_GET['delete'];
	$query_del="DELETE FROM posts where id='$id_del'";
	$res_query_del=mysqli_query($link,$query_del);
	if($res_query_del){
		echo"Data Deleted";
		
	}else{
		echo"Error:Can't delete ";
	}
}

if(isset($_POST['btn_save'])){
$firstname= $_POST['title'];
$lastname= $_POST['content'];

$user_id= $_SESSION['id'];
echo $query="INSERT INTO posts (title,content,user_id) VALUES ('$title','$content','$user_id')";
die;
$result= mysqli_query($link,$query);
if($result){
	echo 'Data Inserted';
}else{
	die(mysqli_error($link));
	//echo 'Error: Please go back and look at the data you entered';
}
}
$user_id= $_SESSION['id'];
$select= "SELECT * from posts where user_id='$user_id'";
$res_select= mysqli_query($link,$select);
echo "Login Successfull";

?>
<table>
<thead>
<th>Id</th>
<th>Title</th>
<th>content</th>
<th>time_stamp</th>

<th>Action</th>
</thead>
<tbody>
<?php
while($data = mysqli_fetch_assoc($res_select)){
	echo "<tr>";
	$id=$data['id'];
	echo "<td>".$data['id']."</td>";
	echo "<td>".$data['title']."</td>";
	echo "<td>".$data['content']."</td>";
	echo "<td>".$data['time_stamp']."</td>";
	
	echo "<td><a href='?delete=$id'>Delete</a> </td>";
	//echo '<td><a href="{$data['id']}">Delete</a></td>';
	echo "</tr>";
	
}

?>
<tbody>
<table>

<!DOCTYPE html>
<html>
<body>
<a href="home.php?logout=1">Logout</a>
<form method="post">

  title:<br>
  <input type="text" name="title">
  <br>
  Content:<br>
  <textarea name="content" placehloder="say something"></textarea>
  <br>
  
  <br>
  
  <br>
  
  <input type="submit" name="btn_save" value="Submit">
</form> 


</body>
</html>