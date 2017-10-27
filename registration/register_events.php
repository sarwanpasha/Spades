<?php
session_start();
require_once '../models/user.php';
require_once '../models/web_interface.php';

if(isset($_SESSION['obj_user'])){
    $obj_user = unserialize($_SESSION['obj_user']);
} else{
    $obj_user = new User();
}
if(isset($_SESSION['errors'])){
    $errors = $_SESSION['errors'];
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Registration | Spades</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
      <link rel="stylesheet" href="css/style.css">

<script type="text/javascript" src="../scripts/jquery-2.1.4.min.js"></script>
      <script type="text/javascript">
      </script>
</head>

<body>
  <!-- multistep form -->
  <form action="../process/process_register_events.php" id="msform" method="post" enctype="multipart/form-data">
  <!-- progressbar -->
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Events</h2>
    <h3 class="fs-subtitle">Select Events</h3>
        <?php
    Web_Interface::load_events($obj_user->events);
    ?>
            <span id="events_error">
                <?php
                    if(isset($errors['events'])){
                        echo($errors['events']);
                    }
                ?>
            </span>
    <input type="submit" class="action-button" value="Submit" />
  </fieldset>
</form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>

    <script  src="js/index.js"></script>

</body>
</html>
