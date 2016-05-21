<html>

<?php require_once('PHP/publish_book.php');?>

<title>Sell Page</title>
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
				<h2 align="center" style="padding-top:20px"> Sell Books </h2>

					<div id= "form">
						<center>
								<p><span class="error">All fields required</span></p>
									<form method="post" action="publish_book.php">  
									  Title: <input type="text" name="title">
									  <span class="error"> </span>
									  <br><br>
									  Author: <input type="text" name="author">
									  <span class="error"> </span>
									  <br><br>
									  Subject: <input type="text" name="subject">
									  <span class="error"></span>
									  <br><br>
									  Publish Date: <input type="text" name="publish_date">
									  <span class="error"></span>
									  <br><br>
									  Edition: <input type="text" name="edition">
									  <span class="error"></span>
									  <br><br>
									  ISBN: <input type="text" name="isbn_10">
									  <span class="error"></span>
									  <br><br>
			  
									  <input type="submit" name="submit" value="Submit">  
									</form>			
						</center>
					</div>
				
			</div>
			
		</div>
		<div id="footer"></div> 
	</div>
	
 </body>
</html>