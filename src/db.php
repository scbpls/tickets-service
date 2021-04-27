<?php
    $dbcon = mysqli_connect("localhost", "root", "", "serwis");

    $result = mysqli_query($dbcon, "SELECT `login`, `password` FROM `Users` WHERE `login` = '".$_POST['login']."';");

    $row = mysqli_fetch_row($result);

    define("LOGIN", $row[0]);
    define("PASSWORD", $row[1]);
?>
