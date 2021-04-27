<?php
    session_start();
    
    require_once("./db.php");

    if (!empty($_POST['login']) && !empty($_POST['password'])) {
        if ($_POST['login'] == LOGIN) {
            if (password_verify($_POST['password'], PASSWORD)) {
                $_SESSION['user'] = htmlspecialchars($_POST['login']);
            }
        }
    }

    header("Location: ../index.php");
?>
