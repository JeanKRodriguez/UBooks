<?php session_start();?>

<html>

<title>Published Page</title>
<link rel="stylesheet" href="style/profile_history.css"/>

<body>

	<div class="main_wrapper">
		<!--Header -->
		<div class="header">
			<!--Login and Sign up Links -->
			<div class="Account_header"> (Welcome  <?php echo $_SESSION['my_user_name'];?> ) <a href="index.php" > Logout</a> </div>

			<h1 id="title">UBooks </h1>
		</div>
		<!--End Header -->
		
		<!-- Menu Bar -->
		<hr>
			<div class="menu_bar">
				<ul id="menu">
					<li><a href="authentication_Page.php">Home</a></li>
					<li><a href="profile_Page.php">Profile</a></li>
					<li><a href="history_Page.php">History</a></li>
					<li><a href="sell_Page.php">Sell</a></li>
				</ul>	
				
			</div>
		<hr>
		
		<!--List of Books-->
		<div class="content_wrapper">
			<div id="content_area">
				<!--display database content-->
				<?php
				require_once('PHP/publish_functions.php');
				
				$title= $_POST['title'];
				$isbn_10=$_POST['isbn_10'];
				$author= $_POST['author'];
				$subject=$_POST['subject'];
				$edition=$_POST['editions'];
				$publish_date= $_POST['publish_date'];
				$pay_method=$_POST['pay_method'];
				$delivery_method= $_POST['delivery_method'];
				$price=$_POST['price'];
				$my_ID=$_SESSION['my_user_ID'];
				
				if(!$title || !$isbn_10 || !$author || !$subject || !$publish_date || !$pay_method || !$delivery_method || !$price){
					echo' <p>You have not filled all the information required. Please Try again<p>';
				}
				else{
					publish_book();
					echo' <p>You have successfully Published a Book.<p>';
				}
					
			?>

					
				
			</div>
			
		</div>
		
		<div id="footer"></div> 
	</div>
	
 </body>
</html>