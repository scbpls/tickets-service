<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>Serwis</title>
        <link rel="icon" type="image/png" href="./styles/images/logo.png">
        <meta charset="UTF-8">
        <meta name="description" content="Serwis firmowy">
        <meta name="author" content="Jakub Marciniak">
        <meta name="keywords" content="Serwis">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="noidnex, nofollow">
        <link rel="stylesheet" href="./styles/main.css">
    </head>
    <body>
        <div id="container">
            <div id="container_header">
                <?php
                    session_start();

                    $dbcon = mysqli_connect("localhost", "root", "", "serwis");

                    echo "<h1>Witaj, ".$_SESSION['user']."!</h1>";
                ?>
                <a href='./logout.php'>
                    <button id="logout">Wyloguj się</button>
                </a>
            </div>
            <div id="container_content">
                <?php
                    $result = mysqli_query($dbcon, "SELECT `accessLevel` FROM `Users` INNER JOIN `Roles` ON `Users`.`idRole` = `Roles`.`id` WHERE `login` = '".$_SESSION['user']."';");

                    if (mysqli_fetch_row($result)[0] == 2) {
                        require_once("./service_interface.php");
                    } else {
                        require_once("./ticket_form.php");
                        require_once("./tickets.php");
                    }

                    mysqli_close($dbcon);
                ?>
            </div>
            <div id="footer">
                <p>&copy; Copyright 2021, Jakub Marciniak</p>
            </div>
        </div>
    </body>
</html>
