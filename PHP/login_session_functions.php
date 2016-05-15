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

	//used in profile
	function view_user_info(){
			session_start();
			$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

			if (mysqli_connect_error()) {
			  die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
			}
			
			$sql = "SELECT * FROM users  WHERE user_ID='".$_SESSION['my_user_ID']."'"; 
			
			$result = $mysqli->query($sql);
			$user = $result->fetch_assoc();
			
			echo '<table id="profile_info">';
			echo'	<tr><td><h2> User Name: '.$user["user_name"].'</h2><td></tr>';
			echo'	<tr><td> Phone Number: '.$user["phone_num"].'<td></tr>';
			echo'	<tr><td> Email: '.$user["email"].'<td></tr>';	
			echo'</table>';
			
	}
	
	function my_books_for_sale(){
			session_start();
			$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

			if (mysqli_connect_error()) {
			  die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
			}
			
			$sql = "SELECT * FROM products natural join books  WHERE user_ID='".$_SESSION['my_user_ID']."'"; 
			
			$result = $mysqli->query($sql);
			echo'<h2 style="padding-top:50px">My Books for Sale:</h2>';			
			if ($result->num_rows > 0) {
			// output data of each row
				echo '<table id="book_list2">';
				while($row = $result->fetch_assoc()) {
					$title= $row["title"];
					$author= $row["author"];
					$price= $row["price"];
					$quantity= $row["qty"];
							
					echo '	<tr>';
					echo'		<td><a href="">Title: '.$title.'</a></td>';
					echo'		<td>Author:'.$author.'</td>';
					echo'		<td>Price:'.$price.'$</td>';
					echo'		<td>Qty:'.$quantity.'</td>';
					echo'	</tr>';
								
				}	
				echo'</table>';
			} else {
			echo "<p>You have no books for sale</p>";
			}
	}
?>