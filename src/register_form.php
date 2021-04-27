<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>Serwis &ndash; Rejestracja</title>
        <link rel="icon" type="image/png" href="./styles/images/logo.png">
        <meta charset="UTF-8">
        <meta name="description" content="Serwis firmowy">
        <meta name="author" content="Jakub Marciniak">
        <meta name="keywords" content="Serwis">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="noidnex, nofollow">
        <link rel="stylesheet" href="./styles/auth_form.css">
    </head>
    <body>
        <?php
            session_start();
            
            if (empty($_SESSION['user'])):
        ?>
        <div id="container">
            <div id="container_form">
                <h2>Rejestracja</h2>
                <form action="./register.php" method="post">
                    <input type="text" name="login" placeholder="Login" pattern="[a-zA-Z0-9_-]{1,40}" required/>
                    <input type="password" name="password" placeholder="Hasło" pattern="{3,60}" required/>
                    <input type="text" name="first_name" placeholder="Imię" pattern="[a-zA-ZAaĄąBbCcĆćDdEeĘęFfGgHhIiJjKkLlŁłMmNnŃńOoÓóPpRrSsŚśTtUuWwYyZzŹźŻż]{1,50}$" required/>
                    <input type="text" name="last_name" placeholder="Nazwisko" pattern="[a-zA-ZAaĄąBbCcĆćDdEeĘęFfGgHhIiJjKkLlŁłMmNnŃńOoÓóPpRrSsŚśTtUuWwYyZzŹźŻż\s-]{1,80}$" required/>
                    <input type="submit" value="Zarejestruj się"/>
                </form>
            </div>
            <div id="footer">
                <p>&copy; Copyright 2021, Jakub Marciniak 4c</p>
            </div>
        </div>
        <?php
            else:
                header("Location: ../index.php");
            endif;
        ?>
    </body>
</html>
