<html>
	<head>
	<title>Money in the Bank</title>
	<link rel="stylesheet" href="register.css">
	</head>
	<body>

	<div class="container">
		<h2 >The Registraion Page</h2>
		<a href="index.php" >Click Here to Go Back.</a><br/>
		<form action="register.php" method="POST">
			Enter Username : <input type="text" name="username" required="required"/><br/>
			Enter Password : <input type="password" name="password" required="required"/><br/>
			<input type="submit" value="Register" class="button"/>
			</form>	
	</div>
	</body>
	
</html>

<?php
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		$bool=true;

		mysql_connect("localhost","root","") or die(mysql_error());
		mysql_select_db("ATM") or die("Cannot connect to database");
		$query=mysql_query("SELECT * FROM users");	
		while($row=mysql_fetch_array($query))
		{
			$table_user=$row['username'];
			if($username==$table_user)
			{
				$bool=false;
				Print '<script>alert("Username has already been taken!");</script>';
				Print '<script>window.location.assign("register.php");</script>';
			}
		}
		if($bool)
		{
			mysql_query("INSERT INTO users (username,password) VALUES ('$username','$password')");
			Print '<script>alert("Successfully Registered! ");</script>';
			Print '<script>window.location.assign("index.php");</script>';
		}
	}
?>
