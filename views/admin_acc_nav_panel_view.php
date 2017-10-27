<ul class="nav nav-pills nav-stacked">

<?php
require_once '../models/db_connection.php';


$obj_db = DB_Connection::obj_db();
$query_select = "select * from admin_nav_panel";
$result = $obj_db->query($query_select);

while($data = mysqli_fetch_array($result)){
    $admin_nav_ID = $data['admin_nav_ID'];
    $text = $data['text'];
    $file_name = $data['file_name'];
    
    if(isset($_GET['admin_nav_ID'])){
        $navID = $_GET['admin_nav_ID'];
    
        echo("<li");

        if($navID == $admin_nav_ID){
            echo(" class='active'>");
        } else{
            echo(">");
        }

        echo("<a href='$file_name.php?navID=$header_right_nav_ID&admin_nav_ID=$admin_nav_ID'>$text</a>"
                . "</li>");
    } 
}


?>
</ul>        
