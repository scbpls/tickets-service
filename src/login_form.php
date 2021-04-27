<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>Serwis &ndash; Logowanie</title>
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
                <h2>Logowanie</h2>
                <form action="./login.php" method="post">
                    <input type="text" name="login" placeholder="Login" required/>
                    <input type="password" name="password" placeholder="Hasło" required/>
                    <input type="submit" value="Zaloguj się"/>
                </form>
                <button id="register">
                    <a href="./register_form.php">Zarejestruj się</a>
                </button>
            </div>
            <div id="footer">
                <p>&copy; Copyright 2021, Jakub Marciniak 4c</p>
            </div>
        </div>
        <?php 
            else:
                header("Location: ./index.php");
            endif;
        ?>
    </body>
</html>
