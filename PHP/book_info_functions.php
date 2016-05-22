
<?php  
	
	
	DEFINE('DB_USERNAME', 'root');
	DEFINE('DB_PASSWORD', 'root');
	DEFINE('DB_HOST', 'localhost');
	DEFINE('DB_DATABASE', 'ubooks');


	function viewDetails(){
		$this_prod = $_POST['product_ID'];

		$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

		if (mysqli_connect_error()) {
		  die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
		}
		
		// Needs to be fixed
		$sql = 'SELECT title, author, subject, edition, publish_date, books.isbn_10, user_name, phone_num,pay_method, delivery_method, avg(stars) as stars,price 
				FROM products , books , users , review 
				WHERE products.isbn_10 =books.isbn_10 and products.user_ID=users.user_ID and users.user_ID=review.reviewing_ID and products.product_ID="'.$_POST['product_ID'].'"';
				
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		
				$title= $row["title"];
				$author= $row["author"];
				$subject = $row["subject"];
				$edition = $row["edition"];
				$p_date = $row["publish_date"];
				$isbn = $row["isbn_10"];
				
				$name = $row["user_name"];
				$phone = $row["phone_num"];
				$pay =  $row["pay_method"];
				$delivery = $row["delivery_method"];
				$review = round($row["stars"],1);

				$price = $row["price"];

				//  Div for books Details

				echo ' <div style = "width: 45% ; float: left; height:500px"> ';
				echo '<h2 class ="spacer" style = "text-align: center; padding-top : 10%; font-size: 18px"> Book Information </h2>';
						echo  '<p class ="spacer">Title: '.$title.'</p>';
						echo  '<p class ="spacer">Author: '.$author.'</p>';
						echo  '<p class ="spacer">Subject: '.$subject.'</p>';
						echo  '<p class ="spacer">Edition: '.$edition.'</p>';
						echo  '<p class ="spacer">Publish Date: '.$p_date.'</p>';
						echo  '<p class ="spacer">ISBN: '.$isbn.'</p>';
				echo '</div>';
				
				// Div for Users

				echo ' <div style = "width: 45% ; float: right; height:500px"> ';
            		echo '<h2 class ="spacer" style = "text-align: center; padding-top : 10%; font-size: 18px"> Seller Information </h2>';
					echo  '<p class ="spacer">Name: '.$name.'</p>';
                	echo  '<p class ="spacer">Phone Number: '.$phone.'</p>';
						echo  '<p class ="spacer">Pay Method: '.$pay.'</p>';
						echo  '<p class ="spacer">Delivery Method: '.$delivery.'</p>';
						echo  '<p class ="spacer">Review: '.$review.'</p>';
				echo '</div>';

            	// Price Div

            	echo ' <div style = "width: 100%; align: center; font-size: 12px ">';
           	    echo ' <center>';
            	echo ' <h1 class ="spacer">Price: $'.$price.'</h1>';
				echo'			<form action="order_Book.php?p_id='.$_POST['product_ID'].'" method="post">';
				echo'				<button class ="button" name="product_ID" type="submit" value="'.$_POST['product_ID'].'">Order</button>';
				echo'			</form>';
            	echo ' </center>';
            echo '</div>';      

			$mysqli->close();
	}
	


?>