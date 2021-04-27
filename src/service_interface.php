<!DOCTYPE html>
<html lang="pl">
    <head>
        <link rel="stylesheet" href="./styles/service_interface.css">
        <link rel="stylesheet" href="./styles/state_button.css">
        <style>
            .s1:hover {
                background-color: #fd7e70;
            }
            .s2:hover {
                background-color: #fde78f;
            }
        </style>
    </head>
    <body>
        <div id="container_tickets">
            <h2>Zgłoszenia</h2>
            <div id="tickets">
                <?php
                    $idUser = mysqli_query($dbcon, "SELECT `id` FROM `Users` WHERE `login` = '".$_SESSION['user']."';");

                    $results = mysqli_query($dbcon, "SELECT `Tickets`.`id` AS `id`, `firstName`, `lastName`, `title`, `description`, DATE_FORMAT(`dateStart`, '%d.%m.%Y, %H:%i') AS `dateStart`, DATE_FORMAT(`dateUpdate`, '%d.%m.%Y, %H:%i') AS `dateUpdate`, `idState` FROM `Users` INNER JOIN `Tickets` ON `Users`.`id` = `Tickets`.`idUser` ORDER BY `idState` ASC, `dateStart` ASC;");

                    while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                        echo
                        "<div class='ticket'>
                            <div class='ticket_details'>
                                <p style='font-size: 1.1em;'>".$row["firstName"]." ".$row["lastName"]."</p>
                                <form action='./state.php' method='post'>
                                    <a id='update' href='#' tooltip='Ostatnia aktualizacja: ".$row["dateUpdate"]."'>";
                                    if ($row["idState"] == 3) {
                                        echo "<button class='state s".$row["idState"]."' style='cursor: help;' disabled></button>";
                                    } else {
                                        echo "<button class='state s".$row["idState"]."' style='cursor: pointer;' name='state' value='".$row["id"]."'></button>";
                                    }
                                    echo
                                    "</a>
                                </form>
                            </div>
                            <p style='font-size: 1em; margin-top: -5px; margin-bottom: 10px;'>".$row["dateStart"]."</p>
                            <p style='font-size: 1.1em; font-weight: bold;'>".$row["title"]."</p>
                            <p style='font-size: 1em;'>".$row["description"]."</p>
                        </div>";
                    }
                ?>
            </div>
        </div>
    </body>
</html>
