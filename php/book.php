<?php
	session_start();
	
	$link = mysqli_connect("localhost","root","");

	if(!$link){
		die("Could not connect to the sever");
	}

	else {
		$createDB = "CREATE DATABASE IF NOT EXISTS booking";

		$createResult = mysqli_query($link,$createDB);

		if(!$createResult){
			die("Could not create the database.");
		}


		$conn = mysqli_select_db($link, "booking");

		if(!$conn){
			die("Could not connect to the database.");
		}

		
		$createTable = "CREATE TABLE IF NOT EXISTS booking_detail(booking_id int PRIMARY KEY AUTO_INCREMENT, name varchar(255), email varchar(255), telephone varchar(255), pestType varchar(255), visitDate varchar(255), visitTime varchar(255), message varchar(255))";
		$createTableResult = mysqli_query($link, $createTable);
		if(!$createTableResult){
			die("Could not create the table.");
		}	
						
		if(isset($_POST['btn'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$telephone = $_POST['telephone'];
			$pestType = $_POST['pest'];
			$visitDate = $_POST['visit'];
			$visitTime = $_POST['time'];
			$message = $_POST['message'];
			

			$query = "INSERT INTO booking_detail (name, email, telephone, pestType, visitDate, visitTime, message) VALUES ('$name', '$email', '$telephone', '$pestType', '$visitDate', '$visitTime', '$message')";

			$result = mysqli_query($link, $query);

			if(!$result) {
				die("Couldn't perform the query.");
			}

			header("location: ../pages/booked.html");
		}
			
	}
	mysqli_close($link);
?>