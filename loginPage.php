<!DOCTYPE >
<html>
<title>Login Main Page</title>
<link rel="stylesheet" href="style/login_session.css"/>

<body>

	<div class="main_wrapper">
		<!--Header -->
		<div class="header">
			<h2 id="title">UBooks</h2>

			<!-- Login Form-->
		
			<form action="authentication_Page.php" method="post" >	
				<table >
					<tr>
						<td>Email:</td>
						<td><input type="text" name="email" ></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type="password" name="passwords" ></td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" value="LogIn">
						</td>
					</tr>
				</table>
			</form>
			
			<a href="index.php"> Back to the Main Page</a>
		
		</div>	
	</div>
	
</body>
</html>
