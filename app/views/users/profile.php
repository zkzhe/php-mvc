<?php
require APPROOT . '/views/includes/head.php';
?>

<div class="navbar">
   <?php
   require APPROOT . '/views/includes/navigation.php';
   ?>
</div>


<div class="container">
   <div class="card">
      <div class="card-header" align="center">
         You have Successfully Logged In With Google
      </div>
      <div class="wrapper-landing">
         <h1>You have Successfully Logged In With Google</h1>
         <h5 class="card-title">name:<?php echo $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'] ?></h5>
         <h1><?php echo $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'] ?></h1>
         <h1>Email: <?php echo $_SESSION['user_email_address']; ?></h1>
         <img class="user-image" src="<?php echo $_SESSION["user_image"]; ?>" alt="Card image cap" width="210px" height="200px">
      </div>
   </div>
</div>