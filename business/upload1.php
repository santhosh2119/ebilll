<?php 

	//Checking the request 
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		//Getting the file 
		$file = $_FILES['file']['tmp_name'];
		
		//Getting the name of the file 
		$name = $_FILES['file']['name'];
		
		//Path to upload 
		$path = 'uploads/';
		
		//Storing the file to location
		move_uploaded_file($file,$path.$name);
		
		//displaying success message 
		echo 'success';
	}?>