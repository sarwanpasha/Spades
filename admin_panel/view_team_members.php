<?php
session_start();
//require_once '../models/db_connection.php';
if(!isset($_SESSION['logged_in'])){
    header("Location:login_form");
}

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
<?php

    $obj_db = db_connection();
    
    if(isset($_GET['regID'])){
        $regID = $_GET['regID'];
    }
    $query_select_events = "select `events` from events where `reg_ID` = $regID";
    $query_select_team_leader = "select `team_leader_first_name`, `team_leader_last_name`, `team_leader_email`, `team_leader_phone_number` from team_leader where `reg_ID` = $regID";
    $query_select_member2 = "select `member2_first_name`, `member2_last_name`, `member2_email`, `member2_phone_number` from member2 where `reg_ID` = $regID";
    $query_select_member3 = "select `member3_first_name`, `member3_last_name`, `member3_email`, `member3_phone_number` from member3 where `reg_ID` = $regID";
    
    $result_events = $obj_db->query($query_select_events);
    $result_team_leader = $obj_db->query($query_select_team_leader);
    $result_member2 = $obj_db->query($query_select_member2);
    $result_member3 = $obj_db->query($query_select_member3);
    
    /*---------------------------Events----------------------*/
    echo("  <h2>Events</h2>
");
        echo("<div class='table-responsive'>");
        echo("<table class='table table-hover table-responsive'>
                <thead>
                  <tr>
                    <th style='text-align:center;'>Events</th>
                  </tr>
                </thead>
                <tbody>
            ");
        
        while($data_events = mysqli_fetch_array($result_events)){
            $events = $data_events['events'];
            $events = unserialize($events); // This $events variable contains an array
            foreach ($events as $e){
                echo("<tr>"
                    . "<td style='text-align:center;'>$e</td>"
                . "</tr>");
            }
            
        }
                    echo("</tbody>
              </table>");
                    echo("</div>");
    /*---------------------------End of Events----------------------*/

    /*---------------------------Team Leader Data----------------------*/
    echo("  <h2>Team Leader</h2>
");
        echo("<div class='table-responsive'>");
        echo("<table class='table table-hover table-responsive'>
                <thead>
                  <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                  </tr>
                </thead>
                <tbody>
            ");
        
        while($data_team_leader = mysqli_fetch_array($result_team_leader)){
            $team_leader_first_name = $data_team_leader['team_leader_first_name'];
            $team_leader_last_name = $data_team_leader['team_leader_last_name'];
            $team_leader_email = $data_team_leader['team_leader_email'];
            $team_leader_phone_number = $data_team_leader['team_leader_phone_number'];
            echo("<tr>"
                . "<td>$team_leader_first_name</td>"
                . "<td>$team_leader_last_name</td>"
                . "<td>$team_leader_email</td>"
                . "<td>$team_leader_phone_number</td>"
            . "</tr>");
            
        }
                    echo("</tbody>
              </table>");
                    echo("</div>");
    /*---------------------------End of Team Leader Data----------------------*/

    /*---------------------------Member2 Data----------------------*/
    echo("  <h2>Member 2</h2>
");
        echo("<div class='table-responsive'>");
        echo("<table class='table table-hover table-responsive'>
                <thead>
                  <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                  </tr>
                </thead>
                <tbody>
            ");
        
        while($data_member2 = mysqli_fetch_array($result_member2)){
            $member2_first_name = $data_member2['member2_first_name'];
            $member2_last_name = $data_member2['member2_last_name'];
            $member2_email = $data_member2['member2_email'];
            $member2_phone_number = $data_member2['member2_phone_number'];
            echo("<tr>"
                . "<td>$member2_first_name</td>"
                . "<td>$member2_last_name</td>"
                . "<td>$member2_email</td>"
                . "<td>$member2_phone_number</td>"
            . "</tr>");
            
        }
                    echo("</tbody>
              </table>");
                    echo("</div>");
    /*---------------------------End of Member2 Data----------------------*/

    /*---------------------------Member3 Data----------------------*/
    echo("  <h2>Member 3</h2>
");
        echo("<div class='table-responsive'>");
        echo("<table class='table table-hover table-responsive'>
                <thead>
                  <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                  </tr>
                </thead>
                <tbody>
            ");
        
        while($data_member3 = mysqli_fetch_array($result_member3)){
            $member3_first_name = $data_member3['member3_first_name'];
            $member3_last_name = $data_member3['member3_last_name'];
            $member3_email = $data_member3['member3_email'];
            $member3_phone_number = $data_member3['member3_phone_number'];
            echo("<tr>"
                . "<td>$member3_first_name</td>"
                . "<td>$member3_last_name</td>"
                . "<td>$member3_email</td>"
                . "<td>$member3_phone_number</td>"
            . "</tr>");
            
        }
                    echo("</tbody>
              </table>");
                    echo("</div>");
    /*---------------------------End of Member3 Data----------------------*/
$back_url = $_SERVER['HTTP_REFERER'];
echo("<a href='$back_url'><button style='background-color: #444444; color:white;'>Go Back</button></a>");                    

?></div>
    </body>
</html>
        