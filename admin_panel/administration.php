<?php
session_start();
if(!isset($_SESSION['logged_in'])){
    header("Location:login_form");
}
//require_once '../models/db_connection.php';
require_once '../functions/db_connection_func.php';
?>

<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Spades Admin Panel</title>
	<meta name="description" content="">  
	<meta name="author" content="">

   <!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 	<!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="../css/base.css">
   <link rel="stylesheet" href="../css/vendor.css">  
   <link rel="stylesheet" href="../css/main.css">  

   <!-- script
   ================================================== -->
	<script src="../js/modernizr.js"></script>
	<script src="../js/pace.min.js"></script>

   <!-- favicons
	================================================== -->
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
	<link rel="icon" href="../favicon.ico" type="image/x-icon">
    </head>
    <body style="background-color:#b2b2b2;">
<div class="container">
    <div>
        <div style="float:left;"><h2>Registrations</h2></div>
        <div style="float:right;">
             <?php
                echo("<a href='login_form/process/process_logout.php' style='text-decoration:underline; color:#c92f11;'>Logout</a>");
             ?>
        </div>
    </div>
    <div style="clear:both;"></div>
 
<?php

    $obj_db = db_connection();
    
    $query_select = "select * from registrations";

    $result = $obj_db->query($query_select);
    if($result->num_rows == 0){
        echo("<div style='text-align:center; font-size:19px; font-weight:bold; padding:150px 150px;'>No Registrations yet</div>");
    } else{
        echo("<div class='table-responsive'>");
        echo("<table class='table table-hover table-responsive'>
                <thead>
                  <tr>
                    <th style='text-align:center;'>Reg ID</th>
                    <th>Reg Date</th>
                    <th>View</th>
                  </tr>
                </thead>
                <tbody>
            ");
        
        while($data = mysqli_fetch_array($result)){
            $reg_ID = $data['reg_ID'];
            $registration_date = $data['registration_date'];
            
            echo("<tr>"
                    . "<td style='text-align:center;'>$reg_ID</td>"
                    . "<td>$registration_date</td>"
                    . "<td><a href='view_team_members.php?regID=$reg_ID' style='text-decoration:underline;'>View</a></td>"
                . "</tr>");
        }
                    echo("</tbody>
              </table>");
                    echo("</div>");

    }

?></div>
    </body>
</html>
        