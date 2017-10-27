<?php
session_start();

$action = $_POST['action'];
if($action == 'team_leader'){
    $leader_first_name = $_POST['leader_first_name'];
    $leader_last_name = $_POST['leader_last_name'];
    $leader_email = $_POST['leader_email'];
    $leader_phone_number = $_POST['leader_phone_number'];
    
    $team_leader_arr = array("first_name"=>$leader_first_name, "last_name"=>$leader_last_name, 
        "email"=>$leader_email, "phone_number"=>$leader_phone_number);
    
    $_SESSION['team_leader_data'] = $team_leader_arr;
    
}
if($action == 'member2'){
    $member2_first_name = $_POST['member2_first_name'];
    $member2_last_name = $_POST['member2_last_name'];
    $member2_email = $_POST['member2_email'];
    $member2_phone_number = $_POST['member2_phone_number'];
    
    $member2_arr = array("first_name"=>$member2_first_name, "last_name"=>$member2_last_name, 
        "email"=>$member2_email, "phone_number"=>$member2_phone_number);
    
    $_SESSION['member2_data'] = $member2_arr;
    
}
if($action == 'member3'){
    $member3_first_name = $_POST['member3_first_name'];
    $member3_last_name = $_POST['member3_last_name'];
    $member3_email = $_POST['member3_email'];
    $member3_phone_number = $_POST['member3_phone_number'];
    
    $member3_arr = array("first_name"=>$member3_first_name, "last_name"=>$member3_last_name, 
        "email"=>$member3_email, "phone_number"=>$member3_phone_number);
    
    $_SESSION['member3_data'] = $member3_arr;
    
}





?>