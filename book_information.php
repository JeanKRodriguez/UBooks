<!DOCTYPE >
<html>
<?php 
		require_once('PHP/search_functions.php');
		require_once('PHP/book_info_functions.php');
	  
?>
<title>Book Information</title>
<link rel="stylesheet" href="style/index_style.css"/>

<body>

	<div class="main_wrapper">
		<!--Header -->
		<div class="header">
			<!--Login and Sign up Links -->
			<div class="Account_header"> (You are not logged in.) <a href="loginPage.php" > Login</a> | <a href="signUp_Page.php" >Sign up</a> </div>

			<h1 id="title">UBooks </h1>
		</div>
		<!--End Header -->
		
		<!-- Menu Bar -->
		<hr>
			<div class="menu_bar">
				<ul id="menu">
					<li><a href="index.php">Home</a></li>
					<li><a href="">About us</a></li>
				</ul>
								
			</div>
		<hr>
		
		<!--List of Books-->
		<div class="content_wrapper">
			      
			<div style = "width: 10% ; float: left; height:500px">
    		 </div>
            <?php viewDetails();?>
		</div>
		
		
		<div id="footer"></div> 
	</div>
	
</body>
</html>

<style>
 .spacer{
	 	margin-bottom: 10%;
	 }
	 
 .button {
    background-color: #81b7D7; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}
</style>

