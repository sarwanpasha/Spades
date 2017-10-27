<?php
session_start();
require_once '../functions/db_connection_func.php';

$obj_db = db_connection();
        
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

        




?>