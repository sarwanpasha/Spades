<?php
require_once 'views/top.php';
?>
</head>
<body bgcolor="#e0e0e0">

<div id="full-page">

<?php
if(isset($_SESSION['msg_login'])){
    $msg = $_SESSION['msg_login'];
    unset($_SESSION['msg_login']);
    echo($msg);
}
if(isset($_SESSION['msg'])){
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
    echo("$msg<br><hr>");
}
if(isset($_SESSION['msg_email'])){
    $msg = $_SESSION['msg_email'];
    unset($_SESSION['msg_email']);
    echo("$msg<br><hr>");
}
if(isset($_SESSION['msg_err'])){
    $msg = $_SESSION['msg_err'];
    unset($_SESSION['msg_err']);
    echo("$msg<br><hr>");
}
?>
<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
        </div>
  

</body>
</html>
