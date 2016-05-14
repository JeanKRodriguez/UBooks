<!DOCTYPE >
<html>
<title>Login Main Page</title>
<link rel="stylesheet" href="style/login_session.css"/>

<body>

	<div class="main_wrapper">
		<!--Header -->
		<div class="header">
			<h1>UBooks <br><img src="Book.png" width="150" height="110" align="bottom" text></br></h1>

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
		
		</div>	
	</div>
	
</body>
</html>
