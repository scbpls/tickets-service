<!DOCTYPE html>
<html lang="pl">
    <head>
        <link rel="stylesheet" href="./styles/tickets.css">
        <link rel="stylesheet" href="./styles/state_button.css">
    </head>
    <body>
        <div id="container_tickets">
            <h2>Twoje zgłoszenia</h2>
            <div id="tickets">
                <?php
                    $idUser = mysqli_query($dbcon, "SELECT `id` FROM `Users` WHERE `login` = '".$_SESSION['user']."';");

                    $results = mysqli_query($dbcon, "SELECT `title`, `idState`, `name`, DATE_FORMAT(`dateStart`, '%d.%m.%Y, %H:%i') AS `dateStart`, DATE_FORMAT(`dateUpdate`, '%d.%m.%Y, %H:%i') AS `dateUpdate` FROM `Users` INNER JOIN `Tickets` ON `Users`.`id` = `Tickets`.`idUser` INNER JOIN `States` ON `Tickets`.`idState` = `States`.`id` WHERE `Users`.`id` = '".mysqli_fetch_row($idUser)[0]."' ORDER BY `idState` ASC, `dateStart` DESC;");

                    while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                        echo
                        "<div class='ticket'>
                            <div class='ticket_details'>
                                <p style='font-size: 1.1em; font-weight: bold;'>".$row["title"]."</p>
                                <a id='update' href='#' tooltip='Ostatnia aktualizacja: ".$row["dateUpdate"]."'>
                                    <button class='state s".$row["idState"]."' style='cursor: help;' disabled></button>
                                </a>
                            </div>
                            <p style='font-size: 1em; margin-top: -5px; margin-bottom: 10px;'>".$row["dateStart"]."</p>
                        </div>";
                    }
                ?>
            </div>
        </div>
    </body>
</html>
