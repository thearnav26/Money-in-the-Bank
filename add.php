<?php 
	session_start();
	if($_SESSION['user']){
		$user=$_SESSION['user'];
	}
	else{
		header("location:index.php");
	}
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		date_default_timezone_set("Asia/Kolkata");
		$amount=mysql_real_escape_string($_POST['amount']);
		$details=mysql_real_escape_string($_POST['details']);
		$time = strftime("%T");
		$date = strftime("%B %d, %Y");
		mysql_connect("localhost", "root","") or die(mysql_error()); 
		mysql_select_db("ATM") or die("Cannot connect to database"); 
		mysql_query("INSERT INTO Passbook (amount,date_transaction,time_transaction,details,user) VALUES ('$amount','$date','$time','$details','$user')");
		header("location:home.php");
	}
	else
	{
		header("location:home.php");
	}


 ?>