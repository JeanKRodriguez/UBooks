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
				<!--display database content-->
				<h2 align="center" style="padding-top:20px"> User Name: <?php echo $_SESSION['my_user_name'];?> </h2>
				<?php 
					my_sold_books();
					my_ordered_books();
				?>
				<!--END display database content-->
				
			</div>
			
		</div>
		<div id="footer"></div> 
	</div>
	
</body>
</html>