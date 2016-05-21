
<?php  
	
	
	DEFINE('DB_USERNAME', 'root');
	DEFINE('DB_PASSWORD', 'root');
	DEFINE('DB_HOST', 'localhost');
	DEFINE('DB_DATABASE', 'ubooks');
		 
	function viewAll(){

		$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

		 if (mysqli_connect_error()) {
		  die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
		 }
			 
		 $sql = "SELECT * FROM products natural join books WHERE product_ID not in (select product_ID from orders)";
		 
		$result = $mysqli->query($sql);
		if ($result->num_rows > 0) {
					// output data of each row
			echo '<table id="book_list2">';
			while($row = $result->fetch_assoc()) {
				$title= $row["title"];
				$author= $row["author"];
				$price= $row["price"];

				$pro_ID = $row["product_ID"];

						
				echo'	<tr>';
				echo'		<td>Title: '.$title.'</td>';
				echo'		<td>Author:'.$author.'</td>';
				echo'		<td>Price:'.$price.'$</td>';
				echo'		<td>					   ';
				echo'			<form action="book_information.php?p_id='.$pro_ID.'" method="post">';
				echo'				<button name="product_ID" type="submit" value="'.$pro_ID.'">View Information</button>';
				echo'			</form>';
				echo'		</td>					   ';
				echo'	</tr>';
							
			}	
			echo'</table>';
		} else {
			echo "<p>0 results</p>";
		}
		$mysqli->close();
	}
	
	function seachProducts(){
		$searchtype=$_POST['searchtype'];
		$searchterm=$_POST['searchterm'];
		$searchterm= trim($searchterm);
		
		if(!get_magic_quotes_gpc()){
			$searchtype=addslashes($searchtype);
			$searchterm=addslashes($searchterm);
			
		}
		$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

		 if (mysqli_connect_error()) {
		  die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
		 }
		if($searchtype== 'showAll'){
			$sql = "SELECT * FROM products natural join books WHERE product_ID not in (select product_ID from orders)";
		}else{ 
			$sql = "SELECT * FROM products natural join books WHERE product_ID not in (select product_ID from orders) and ".$searchtype." like '%".$searchterm."%'"; 			
		}
		$result = $mysqli->query($sql);
		if ($result->num_rows > 0) {
					// output data of each row
			echo '<table id="book_list2">';
			while($row = $result->fetch_assoc()) {
				$title= $row["title"];
				$author= $row["author"];
				$price= $row["price"];
			    $pro_ID = $row["product_ID"];

						
				echo '	<tr>';
				echo'		<td>Title: '.$title.'</td>';
				echo'		<td>Author:'.$author.'</td>';
				echo'		<td>Price:'.$price.' $</td>';
				echo'		<td>					   ';
				echo'			<form action="book_information.php?p_id='.$pro_ID.'" method="post">';
				echo'				<button name="product_ID" type="submit" value="'.$pro_ID.'">View Information</button>';
				echo'			</form>';
				echo'		</td>					   ';
				echo'	</tr>';
							
			}	
			echo'</table>';
		} else {
			echo "<p>0 results</p>";
		}
		$mysqli->close();
	}
	
	function seachProducts_Auth(){
		$searchtype=$_POST['searchtype'];
		$searchterm=$_POST['searchterm'];
		$searchterm= trim($searchterm);
		
		if(!get_magic_quotes_gpc()){
			$searchtype=addslashes($searchtype);
			$searchterm=addslashes($searchterm);
			
		}
		$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

		 if (mysqli_connect_error()) {
		  die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
		 }
		if($searchtype== 'showAll'){
			$sql = "SELECT * FROM products natural join books WHERE product_ID not in (select product_ID from orders)";
		}else{ 
			$sql = "SELECT * FROM products natural join books WHERE product_ID not in (select product_ID from orders) and ".$searchtype." like '%".$searchterm."%'"; 			
		}
		$result = $mysqli->query($sql);
		if ($result->num_rows > 0) {
					// output data of each row
			echo '<table id="book_list2">';
			while($row = $result->fetch_assoc()) {
				$title= $row["title"];
				$author= $row["author"];
				$price= $row["price"];
			    $pro_ID = $row["product_ID"];

						
				echo '	<tr>';
				echo'		<td>Title: '.$title.'</td>';
				echo'		<td>Author:'.$author.'</td>';
				echo'		<td>Price:'.$price.' $</td>';
				echo'		<td>					   ';
				echo'			<form action="book_information_auth.php?p_id='.$pro_ID.'" method="post">';
				echo'				<button name="product_ID" type="submit" value="'.$pro_ID.'">View Information</button>';
				echo'			</form>';
				echo'		</td>					   ';
				echo'	</tr>';
							
			}	
			echo'</table>';
		} else {
			echo "<p>0 results</p>";
		}
		$mysqli->close();
	}
?>
