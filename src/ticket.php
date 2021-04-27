<?php
    session_start();

    $dbcon = mysqli_connect("localhost", "root", "", "serwis");

    $idUser = mysqli_query($dbcon, "SELECT `id` FROM `Users` WHERE `login` = '".$_SESSION['user']."';");

    mysqli_query($dbcon, "INSERT INTO `Tickets` (`title`, `description`, `dateStart`, `dateUpdate`, `idState`, `idUser`) VALUES ('".$_POST['title']."', '".$_POST['description']."', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', 1, '".mysqli_fetch_row($idUser)[0]."');");

    mysqli_close($dbcon);

    header("Location: ./main.php");
?>
