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
    </head> 
    <body>
        <?php 
            session_start();
            
            if (empty($_SESSION['user'])) {
                header("Location: ./src/login_form.php");
            } else {
                header("Location: ./src/main.php");
            }
        ?>
    </body>
</html>
