<?php
abstract class Web_Interface
{
    public static function load_events($events = NULL){
        $eOption = array("Event1", "Event2", "Event3","Event4", "Event5", 
            "Event6","Event7", "Event8", "Event9","Event10", "Event11", "Event12");
        $output = "";
        
        foreach ($eOption as $e){
            $output .= "$e <input type='checkbox' name='events[]' id='$e' value='$e'";
            
            if(in_array($e, $events)){
                $output .= " checked";
            }
            
            $output .= "> - ";
        }
        echo($output);
    }

}


?>
