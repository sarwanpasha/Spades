<?php
$action = $_POST['action'];
if($action == 'team_leader'){
//    echo("OK");
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $events = $_POST['events'];
    _check_username($first_name, $last_name, $phone_number, $events);
}
function _check_username($first_name, $last_name, $phone_number, $events){
    echo($first_name . "<br>");
    echo($last_name . "<br>");
    echo($phone_number . "<br>");
    echo($events . "<br>");
}



?>