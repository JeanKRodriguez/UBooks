<?php
  session_start();
  
  // store to test if they *were* logged in
  $old_user = $_SESSION['my_user_ID'];  
  unset($_SESSION['my_user_ID']);
  unset($_SESSION['my_user_name']);
  session_destroy();
?>
<html>
<body>
<h1>Log out</h1>
<?php 
  if (!empty($old_user))
  {
    echo 'Logged out.<br />';
  }
  else
  {
    // if they weren't logged in but came to this page somehow
    echo 'You were not logged in, and so have not been logged out.<br />'; 
  }
?> 
<a href="index.php">Back to main page</a>
</body>
</html>