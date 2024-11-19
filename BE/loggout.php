<?php 
    session_start();
    if (isset($_POST["btn-exit"])){
        session_destroy();
        header("Location: index.php");
    }
?>