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

			$mysqli->close();
	}
	
	function my_books_for_sale(){
			session_start();
			$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

			if (mysqli_connect_error()) {
			  die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
			}
			
			$sql = "SELECT * FROM products natural join books  WHERE product_ID not in (select product_ID from orders) and user_ID='".$_SESSION['my_user_ID']."'"; 			
			$result = $mysqli->query($sql);
			echo'<h2 style="padding-top:50px">My Books for Sale:</h2>';			
			if ($result->num_rows > 0) {
			// output data of each row
				echo '<table id="book_list2">';
				while($row = $result->fetch_assoc()) {
					$title= $row["title"];
					$author= $row["author"];
					$price= $row["price"];
					$pro_ID = $row["product_ID"];
							
					echo '	<tr>';
					echo'		<td><a href="">Title: '.$title.'</a></td>';
					echo'		<td>Author:'.$author.'</td>';
					echo'		<td>Price: $'.$price.'</td>';
					echo'		<td>					   ';
					echo'			<form action="book_information_auth.php?p_id='.$pro_ID.'" method="post">';
					echo'				<button name="product_ID" type="submit" value="'.$pro_ID.'">View Information</button>';
					echo'			</form>';
					echo'		</td>					   ';
					echo'	</tr>';
				}
				echo'</table>';
			} else {
			echo "<p>You have no books for sale</p>";
			}
			$mysqli->close();
	}
	
	function my_sold_books(){
			session_start();
			$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

			if (mysqli_connect_error()) {
			  die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
			}
			
			$sql = "SELECT * FROM products,orders,books WHERE products.product_ID= orders.product_ID and products.isbn_10=books.isbn_10 and products.user_ID='".$_SESSION['my_user_ID']."'"; 	
		
			$result = $mysqli->query($sql);
			echo'<h2 style="padding-top:50px">My Sold Books:</h2>';			
			if ($result->num_rows > 0) {
			// output data of each row
				echo '<table id="book_list2">';
				while($row = $result->fetch_assoc()) {
					$title= $row["title"];
					$author= $row["author"];
					$price= $row["price"];
					$pro_ID = $row["product_ID"];
							
					echo '	<tr>';
					echo'		<td><a href="">Title: '.$title.'</a></td>';
					echo'		<td>Author:'.$author.'</td>';
					echo'		<td>Price: $'.$price.'</td>';
					echo'		<td>					   ';
					echo'			<form action="book_information_auth.php?p_id='.$pro_ID.'" method="post">';
					echo'				<button name="product_ID" type="submit" value="'.$pro_ID.'">View Information</button>';
					echo'			</form>';
					echo'		</td>					   ';
					echo'	</tr>';
				}
				echo'</table>';
			} else {
			echo "<p>You have not sold any books</p>";
			}
			$mysqli->close();
	}
	
	function my_ordered_books(){
			session_start();
			$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

			if (mysqli_connect_error()) {
			  die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
			}
			
			$sql = "SELECT * FROM products natural join books  WHERE product_ID in(select product_ID from orders where user_ID='".$_SESSION['my_user_ID']."')"; 			
			$result = $mysqli->query($sql);
			echo'<h2 style="padding-top:50px">My Ordered Books:</h2>';			
			if ($result->num_rows > 0) {
			// output data of each row
				echo '<table id="book_list2">';
				while($row = $result->fetch_assoc()) {
					$title= $row["title"];
					$author= $row["author"];
					$price= $row["price"];
					$pro_ID = $row["product_ID"];
					$reviewer_ID= $row["user_ID"];
							
					echo '	<tr>';
					echo'		<td><a href="">Title: '.$title.'</a></td>';
					echo'		<td>Author:'.$author.'</td>';
					echo'		<td>Price: $'.$price.'</td>';
					echo'		<td>					   ';
					echo'			<form action="book_information_auth.php?p_id='.$pro_ID.'" method="post">';
					echo'				<button name="product_ID" type="submit" value="'.$pro_ID.'">View Information</button>';
					echo'			</form>';
					echo'		</td>					   ';
					echo'		<td>';
					echo'			<form action="Review_Page.php" method="post">';
					echo'				<button name="This_reviewer_ID" type="submit" value="'.$reviewer_ID.'">Create Review</button>';
					echo'			</form>';
					echo'		</td>';
					echo'	</tr>';
				}
				echo'</table>';

			} 
			else {
				echo "<p>You have not ordered any books</p>";
			}
			$mysqli->close();
	}
	
	// SignUP functions
	
	
	function Create_new_User($user_name_new, $email_new, $phone_num_new, $passwords_new){
		
			$crypt_pass=sha1(trim($passwords_new));
			
			$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

			if (mysqli_connect_error()) {
			  die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
			}
			
			$max_ID= $mysqli->query('select max(user_ID) as user_ID from users');
			$new_ID = $max_ID->fetch_assoc();
			$new_userID= $new_ID['user_ID'] + 1;
			
			$sql='insert into users values("'.$new_userID.'","'.$user_name_new.'",'.$phone_num_new.', "'.$email_new.'","'.$crypt_pass.'")';
			
			$result= $mysqli->query($sql);
			
			if($result){
				echo'<p>Congratulations</p>';
			}
			$mysqli->close();		
	}
?>