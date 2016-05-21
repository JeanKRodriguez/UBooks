<?php session_start();?>
<html>
<?php require_once('PHP/login_session_functions.php');?>
<title>History Page</title>
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
				<!--display content-->
				<?php
				require_once('PHP/review_functions.php');
				
				$revewing_ID= $_POST['reviewing'];
				$stars=$_POST['stars'];
				$my_ID=$_SESSION['my_user_ID'];
				
				if(!$revewing_ID || !$stars || !$my_ID){
					echo' <p>You have not filled all the information required. Please Try again<p>';
				}
				else{
					submit_review();
					echo' <p>You have successfully created a review.<p>';
				}
					
			?>
				<!--END display content-->
				
			</div>
			
		</div>
		<div id="footer"></div> 
	</div>
	
</body>
</html>