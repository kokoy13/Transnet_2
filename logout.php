<?php
    session_start();

    session_unset();
    session_destroy();
    $_SESSION = [];

    setcookie('id','',time()-86400);
    setcookie('key','',time()-86400);

    header('Location: login.php');
?>