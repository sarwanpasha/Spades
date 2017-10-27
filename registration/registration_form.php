<?php
session_start();
require_once '../models/user.php';
require_once '../models/web_interface.php';

if(isset($_SESSION['obj_user'])){
    $obj_user = unserialize($_SESSION['obj_user']);
} else{
    $obj_user = new User();
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
          $(document).ready(function(){
              $("#leader_next").click(function(){
                  /*
                  if($("#leader_first_name").val()==''){
                      alert('fill in first name');
                      return false;
                  }
                  */
                  var team_leader_data = {
                      action: 'team_leader',
                      leader_first_name: $("#leader_first_name").val(),
                      leader_last_name: $("#leader_last_name").val(),
                      leader_email: $("#leader_email").val(),
                      leader_phone_number: $("#leader_phone_number").val()
                  };
                  $.ajax({
                        type: "POST",
                        url: "functions/registration_functions.php",
                        data: team_leader_data
                    });

                });
                
              $("#member2_next").click(function(){
                  
                var member2_data = {
                      action: 'member2',
                      member2_first_name: $("#member2_first_name").val(),
                      member2_last_name: $("#member2_last_name").val(),
                      member2_email: $("#member2_email").val(),
                      member2_phone_number: $("#member2_phone_number").val()
                  };  
                  $.ajax({
                        type: "POST",
                        url: "functions/registration_functions.php",
                        data: member2_data
                    });  
                });
            $("#member3_next").click(function(){
                  
                var member3_data = {
                      action: 'member3',
                      member3_first_name: $("#member3_first_name").val(),
                      member3_last_name: $("#member3_last_name").val(),
                      member3_email: $("#member3_email").val(),
                      member3_phone_number: $("#member3_phone_number").val()
                  };  
                  $.ajax({
                        type: "POST",
                        url: "functions/registration_functions.php",
                        data: member3_data
                    });  
                });
       });   
      </script>
</head>

<body>
  <!-- multistep form -->
  <form action="../process/process_register_members.php" id="msform" method="post" enctype="multipart/form-data">
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Team Leader</li>
    <li>Team Member 2</li>
    <li>Team Member 3</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Team Leader</h2>
    <h3 class="fs-subtitle">Details</h3>
    <input type="text" name="leader_first_name" id="leader_first_name" placeholder="First Name" value="" />
    <input type="text" name="leader_last_name" id="leader_last_name" placeholder="Last Name" value="" />
    <input type="email" name="leader_email" id="leader_email" placeholder="Email" />
    <input type="text" name="leader_phone_number" id="leader_phone_number" placeholder="Phone" value="" />
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input id="leader_next" type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Team Member 2</h2>
    <h3 class="fs-subtitle">Details</h3>
    <input type="text" name="member2_first_name" id="member2_first_name" placeholder="First Name" value="" />
    <input type="text" name="member2_last_name" id="member2_last_name" placeholder="Last Name" value="" />
    <input type="email" name="member2_email" id="member2_email" placeholder="Email" />
    <input type="text" name="member2_phone_number" id="member2_phone_number" placeholder="Phone" value="" />
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input id="member2_next" type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Team Member 3</h2>
    <h3 class="fs-subtitle">Details</h3>
    <input type="text" name="member3_first_name" id="member3_first_name" placeholder="First Name" value="" />
    <input type="text" name="member3_last_name" id="member3_last_name" placeholder="Last Name" value="" />
    <input type="email" name="member3_email" id="member3_email" placeholder="Email" />
    <input type="text" name="member3_phone_number" id="member3_phone_number" placeholder="Phone" value="" />
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input id="member3_next" type="submit" name="next" class="action-button" value="Submit" />
  </fieldset>
</form>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>

    <script  src="js/index.js"></script>

</body>
</html>
<?php
if(isset($_SESSION['registration_successful_prompt'])){
    unset($_SESSION['registration_successful_prompt']);
    ?>
<script type="text/javascript">
    $(document).ready(function(){
        window.alert("You have registered successfully!");
    });
</script>
<?php
}
?>