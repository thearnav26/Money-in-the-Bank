<html>
	<head>
	<title>Money in the Bank</title>
	<link rel="stylesheet" href="withdraw.css">
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
		<h2 >The Withdraw Page</h2>
		<h3> Hello <?php Print "$user" ?></h3>
		<a href="home.php" >Click Here to Go Back.</a><br/>
		<br/><br/>
		<form action="minus.php" method="POST">
			How much would you like to withdraw: Rs <input type="number" name="amount" required="required" /><br/>
			Add some details : <input type="text" name="details"/><br/>
			<input type="submit" class="button" value="Withdraw Money"/>
		</form>
		<br/>
		<p>Please don't withdraw more than you have.</p>


	</div>
	</body>
	
</html>

