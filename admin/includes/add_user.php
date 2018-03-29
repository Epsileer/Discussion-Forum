<div id ="form2">
<form action="" method="post">
	<h2>Add New User</h2>
	<table>
		<tr>
			<td align="right">Name:</td>
			<td>
			<input type="text" name="u_name" placeholder="Enter your name" required="required" />
			</td>
		</tr>
		<tr>
			<td align="right">Pasword:</td>
			<td>
			<input type="password" name="u_pass" placeholder="Enter your password" required="required" />
			</td>
		</tr>
		<tr>
			<td align="right">Email:</td>
			<td>
			<input type="email" name="u_email" placeholder="Enter your email" required="required" />
			</td>
		</tr>
		<tr>
			<td align="right">Country:</td>
			<td>
			<select name="u_country">
					<option>Select a Country</option>
					<option>Afgansitan</option>
					<option>India</option>
					<option>Pakistan</option>
					<option>United States</option>
					<option>UAE</option>
				</select>
		</td>
		</tr>
			<td align="right">Gender:</td>
			<td>
				<select name="u_gender">
					<option>Gender</option>
					<option>Male</option>
					<option>Female</option>
				</select>
			</td>
		<tr>
			<td align="right">Birthday</td>
			<td>
			<input type="date" name="u_birthday">
			</td>
		</tr>
		
		<tr>
			<td></td>
			<td>
			<button name="sign_up">Add</button>
			</td>
		</tr>
	</table>
</form>

</div>
<?php

if(isset($_POST['sign_up'])){

include("includes/connection.php");
session_start();
$con=mysqli_connect("localhost","root","","social_network") or die("Connection was not established");

		$name=mysqli_real_escape_string($con,$_POST['u_name']);
		$pass=mysqli_real_escape_string($con,$_POST['u_pass']);
		$email=mysqli_real_escape_string($con,$_POST['u_email']);
		$country=mysqli_real_escape_string($con,$_POST['u_country']);
		$gender=mysqli_real_escape_string($con,$_POST['u_gender']);
		$b_day=mysqli_real_escape_string($con,$_POST['u_birthday']);
		$date=date("y-m-d");
		$status="unverified";
		$posts="No";
		$default="default.jpg";
		$get_email="select * from users where user_email='$email'";
		$run_email=mysqli_query($con,$get_email);
		$check=mysqli_num_rows($run_email);

		if($check==1)
		{
			echo "<h2>This e-mail is already registered</h2>";
			exit();
		}
		else
		{
			
			
			if(mysqli_query($con,"INSERT INTO `users`( `user_name`, `user_pass`, `user_email`, `user_country`, `user_gender`, `user_image`, `register_date`, `last_login`, `status`) VALUES ('$name','$pass','$email','$country','$gender','$default',NOW(),NOW(),'$status')"))
			{

				$_SESSION['user_email']=$email;
				echo "<script>alert('Registration is successful')</script>";
				echo "<script>window.open('index.php?view_users','_self');</script>";

			}
			else{
				echo "query not inserted";
			}


		}

}
?>
