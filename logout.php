<?php 
require_once 'include/initialize.php';
// Four steps to closing a session
// (i.e. logging out)

// 1. Find the session
@session_start();

// 2. Unset all the session variables
// unset( $_SESSION['USERID'] );
// unset( $_SESSION['FULLNAME'] );
// unset( $_SESSION['USERNAME'] );
// unset( $_SESSION['PASS'] );
// unset( $_SESSION['ROLE'] );
 

unset( $_SESSION['USERID'] );
unset( $_SESSION['NAME'] );
unset( $_SESSION['USERNAME'] );
unset( $_SESSION['TYPEID'] );
unset( $_SESSION['TYPE'] );
// 4. Destroy the session
// session_destroy();
?>
<script language="javascript">
	window.location.href = "login.php?logout=1"
</script>
              <?php
//redirect("login.php?logout=1");
?>
