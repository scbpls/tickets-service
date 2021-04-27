<?php
    session_start();

    if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['first_name']) && !empty($_POST['last_name'])) {
        $dbcon = mysqli_connect("localhost", "root", "", "serwis");

        $result = mysqli_query($dbcon, "SELECT COUNT(`login`) FROM `Users` WHERE `login` = '".$_POST['login']."';");
        
        if (mysqli_fetch_row($result)[0] != 0) {
            header("Location: ./register_form.php");
        } else {
            mysqli_query($dbcon, "INSERT INTO `Users` (`login`, `password`, `firstName`, `lastName`, `idRole`) VALUES ('".$_POST['login']."', '".password_hash($_POST['password'], PASSWORD_BCRYPT)."', '".ucfirst(strtolower($_POST['first_name']))."', '".ucfirst(strtolower($_POST['last_name']))."', 2);");
            $_SESSION['user'] = htmlspecialchars($_POST['login']);
            header("Location: ../index.php");
        }

        mysqli_close($dbcon);
    }
?>
