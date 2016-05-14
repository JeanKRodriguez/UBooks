<?php

	DEFINE('DB_USERNAME', 'root');
	DEFINE('DB_PASSWORD', 'root');
	DEFINE('DB_HOST', 'localhost');
	DEFINE('DB_DATABASE', 'ubooks');
	
	function starting_session(){
		session_start();

		if (isset($_POST['email']) && isset($_POST['passwords']))
		{
		  // if the user has just tried to log in
		  $email = trim($_POST['email']);
		  $password = sha1(trim($_POST['passwords']));

		  $db_conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

		  if (mysqli_connect_errno()) {
		   echo 'Connection to database failed:'.mysqli_connect_error();
		   exit();
		  }

		  $query = "SELECT * FROM Users WHERE email='".$email."' AND passwords='".$password."'";
			
		  $result = $db_conn->query($query);
		  if ($result->num_rows >0 )
		  {
			$row = $result->fetch_assoc();
			// if they are in the database register the user id
			$_SESSION['my_user_ID'] = $row['user_ID'];
			$_SESSION['my_user_name'] = $row['user_name'];
		  }
		  $db_conn->close();
		}
	}
	
		
	function ending_session(){
		session_start();
		// store to test if they *were* logged in
	    $GLOBALS['old_user'] = $_SESSION['my_user_ID'];  
	    unset($_SESSION['my_user_ID']);
		unset($_SESSION['my_user_name']);
		session_destroy();
	}

?>