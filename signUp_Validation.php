<!DOCTYPE >
<html>
<title>SignUp Page</title>
<link rel="stylesheet" href="style/login_session.css"/>

<body>

	<div class="main_wrapper">
		<!--Header -->
		<div class="header">
			<h2 id="title">UBooks</h2>

			<!-- Login Form-->
		
			<?php
				require_once('PHP/login_session_functions.php');
				
				$user_name=trim($_POST['user_name']);
				$email=trim($_POST['email']);
				$phone_num=trim($_POST['phone_num']);
				$passwords=$_POST['passwords'];
				
				if(!$user_name || !$email || !$phone_num || !$passwords){
					echo' <p>You have not filled all the information required. Please Try again<p>';
					echo'<a href="signUp_Page.php"> Back to Sign Up</a>';
				}
				else{
					Create_new_User($user_name, $email, $phone_num, $passwords);
					starting_session();
	
					echo' <p>You have successfully created your account. Welcome: '.$_SESSION['my_user_name'].'<p>';
					echo'<a href="authentication_Page.php"> Go to my Account</a>';
				}
					
			?>
			
			
		
		</div>	
	</div>
	
</body>
</html>