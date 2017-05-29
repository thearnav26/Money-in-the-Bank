<html>
	<head>
	<title>Money in the Bank</title>
	<link rel="stylesheet" href="transfer.css">
	</head>
	<?php
		session_start();
		if($_SESSION['user'])
		{}
		else
		{
			header("location:index.php");
		}
		$user=$_SESSION['user'];
		?>
	<body>

	<div class="container">
		<h2 >The Fund Transfer Page</h2>
		<h3> Hello <?php Print "$user" ?></h3>
		<a href="home.php" >Click Here to Go Back.</a><br/>
		<br/><br/>
		<form action="trans.php" method="POST">
			Enter the Username of the Recipient  : <input type="text" name="username" required="required"/><br/>
			How Much Would You Like To Transfer: Rs  <input type="number" name="amount" required="required" /><br/>
			<input type="submit" class="button" value="Transfer Money"/>
		</form>
		<br/>
		<p>Please Do Not Transfer More Than You Have.</p>


	</div>
	</body>
	
</html>

