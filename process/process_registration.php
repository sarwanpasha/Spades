<?php
session_start();
require_once '../functions/db_connection_func.php';

$obj_db = db_connection();

$query_registration = "insert into registrations (`reg_ID`, `registration_date`) "
        . "values (NULL, NULL)";
$obj_db->query($query_registration);
if($obj_db->errno){
    die("Query INSERT Registration ERROR - $obj_db->errno - $obj_db->error");
}

$reg_ID = $obj_db->insert_id;    
//echo($reg_ID);
if(isset($_SESSION['team_leader_data'])){
    $team_leader_data = $_SESSION['team_leader_data'];
    
    $team_leader_first_name = $team_leader_data['first_name'];
    $team_leader_last_name = $team_leader_data['last_name'];
    $team_leader_email = $team_leader_data['email'];
    $team_leader_phone_number = $team_leader_data['phone_number'];
    
    $query_team_leader_data = "insert into team_leader (`reg_ID`, `team_leader_ID`, `team_leader_first_name`, "
            . "`team_leader_last_name`, `team_leader_email`, `team_leader_phone_number`) "
        . "values ($reg_ID, NULL, '$team_leader_first_name', '$team_leader_last_name', '$team_leader_email', '$team_leader_phone_number')";

    $obj_db->query($query_team_leader_data);
    if($obj_db->errno){
        die("Query INSERT Team Leader Data ERROR - $obj_db->errno - $obj_db->error");
    }
    
}
if(isset($_SESSION['member2_data'])){
    $member2_data = $_SESSION['member2_data'];
    
    $member2_first_name = $member2_data['first_name'];
    $member2_last_name = $member2_data['last_name'];
    $member2_email = $member2_data['email'];
    $member2_phone_number = $member2_data['phone_number'];
    
    $member2_data = "insert into member2 (`reg_ID`, `member2_ID`, `member2_first_name`, "
            . "`member2_last_name`, `member2_email`, `member2_phone_number`) "
        . "values ($reg_ID, NULL, '$member2_first_name', '$member2_last_name', '$member2_email', '$member2_phone_number')";

    $obj_db->query($member2_data);
    if($obj_db->errno){
        die("Query INSERT Member2 Data ERROR - $obj_db->errno - $obj_db->error");
    }
}

if(isset($_SESSION['member3_data'])){
    $member3_data = $_SESSION['member3_data'];
    
    $member3_first_name = $member3_data['first_name'];
    $member3_last_name = $member3_data['last_name'];
    $member3_email = $member3_data['email'];
    $member3_phone_number = $member3_data['phone_number'];
    
    $member3_data = "insert into member3 (`reg_ID`, `member3_ID`, `member3_first_name`, "
            . "`member3_last_name`, `member3_email`, `member3_phone_number`) "
        . "values ($reg_ID, NULL, '$member3_first_name', '$member3_last_name', '$member3_email', '$member3_phone_number')";

    $obj_db->query($member3_data);
    if($obj_db->errno){
        die("Query INSERT Member3 Data ERROR - $obj_db->errno - $obj_db->error");
    }
}
if(isset($_SESSION['events_data'])){
    $events_data = $_SESSION['events_data'];    // $events_data contains an array
    
    $event_data_insert = "insert into events (`reg_ID`, `events_ID`, `events`) values "
            . "($reg_ID, NULL, '". serialize($events_data) ."')";

    $obj_db->query($event_data_insert);
    if($obj_db->errno){
        die("Query INSERT Events Data ERROR - $obj_db->errno - $obj_db->error");
    }
}
$_SESSION['registration_successful_prompt'] = TRUE;
header("Location:../registration/registration_form.php");
?>