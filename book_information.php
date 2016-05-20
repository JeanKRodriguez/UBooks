<?php
	require_once('PHP/book_info_functions.php');
	ending_session();
?>
<!DOCTYPE >
<html>
<?php require_once('PHP/search_functions.php');?>
<title>Book Information</title>
<link rel="stylesheet" href="style/index_style.css"/>

<body>

	<div class="main_wrapper">
		<!--Header -->
		<div class="header">
			<!--Login and Sign up Links -->
			<div class="Account_header"> 
			<?php if (!empty($old_user)){echo '(Logged out.) ';}else{ echo '(You are not logged in.) '; }?>
			<a href="loginPage.php" >Login</a> | <a href="" >Sign up</a> 
			</div>

			<h1> UBooks <br><img src="Book.png" width="150" height="110" align="bottom"></br></h1>
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
			            
            <!--Spacer-->

             <div style = "width: 10% ; float: left; height:500px">
    		 </div>
            
         <?php viewDetails();?>

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

