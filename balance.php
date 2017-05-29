<html>
	<head>
	<title>Money in the Bank</title>
	<link rel="stylesheet" href="balance.css">
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
		<h2 >The Balance Page</h2>
		<h3> Hello <?php Print "$user" ?></h3>
		<a href="home.php" >Click Here to Go Back.</a><br/>
		<br/><br/>
		<?php 
			mysql_connect("localhost","root","") or die(mysql_error());
			mysql_select_db("ATM") or die("Cannot connect to database");
			$balance=0.00;
			$query=mysql_query("SELECT * from Passbook WHERE user='$user'");
			while($row=mysql_fetch_array($query))
			{
				$balance= $balance + $row['amount'];
			}
			Print "Your Balance is : Rs " . $balance;

		 ?>



	</div>
	</body>
	
</html>

