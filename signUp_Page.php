<!DOCTYPE >
<html>
<title>SignUp Page</title>
<link rel="stylesheet" href="style/login_session.css"/>

<body>

	<div class="main_wrapper">
		<!--Header -->
		<div class="header">
			<h2 id="title">UBooks</h2>

			<!-- SignUp Form-->
		
			<form action="signUP_Validation.php" method="post" >	
				<table >
					<tr>
						<td>Username:</td>
						<td><input type="text" name="user_name" ></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><input type="text" name="email" ></td>
					</tr>
					<tr>
						<td>Phone Number:</td>
						<td><input type="text" name="phone_num" ></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type="password" name="passwords" ></td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" value="SignUp">
						</td>
					</tr>
				</table>
			</form>
			<a href="index.php"> Back to the Main Page</a>
		
		</div>	
	</div>
	
</body>
</html>