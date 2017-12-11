<?php
if(isset($_POST['btn_submit'])){
$firstName= $_POST['firstname'];
$lastName= $_POST['lastname'];
$email= $_POST['email'];
$password= $_POST['password'];
$gender= $_POST['gender'];
$qualification= $_POST['qualification'];

$link= mysqli_connect("localhost","root","","erozgaar");
$query="INSERT INTO signupp (firstname,lastname,email,password,gender,qualification) VALUES ('$firstName','$lastName','$email','$password','$gender','$qualification')";

$result= mysqli_query($link,$query);
if($result){
	echo 'Data Inserted';
}else{
	echo 'Error: Please go back and look at the data you entered';
}
}



?>

<!DOCTYPE html>
<html>
<body>

 
<form method="post">
  First name:<br>
  <input type="text" name="firstname">
  <br>
  Last name:<br>
  <input type="text" name="lastname" ><br>
  E-mail<br>
<input type="email" name="email"><br>
Password<br>
<input type="password" name="password"><br>
Gender:<br>
<input type="text" name="gender"><br>
Qualification:<br>
<input type="text" name="qualification">
  
  <br><br>
  <input type="submit" value="Submit" name="btn_submit">
<a href="login.php">Login</a>
</form> 


</body>
</html>