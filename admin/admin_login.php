<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
	<style type="text/css">
		#admin_login{
			height: 300px;
			width: 600px;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
			background-color: skyblue;
			position: absolute;
			border: 2px solid orange;
			border-radius: 4px;
		}
		#admin_login input{
			padding: 6px;
			width: 200px;

		}
	</style>
</head>
<body style="background-color: pink;">
<div id="admin_login">
	<form method="post" action="admin_login.php">
		<table align="center" bgcolor="skyblue" cellpadding="10">
			<tr>
				<th><h2>Admin Login Here !</h2></th>
			</tr>
			<tr>
				<td><strong>Admin Email :</strong></td>
				<td><input type="email" name="email" placeholder="email here"></td>
			</tr>
			<tr>
				<td><strong>Admin Password :</strong></td>
				<td><input type="password" name="password" placeholder="password"></td>
			</tr>
			<tr>
				<td><input type="submit" name="admin_login" value="Admin Login"></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>

<?php
		include("includes/connection.php");
		if(isset($_POST['admin_login']))
		{
		$email=mysqli_real_escape_string($con,$_POST['email']);
		$pass=mysqli_real_escape_string($con,$_POST['password']);
		echo $email.$pass;

		$get_admin="select * from admins where admin_email='$email' AND admin_pass='$pass'";
		$run_admin=mysqli_query($con,$get_admin);
		$check=mysqli_num_rows($run_admin);

		if($check==1){
			$_SESSION['admin_email']=$email;
			header('Location: index.php');
		}
		else
		{
			echo"<script>alert('email is not correct')</script>";
		}

	}
?>