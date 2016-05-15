<?php
	require_once('PHP/login_session_functions.php');
	ending_session();
?>
<!DOCTYPE >
<html>
<?php require_once('PHP/search_functions.php');?>
<title>UBooks Main Page</title>
<link rel="stylesheet" href="style/index_style.css"/>

<body>

	<div class="main_wrapper">
		<!--Header -->
		<div class="header">
			<!--Login and Sign up Links -->
			<div class="Account_header"> 
			<?php if (!empty($old_user)){echo '(Logged out.) ';}else{ echo '(You were not logged in.) '; }?>
			<a href="loginPage.php" >Login</a> | <a href="" >Sign up</a> 
			</div>

			<h1 id="title">UBooks</h1>
		</div>
		<!--End Header -->
		
		<!-- Menu Bar -->
		<hr>
			<div class="menu_bar">
				<ul id="menu">
					<li><a href="index.php">Home</a></li>
					<li><a href="">About us</a></li>
				</ul>
								
				<div id="form">
					<form action="search_Index.php" method="post">
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
				<?php viewAll();?>
				
				<!--END display database content-->
				
			</div>
			
		</div>
		<div id="footer"> </div> 
	</div>
</body>
</html>

