<?php
session_start();
require_once '../models/user.php';

$obj_user = new User();
$errors = array();

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

//die;
if(count($errors) == 0){            // if there are 0 elements in $errors's array
    if(isset($_SESSION['errors'])){
        unset($_SESSION['errors']);
    }
    
    try {
        $obj_user->signup();
        $msg = "<font style='font-weight:bold; color:white;'>Congratulations $obj_user->first_name $obj_user->last_name</font>";
        $_SESSION['msg'] = $msg;
        
    } catch (Exception $ex) {
        $_SESSION['msg_err'] = $ex->getMessage();
    }
    
    echo("<pre>");
    print_r($obj_user->events);
    echo("</pre>");
    
    header("Location:../msg.php");
} else{
    $msg = "Error";
    $_SESSION['msg'] = $msg;
    $_SESSION['errors'] = $errors;
    $_SESSION['obj_user'] = serialize($obj_user);
    
//    die;
    header("Location:../registration/registration_form.php");
}


?>