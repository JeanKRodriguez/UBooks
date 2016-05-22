<?php  
	
		
		
	DEFINE('DB_USERNAME', 'root');
	DEFINE('DB_PASSWORD', 'root');
	DEFINE('DB_HOST', 'localhost');
	DEFINE('DB_DATABASE', 'ubooks');


	function order_book(){
		session_start();

			// check if user included isbn_10 and price.
		if (isset($_POST['my_product_ID']) && isset($_SESSION['my_user_ID'])){
			$address_1= $_POST['address_1'];
			$city=$_POST['city'];
			$state= $_POST['state'];
			$zip_code=intval($_POST['zip_code']);
			$my_product_ID= $_POST['my_product_ID'];
			$my_ID=$_SESSION['my_user_ID'];
			
			$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

			if (mysqli_connect_error()) {
			  die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
			}
			
			$max_order_ID=$mysqli->query('SELECT max(order_ID) as order_ID FROM orders');
			$new_ID = $max_order_ID->fetch_assoc();
			$new_orderID= $new_ID['order_ID'] + 1;
			
			
			$sql_orders = 'insert into orders values("'.$new_orderID.'","'.$my_ID.'","'.$my_product_ID.'","2016-05-23 13:00:00","'.$address_1.'","'.$city.'","'.$state.'",'.$zip_code.')';
														
			$result_orders = $mysqli->query($sql_orders); 			
			
			if($result_orders){
				echo' <p>You have successfully Ordered a Book.<p>';
			}     

			$mysqli->close();
		}
	}
	


?>