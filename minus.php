<?php 
	session_start();
	if($_SESSION['user']){
		$user=$_SESSION['user'];
	}
	else{
		header("location:index.php");
	}
		
	mysql_connect("localhost", "root","") or die(mysql_error()); 
	mysql_select_db("ATM") or die("Cannot connect to database"); 

	$balance=0.00;
	$query=mysql_query("SELECT * from Passbook WHERE user='$user'");
	while($row=mysql_fetch_array($query))
		{
			$balance= $balance + $row['amount'];
		}

	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		date_default_timezone_set("Asia/Kolkata");
		$amount=mysql_real_escape_string($_POST['amount']);

		
		if($amount>$balance)
		{
			
			Print '<script>alert("You do not have sufficient Funds.");;
			window.location.assign("balance.php")</script>';
			exit("You have insufficient funds!");
			//header("location: balance.php");
			
		}
		$amount=(-$amount);
		$details=mysql_real_escape_string($_POST['details']);
		$time = strftime("%T");
		$date = strftime("%B %d, %Y");

		mysql_query("INSERT INTO Passbook (amount,date_transaction,time_transaction,details,user) VALUES ('$amount','$date','$time','$details','$user')");
		Print '<script>alert("Successful Withdrawal.");window.location.assign("balance.php");</script>';
		
	}
	else
	{
		header("location:home.php");
	}


 ?>