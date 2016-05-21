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
				
				
				<form action="review_Validation.php" method="post" >	
				<table >
					<tr>
						<td>
							<h2>Review</h2>
						</td>
					</td>
					<tr>
						<td>You are Reviewing: </td>
						<td>
						<select name="reviewing">
							<?php echo '<option value="'.$_POST["This_reviewer_ID"].'"></option>';?>
						</select>
						</td>
					</tr>
					<tr>
						<td>Stars: </td>
						<td>
						<select name="stars">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
						</td>
					</tr>
					<tr>
						<td colspan="2" align="center">
						<input type="submit" value="review">
						</td>
					</tr>
				</table>
			</form>
				<!--END display content-->
				
			</div>
			
		</div>
		<div id="footer"></div> 
	</div>
	
</body>
</html>