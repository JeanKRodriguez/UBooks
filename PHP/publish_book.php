<?php  
	
DEFINE('DB_USERNAME', 'root');
DEFINE('DB_PASSWORD', 'root');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_DATABASE', 'ubooks');


$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

		 if (mysqli_connect_error()) {
		  die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
		 }

			$isbn_10Err = $titleErr = $authorErr = $publish_dateErr = $edition = $subject = "";
			$isbn_10 = $title  = $author  = $publish_date = $edition = $subject =  "";
		
			
			  if (empty($_POST["title"])) {
				$title = "Titleis required";
			  } else {
				$title = test_input($_POST["name"]);
			  }
			  
			  if (empty($_POST["edition"])) {
				$editionErr = "edition is required";
			  } else {
				$edition = test_input($_POST["edition"]);
			  }

			  if (empty($_POST["author"])) {
				$author = "author";
			  } else {
				$author = test_input($_POST["author"]);
			  }
				
			  if (empty($_POST["subject"])) {
				$subject = "";
			  } else {
				$subject = test_input($_POST["subject"]);
			  }
			  
			  if (empty($_POST["publish_date"])) {
				$publish_date = "";
			  } else {
				$publish_date = test_input($_POST["publish_date"]);
			  }
			
			  if (empty($_POST["isbn_10"])) {
				$isbn_10 = "";
			  } else {
				$isbn_10 = test_input($_POST["isbn_10"]);
			  }
			 

		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}

		$sql = 'INSERT INTO Books (isbn_10, title, author, subject, publish_date, edition) VALUES ("'.$isbn_10.', '.$title.', '.$author.', '.$subject.', '.$publish_date.', '.$edition.')';

				
			if($mysqli->query($sql) == True){ 
				echo "<h2>You submitted:</h2>";
				echo $title;
				echo "<br>";
				echo $author;
				echo "<br>";
				echo $subject;
				echo "<br>";
				echo $publish_date;
				echo "<br>";
				echo $edition ;
				echo "<br>";
				echo $isbn_10;

		}
		
		$mysqli->close();
	

?>
 