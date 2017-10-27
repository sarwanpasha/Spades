<?php
session_start();
/* ----- Database connection ----- */
        $host = "localhost";
        $user = "root";
//        $user = "spades";
//        $password = "@@LUm$5o1";
        $password = "";
        $database = "spades";
        
        $obj_db = new mysqli();
        
        $obj_db->connect($host, $user, $password);
        if($obj_db->connect_errno){
//            throw new Exception("Signup DB Connect Error - $obj_db->connect_errno - $obj_db->connect_error");
            die("DB Connect Error - $obj_db->connect_errno - $obj_db->connect_error"); // i think it should be DB Connect Error because
                // this function is not specifically used for Sign up rather for everything which needs a DB Connection
        }
        
        $obj_db->select_db($database);
        if($obj_db->errno){
//            throw new Exception("Signup DB Select Error - $obj_db->errno - $obj_db->error");
            die("DB Select Error - $obj_db->errno - $obj_db->error");
        }
        /*-------------------------------------------------------------*/

        require_once '../../models/user.php';

$obj_user = new User();
$errors = array();
/*
$action = $_POST['action'];
if($action == 'team_leader'){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $events = $_POST['events'];
}
 * 
 */

try {
    $obj_user->first_name = $_POST['first_name'];
} catch (Exception $ex) {
    $errors['first_name'] = $ex->getMessage();
}

try {
    $obj_user->last_name = $_POST['last_name'];
} catch (Exception $ex) {
    $errors['last_name'] = $ex->getMessage();
}

try{
    $obj_user->phone_number = $_POST['phone_number'];
} catch (Exception $ex) {
    $errors['phone_number'] = $ex->getMessage();
}

try {
    $obj_user->events = isset($_POST['events']) ? $_POST['events'] : NULL;
} catch (Exception $ex) {
    $errors['events'] = $ex->getMessage();
}

if(count($errors) == 0){            // if there are 0 elements in $errors's array
    if(isset($_SESSION['errors'])){
        unset($_SESSION['errors']);
    }
    
} else{
    $_SESSION['errors'] = $errors;
    $_SESSION['obj_user'] = serialize($obj_user);
}
        
/*        
        $query_insert = "insert into `users` (`userID`, `first_name`, `last_name`, `phone_number`, `events`) "
                . "values "
                . "(NULL, 'ZZZZZ', 'AAAA', 'FFFF', 'EEEEE')";
        
        $obj_db->query($query_insert);
        if($obj_db->errno){
            die("Query Insert Error - $obj_db->errno - $obj_db->error");
        }
 * 
 */




?>