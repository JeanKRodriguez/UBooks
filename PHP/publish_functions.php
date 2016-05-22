<?php  
	
		
		
	DEFINE('DB_USERNAME', 'root');
	DEFINE('DB_PASSWORD', 'root');
	DEFINE('DB_HOST', 'localhost');
	DEFINE('DB_DATABASE', 'ubooks');


	function publish_book(){
		session_start();

			// check if user included isbn_10 and price.
		if (isset($_POST['isbn_10']) && isset($_POST['price'])){
			$title= $_POST['title'];
			$isbn_10=$_POST['isbn_10'];
			$author= $_POST['author'];
			$subject=$_POST['subject'];
			$edition=intval($_POST['editions']);
			$publish_date= $_POST['publish_date'];
			$pay_method=$_POST['pay_method'];
			$delivery_method= $_POST['delivery_method'];
			$price=intval($_POST['price']);
			$my_ID=$_SESSION['my_user_ID'];
			
			$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

			if (mysqli_connect_error()) {
			  die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
			}
			
			$max_prod_ID=$mysqli->query('SELECT max(product_ID) as product_ID FROM products');
			$new_ID = $max_prod_ID->fetch_assoc();
			$new_userID= $new_ID['product_ID'] + 1;
			
			
			$sql_products = 'insert into products values("'.$new_userID.'","'.$my_ID.'","'.$isbn_10.'",'.$price.',"'.$pay_method.'","'.$delivery_method.'")';
			
			// For some reason the query doesnt want to execute even though the query itself is fine
			$result_prod = $mysqli->query($sql_products); 
			echo $result_prod;
			
			
			$sql_books = 'insert into books values("'.$isbn_10.'","'.$title.'","'.$author.'","'.$publish_date.'",'.$edition.',"'.$subject.'")';	
			$result_books = $mysqli->query($sql_books);
			
			if($result_products && $result_books){
				echo'<p>Your Book was Published </p>';
			}     

			$mysqli->close();
		}
	}
	


?>