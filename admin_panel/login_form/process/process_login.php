<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once '../../../models/user.php';

$obj_user = new User();
$errors = array();

try{
    $obj_user->user_name = $_POST['user_name'];
} catch (Exception $ex) {
    $errors['user_name'] = $ex->getMessage();
}

try{
    $obj_user->password = $_POST['password'];
} catch (Exception $ex) {
    $errors['password'] = $ex->getMessage();
}

//die;
if(count($errors) == 0){
    if(isset($_SESSION['errors'])){
        unset($_SESSION['errors']);
    }
    
    if(isset($_SESSION['msg'])){
        unset($_SESSION['msg']);
    }
    
    try {
        $obj_user->login();
        header("Location:../../administration.php");
        
    } catch (Exception $ex) {
        $_SESSION['msg'] = $ex->getMessage();
        header("Location:../index.php");
        
    }
    
} else{
    $_SESSION['errors'] = $errors;
    $_SESSION['login_failed'] = TRUE;
    header("Location:../index.php");
}


?>