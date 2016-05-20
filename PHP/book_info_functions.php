
<?php  
	
	
	DEFINE('DB_USERNAME', 'root');
	DEFINE('DB_PASSWORD', 'root');
	DEFINE('DB_HOST', 'localhost');
	DEFINE('DB_DATABASE', 'ubooks');


	function viewDetails{
		$this_prod  = $_POST{"product_ID"};

		$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

		if (mysqli_connect_error()) {
		  die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
		}

		$sql = 'select * from products p, books b, users u, review r where p.isbn_10 =b.isbn_10 and p.user_ID=u.user_ID and u.user_ID=r.reviewing_ID and p.product_ID=" '.$this_prod.' " ';

		$result = $mysqli->query($sql);

		while($row = $result->fetch_assoc()) {
				$title= $row["title"];
				$author= $row["author"];
				$subject = $row["subject"];
				$edition = $row["edition"];
				$p_date = $row["publish_date"];
				$isbn = $row["isbn_10"];

				
				$phone = $row["phone_num"];
				$pay =  $row["pay_method"];
				$delivery = $row]["deliver_method"];
				$review = $row["review"];

				$price = $row["price"];

				//  Div for books Details

				echo ' <div style = "width: 45% ; float: left; height:500px"> ';
					echo  '<h2 class ="spacer" style = "text-align: center; padding-top : 10%; font-size: 18px"> Book Information </h2>';
						echo  '<p class ="spacer">'.$title.'</p>';
						echo  '<p class ="spacer">'.$author.'</p>';
						echo  '<p class ="spacer">'.$subject.'</p>';
						echo  '<p class ="spacer">'.$edition.'</p>';
						echo  '<p class ="spacer">'.$p_date.'</p>';
						echo  '<p class ="spacer">'.$isbn.'</p>';
				echo '</div>';
				
				// Div for Users

				echo  '<div style = "width: 45% ; float: right; height: 500px" >';
            		echo  '<h2  class ="spacer" style = "text-align: center; padding-top : 10%;font-size: 18px"> Seller Profile</h2>';
                	echo  '<p class ="spacer">'.$phone.'</p>';
                    echo  '<p class ="spacer">'.$pay.'</p>';
                    echo  '<p class ="spacer">.'$delivery.'</p>';
                    echo  '<p class ="spacer">'.$review.'</p>';
            	echo '</div>';

            	// Price Div

            	echo ' <div style = "width: 100%; align: center; font-size: 12px ">';
           	    echo ' <center>';
            	echo ' <h1 class ="spacer">'.$price.'</h1>';
                echo ' <button  class ="button" type="button">Order!</button>';
            	echo ' </center>';
            echo '</div>';      

	}



?>