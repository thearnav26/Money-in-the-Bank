<?php 
	session_start();
	$username=mysql_real_escape_string($_POST['username']);
	$password=mysql_real_escape_string($_POST['password']);

	mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db("ATM") or die("Cannot connect ot database");
	$query=mysql_query("SELECT * FROM users WHERE username = '$username'");
	$exists=mysql_num_rows($query);
	$table_user="";
	$table_password="";
	if($exists>0)
	{
		while($row=mysql_fetch_array($query))
		{
			$table_user=$row['username'];
			$table_password=$row['password'];
		}
		if($username== $table_user)
		{
			if($password==$table_password)
			{
				$_SESSION['user']= $username;
				header("location:home.php");
			}
			else
			{
				Print '<script>alert("Incorrect Password!");</script>';
				Print '<script>window.location.assign("login.php");</script>';
			}
		}
	}
	else
	{
		Print '<script>alert("Incorrect Username!");</script>';
		Print '<script>window.location.assign("login.php");</script>';
	}

 ?>