 <?php
	session_start();
	$link= mysqli_connect('localhost','root','','erozgaar');
	if(isset($_POST['btn_login'])){
		$email= trim($_POST['email']);
		$password=trim($_POST['password']);
		$login_query="select id,firstname,lastname from signupp where email='$email' and password='$password'";
		$query_result= mysqli_query($link,$login_query);
		if(mysqli_num_rows($query_result)>0){
			$data_row= mysqli_fetch_assoc($query_result);
			$_SESSION['id']= $data_row['id'];
			$_SESSION['firstname']= $data_row['firstname'];
			$_SESSION['lastname']= $data_row['lastname'];
			$_SESSION['logged_in']=1;
			header('location: index.php');
		}else{
			echo "Error: Invalid user name or password";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login System</title>
<style>
.header{

}
</style>
</head>
<body>
<div class="header">Erozgaar</div>

<form method="post">
<fieldset>
	E-mail:<br>
        <input type="text" name="email" placeholder="Enter email address" style="padding:2px 15px;"><br><br>
	<label>Password:</label> <br>
<input type="password" name="password" placeholder="Enter password" style="padding:2px 15px;"><br><br>
	<button type="submit" name="btn_login" style="color:white;background-color:black;padding:3px 10px;border-color:black;cursor:pointer;letter-spacing:1px;border-radius:5px;">Login</button>
	<button type="'reset" style="color:white;background-color:black;padding:3px 10px;border-color:black;cursor:pointer;letter-spacing:1px;border-radius:5px;">Cancel</button>
<a href="Signup.php">Signup</a>
</fieldset>
</form>
</body>
</html>