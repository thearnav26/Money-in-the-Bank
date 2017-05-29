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
		$rec=mysql_real_escape_string($_POST['username']);
		
		if($amount>$balance)
		{
			
			Print '<script>alert("You do not have sufficient Funds.");;
			window.location.assign("balance.php")</script>';
			exit("You have insufficient funds!");
			//header("location: balance.php");
			
		}

		$q=mysql_query("SELECT * FROM users WHERE username='$rec'");
		$exists=mysql_num_rows($q);
		if($exists==0)
		{
			
			Print '<script>alert("No Such User Exists");;
			window.location.assign("home.php")</script>';
			exit("No such user exists.");
			//header("location: balance.php");
			
		}		

		$amount=(-$amount);
		
		$time = strftime("%T");
		$date = strftime("%B %d, %Y");
		$details="Transfer from " . "$user" . " to " . "$rec";
		mysql_query("INSERT INTO Passbook (amount,date_transaction,time_transaction,details,user) VALUES ('$amount','$date','$time','$details','$user')");
		$amount=(-$amount);
		mysql_query("INSERT INTO Passbook (amount,date_transaction,time_transaction,details,user) VALUES ('$amount','$date','$time','$details','$rec')");

		Print '<script>alert("Successful Transfer.");window.location.assign("balance.php");</script>';
		
	}
	else
	{
		header("location:home.php");
	}


 ?>