<?php session_start();?>

<html>

<title>Order Page</title>
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
				<h2 align="center" style="padding-top:20px"> Order Books </h2>

					<div id= "form">
						<center>
								<p><span >All fields required</span></p>
									<form action="order_validation.php" method="post" >	
										<table >
											<tr>
												<td>Address_1:</td>
												<td><input type="text" name="address_1" ></td>
											</tr>
											<tr>
												<td>City:</td>
												<td><input type="text" name="city" ></td>
											</tr>
											<tr>
												<td>State:</td>
												<td><input type="text" name="state" ></td>
											</tr>
											<tr>
												<td>Zip Code:</td>
												<td><input type="text" name="zip_code" ></td>
											</tr>
											<tr>
												<?php echo '<td><input  type="hidden" name="my_product_ID" value="'.$_POST["product_ID"].'"></td>';?>
											</tr>
											<tr>
												<td colspan="2" align="center">
													<input type="submit" value="Order">
												</td>
											</tr>
										</table>
									</form>		
						</center>
					</div>
				
			</div>
			
		</div>
		
		<div id="footer"></div> 
	</div>
	
 </body>
</html>