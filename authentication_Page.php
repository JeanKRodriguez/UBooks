<?php
	require_once('PHP/login_session_functions.php');
	starting_session();
?>

<html>
<?php require_once('PHP/search_functions.php');?>
<title>Authentication Page</title>
<link rel="stylesheet" href="style/index_style.css"/>

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
				</ul>
								
				<div id="form">
					<form action="authentication_Page.php" method="post">
						<select name="searchtype">
							<option value="showAll">All</option>
							<option value="author">Author</option>
							<option value="title">Title</option>
							<option value="isbn">ISBN</option>
						</select>
						<input name="searchterm" type="text">
						<input type="submit" value="search">
				</form>
				</div>
			</div>
		<hr>
		
		<!--List of Books-->
		<div class="content_wrapper">
			<div id="content_area">
				<!--display database content-->
				<?php seachProducts_Auth();?> 
				
				<!--END display database content-->
				
			</div>
			
		</div>
		<div id="footer"></div> 
	</div>
	
</body>
</html>

