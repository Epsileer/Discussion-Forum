<?php
	session_start();
	include("../functions/functions.php");
	if(!isset($_SESSION['admin_email'])){
		echo "hi brother";
		echo "<script>window.open('admin_login.php','_self');</script>";
	}
	else
	{
?>

<!DOCTYPE html>
<html>
<head>
	<title>welcome to admin panel</title>
	<link rel="stylesheet" type="text/css" href="admin_style.css" media="all"/>
</head>
<body>
	<div class="container">
		<div id="head">
			<img style="height: 100px;width: 100px;float: left;" src="admin.jpg" alt="photo">
			<h2 style="float: left;padding: 5px;font-size: 30px;">Admin Page :)</h2>
		</div>

		<div id="side_bar">
			<h2 style="margin: 5px;color: white;background-color: brown;padding: 5px;">Manage Users :</h2>
			<ul id="menu">
				<li><a href="index.php?view_users">View Users</a></li>
				<li><a href="index.php?add_user">Add User</a></li>
				<li><a href="admin_logout.php">Admin Logout</a></li>
			</ul>
		</div>

		<div id="content">
			<?php
				if(isset($_GET['view_users'])){
					include("includes/view_users.php");
				}
				else if(isset($_GET['add_user'])){
					include("includes/add_user.php");
				}
				else{
					echo "<center><img style='height: 200px;width: 200px' src='admin.jpg'><h2 style='text-align:center;color:red;'>this is gift from developer side mr./mrs. ".$_SESSION['admin_email']."</h2></center>";
				}
			?>
		</div>

		<div id="foot">
			<h2 style="color: white;padding:10px;text-align: center;font-size: 18px;font-family: arial;">&copy 2018 by Amit Tiwari</h2>
		</div>
	</div>

</body>
</html>

<?php } ?>