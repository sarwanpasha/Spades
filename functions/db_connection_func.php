<?php
    function db_connection(){    // protected is for the sake of inheritance

        $host = "localhost";
        $user = "root";
        $password = "";
/*        $user = "spades";
        $password = "@@LUm$5o1";
 * 
 */
        $database = "spades";
        
        $obj_db = new mysqli();
        
        $obj_db->connect($host, $user, $password);
        if($obj_db->connect_errno){
//            throw new Exception("Signup DB Connect Error - $obj_db->connect_errno - $obj_db->connect_error");
            throw new Exception("DB Connect Error - $obj_db->connect_errno - $obj_db->connect_error"); // i think it should be DB Connect Error because
                // this function is not specifically used for Sign up rather for everything which needs a DB Connection
        }
        
        $obj_db->select_db($database);
        if($obj_db->errno){
//            throw new Exception("Signup DB Select Error - $obj_db->errno - $obj_db->error");
            throw new Exception("DB Select Error - $obj_db->errno - $obj_db->error");
        }
        
        return $obj_db;
    }


?>