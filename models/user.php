<?php
require_once 'db_connection.php';
/**
 * User class for managing Spades data
 * @author Ibrar Ramzan <ibrarramzan@outlook.com>
 * @version 5.6.23
 * @copyright (c) 2017, Spades
 */
class User extends DB_Connection{
    private $first_name;
    private $last_name;
    private $phone_number;
    private $events;
    private $user_name;
    private $password;
    private $login_status;


    public function __construct() {
        $this->events = array();
    }
    
    public function __set($name, $value) {
        $method_name = "set_$name";
        if(!method_exists($this, $method_name)){
            throw new Exception("SET: Property $name does not exist");
        }
        $this->$method_name($value);
    }
    
    public function __get($name) {
        $method_name = "get_$name";
        if(!method_exists($this, $method_name)){
            throw new Exception("GET: Property $name does not exist");
        }
        return $this->$method_name();
    }
    
    private function set_userID($userID){
        if(!is_numeric($userID) || $userID <= 0){
            throw new Exception("Invalid/Missing User ID");
        }
        $this->userID = $userID;
    }
    private function get_userID(){
        return $this->userID;
    }

    private function set_first_name($first_name){
        $reg = "/^[a-z]+$/i";
        if(!preg_match($reg, $first_name)){
            throw new Exception("Invalid/Missing First Name");
        }
        $this->first_name = ucfirst(strtolower($first_name));
    }
    private function get_first_name(){
        return $this->first_name;
    }
    
    private function set_last_name($last_name){
        $reg = "/^[a-z]+$/i";
        if(!preg_match($reg, $last_name)){
            throw new Exception("Invalid/Missing Last Name");
        }
        $this->last_name = ucfirst(strtolower($last_name));
    }
    private function get_last_name(){
        return $this->last_name;
    }
    
    private function set_email($email){
        $reg = "/^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zAZ]\.)+[a-zA-Z]{2,4})$/";
        if(!preg_match($reg, $email)){
            throw new Exception("Invalid/Missing Email");
        }
        $this->email = $email;
    }
    private function get_email(){
        return $this->email;
    }
    
    private function set_phone_number($phone_number){
        if(!is_numeric($phone_number)){
            throw new Exception("Invalid/Missing Phone Number");
        }
        $this->phone_number = $phone_number;
    }
    private function get_phone_number(){
        return $this->phone_number;
    }
    
    private function set_events($events){       

        if(is_null($events)){        // if this array has no element.
                                        // check for User
            throw new Exception("Missing Event(s) option");
        }
        if(!is_array($events)){
                                        // check for Developer
            throw new Exception("Events must be an array");
        }
        $eOption = array("Event1", "Event2", "Event3","Event4", "Event5", 
            "Event6","Event7", "Event8", "Event9","Event10", "Event11", "Event12");
        
        foreach($events as $e){
            if(!in_array($e, $eOption)){
                                        // check against Hacker
                throw new Exception("Invalid Events Options");
            }
        }
        $c = 0;
        foreach($events as $e){
            $c = $c+1;
        }
        if(!($c==2 || $c==3)){
            throw new Exception("Min 2 and Max 3 Events Allowed");
        }
        $this->events = $events;
    }
    private function get_events(){
        return $this->events;
    }
    
    private function set_user_name($user_name){
        $this->user_name = $user_name;
    }
    private function get_user_name(){
        return $this->user_name;
    }
    
    private function set_password($password){
        $reg = "/^[a-z][a-z0-9]{5,15}$/i";
        if(!preg_match($reg, $password)){
            throw new Exception("Invalid/Missing Password");
        }
        $this->password = sha1($password);
    }

    private function get_password(){
        return $this->password;
    }
    
    
    public function signup(){
        
        $obj_db = $this->obj_db();
        
        $query_insert = "INSERT INTO `users` "
                . "("
                . "`userID`, `first_name`, `last_name`, "
                . "`phone_number`, `events`) "
                . "VALUES "
                . "(NULL, '$this->first_name', '$this->last_name', '$this->phone_number', '" . serialize($this->events) ."');";
        
        $obj_db->query($query_insert);
        if($obj_db->errno){
            throw new Exception("Signup DB Insert Error - $obj_db->errno - $obj_db->error");
        }
        
        $this->userID = $obj_db->insert_id;   
    }
    
    private function get_login(){ 
        return $this->login_status;
    }

    public function login(){
        $obj_db = $this->obj_db();
        $query_select = "select * from admins where `admin_user_name` = '$this->user_name' and `admin_password` = '$this->password'";
        $result = $obj_db->query($query_select);
        if($result->num_rows == 0){
            throw new Exception("Authentication Failed");
        } else{
            $this->login_status = TRUE;
            $_SESSION['logged_in'] = TRUE;
        }
        

    }
    
}



?>