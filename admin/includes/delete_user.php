<?php 
	include("connection.php");
	if(isset($_GET['delete'])){
		$user_id = $_GET['delete'];
		$delete = "delete from users where user_id='$user_id'";
		$run_delete = mysqli_query($con,$delete);

		$delete_posts = "delete from posts where user_id='$user_id'";
		$run_posts = mysqli_query($con,$delete_posts);

		echo "<script>alert('user has been deleted');</script>";
		echo "<script>window.open('../index.php?view_users','_self');</script>";
	}

?>