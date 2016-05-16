<?php
	require_once('PHP/login_session_functions.php');
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
			<?php if (!empty($old_user)){echo '(Logged out.) ';}else{ echo '(You were not logged in.) '; }?>
			<a href="loginPage.php" >Login</a> | <a href="" >Sign up</a> 
			</div>

			<h1>UBooks <br><img src="Book.png" width="150" height="110" align="bottom"></br></h1>
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
            
             <!--1st Div-->
            <div style = "width: 45% ; float: left; height:500px">
	            <h2 class ="spacer" style = "text-align: center; padding-top : 10%; font-size: 18px" > Book Information</h2>
                    <p class ="spacer">Title</p>
                    <p class ="spacer">Author</p>
                    <p class ="spacer">Subject</p>
                    <p class ="spacer">Edition</p>
                    <p class ="spacer">Publish Date</p>
                    <p class ="spacer">ISBN</p>
            </div>
            
            
             <!--2nd Div-->
            <div style = "width: 45% ; float: right; height: 500px" >
            	<h2  class ="spacer" style = "text-align: center; padding-top : 10%;font-size: 18px"> Seller Profile</h2>
                    <p class ="spacer">Phone #</p>
                    <p class ="spacer">Pay Method</p>
                    <p class ="spacer">Delivery Method</p>
            </div>
            
             <!--Buy Div-->
            
            <div style = "width: 100%; align: center; font-size: 12px ">
            <center>
            	<h1 class ="spacer">Price</h1>
                <button  class ="button" type="button">Order!</button>
            </center>
            </div>		
		</div>
		<div id="footer"> </div> 
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

