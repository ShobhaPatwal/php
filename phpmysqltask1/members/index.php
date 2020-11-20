<?php 

session_start(); 
include('../config.php');
$title = "Dashboard";
include('../header.php');

if (!isset($_SESSION['userdata']['username'])) {
  	header('location: ../login.php');
}
if (isset($_GET['action']) && $_GET['action']=="logout") {
  	unset($_SESSION['userdata']['username']);
    session_destroy();
  	header("location: ../login.php");
}

?>


<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['userdata']['username'])) : ?>
    	<p>"Welcome <strong><?php echo $_SESSION['userdata']['username']; ?></strong>"</p>
    	<p> <a href="index.php?action=logout" style="color: red;">Logout</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>