<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Spades Admin Login</title>

<link href="styles.css" media="all" type="text/css" rel="stylesheet">

<script type="text/javascript" src="jquery-2.1.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
document.getElementById("user_name").focus();
});
</script>
</head>

<body background="website-background-wooden-image.jpg" style="background-size:cover; background-repeat:no-repeat;">
<br>
<br>
<br>

<div id="full_page">
	<div id="heading">Login</div>
        <?php
        echo("<br>");
        if(isset($_SESSION['msg'])){
            echo($_SESSION['msg']);
        }
        if(isset($_SESSION['errors'])){
           $errors = $_SESSION['errors']; 
        }
        ?>
    <br>
<br>

    
    <div id="form_container">
    	<form method="post" action="process/process_login.php">

		<div id="fields_container">
            <div class="field">
            
                <div class="left">
                    <input type="text" name="user_name" id="user_name" placeholder="User Name">
                </div>
                
                <div id="user_name_error" class="right error"></div>
            
            </div>

			<br><br><br>
                        
            <div class="field">
            
                <div class="left">
                    <input type="password" name="password" id="password" placeholder="Password">
                </div>
                
                <div id="password_error" class="right error">
                    <?php
                    if(isset($errors['password'])){
                        echo($errors['password']);
                    }
                    ?>
                </div>
            
            </div>

			<br><br><br><br><br>

                        
            <div class="field">
            
                <div class="left" style="color:#211401; font-weight:bold; right:100px; padding-top:23px;">
                </div>
                
                <div id="login" class="right" style="left:70px;">
                	<input type="submit" value="">
                </div>
            
            </div>

        <div>

        </form>

    </div>
    
</div>

</body>
</html>
