<!DOCTYPE >
<html>
<?php include 'PHP/test_db.php';?>
<title>UBooks Main Page</title>
<link rel="stylesheet" href="style/style.css"/>

<body>

	<div class="main_wrapper">
		<!--Header -->
		<div class="header">
			<!--Login and Sign up Links -->
			<div class="Account_header"> <a href="http://www.amazon.com/" >Login</a> | <a href="http://www.amazon.com/" >Sign up</a> </div>

			<h1>UBooks <br><img src="Book.png" width="150" height="110" align="bottom"></br></h1>
		</div>
		<!--End Header -->
		
		<!-- Menu Bar -->
		<hr>
			<div class="menu_bar">
				<ul id="menu">
					<li><a href="index.php">Home</a></li>
					<li><a href="testHome.php">About us</a></li>
				</ul>
								
				<div id="form">
					<form action="testHome.php" method="post">
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
				<?php seachProducts();?>
				
				<!--END display database content-->
				
			</div>
			
		</div>
		<div id="footer">by Jean K.</div> 
	</div>
</body>
</html>