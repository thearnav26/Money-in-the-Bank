<html>
	<head>
	<title>Money in the Bank</title>
	<link rel="stylesheet" href="home.css">
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
		<h2 >The Home Page</h2>
		<h3> Hello <?php Print "$user" ?></h3>
		<a href="logout.php" >Click Here to Logout.</a><br/>
		<br/><br/>
		<button type = "button" onclick="location.href='balance.php'" >Click to Know your Available Balance.</button>
		<button type = "button" onclick="location.href='deposit.php'" >Click here to Deposit Money.</button>
		<button type = "button" onclick="location.href='withdraw.php'" >Click here to Withdraw Money.</button>
		<button type = "button" onclick="location.href='transfer.php'" >Click here to Transfer Money to Someone Else.</button>



	</div>
	</body>
	
</html>

