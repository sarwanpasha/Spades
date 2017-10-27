<?php
session_start();

if(isset($_SESSION['logged_in'])){
    unset($_SESSION['logged_in']);
}
if(isset($login_status)){
    unset($login_status);
}

header("Location:../../administration.php");


?>