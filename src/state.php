<?php
    $dbcon = mysqli_connect("localhost", "root", "", "serwis");

    $state = mysqli_query($dbcon, "SELECT `idState` FROM `Tickets` WHERE `id` = '".$_POST["state"]."';");

    mysqli_query($dbcon, "UPDATE `Tickets` SET `idState` = '".++mysqli_fetch_row($state)[0]."', `dateUpdate` = '".date('Y-m-d H:i:s')."' WHERE `id` = '".$_POST["state"]."';");

    header("Location: ./main.php");

    mysqli_close($dbcon);
?>
