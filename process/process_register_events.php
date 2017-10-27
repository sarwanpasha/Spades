<?php
session_start();
require_once '../models/user.php';
require_once '../functions/db_connection_func.php';

$obj_db = db_connection();

$obj_user = new User();
$errors = array();
        
try {
    $obj_user->events = isset($_POST['events']) ? $_POST['events'] : NULL;
} catch (Exception $ex) {
    $errors['events'] = $ex->getMessage();
}

if(count($errors) == 0){
    if(isset($_SESSION['errors'])){
        unset($_SESSION['errors']);
    }
    $_SESSION['events_data'] = $obj_user->events;   // session for events' array 
    header("Location:process_registration.php");
} else{
    $_SESSION['errors'] = $errors;
    $_SESSION['obj_user'] = serialize($obj_user);
    header("Location:../registration/register_events.php");
}
        
        
  /*      
if(isset($_SESSION['team_leader_data'])){
    $data = $_SESSION['team_leader_data'];
    echo("<pre>");
    print_r($data);
    echo("</pre>");
} else{
    echo("sorry Team leader");
}

if(isset($_SESSION['member2_data'])){
    $data2 = $_SESSION['member2_data'];
    echo("<pre>");
    print_r($data2);
    echo("</pre>");
} else{
    echo("sorry Member2");
}

if(isset($_SESSION['member3_data'])){
    $data3 = $_SESSION['member3_data'];
    echo("<pre>");
    print_r($data3);
    echo("</pre>");
} else{
    echo("sorry Member3");
}

header("Location:../registration/register_events.php");
   * 
   */

        




?>