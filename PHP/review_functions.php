<?php  
	
		// Incomplete
		
	DEFINE('DB_USERNAME', 'root');
	DEFINE('DB_PASSWORD', 'root');
	DEFINE('DB_HOST', 'localhost');
	DEFINE('DB_DATABASE', 'ubooks');


	function submit_review(){
		session_start();

			// if the user filled the review
		if (isset($_POST['reviewing']) && isset($_POST['stars'])){
			$revewing_ID= $_POST['reviewing'];
			$stars=intval($_POST['stars']);
			$my_ID=$_SESSION['my_user_ID'];
			
			$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

			if (mysqli_connect_error()) {
			  die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
			}
			
			$max_prod_ID=$mysqli->query('SELECT max(review_ID) as review_ID FROM review');
			$new_ID = $max_prod_ID->fetch_assoc();
			$new_userID= $new_ID['product_ID'] + 1;
		
			$sql = 'insert into review values("'.$new_userID.'","'.$my_ID.'","'.$revewing_ID.'",'.$stars.')';
				
			$result = $mysqli->query($sql);
			if($result){
				echo'<p>Your Review was submitted </p>';
			}     

			$mysqli->close();
		}
	}
	


?>