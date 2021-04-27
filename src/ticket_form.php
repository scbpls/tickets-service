<!DOCTYPE html>
<html lang="pl">
    <head>
        <link rel="stylesheet" href="./styles/ticket_form.css">
    </head>
    <body>
        <div id="container_form">
            <h2>Zgłoszenie</h2>
            <form action="./ticket.php" method="post">
                <input type="text" name="title" placeholder="Tytuł" pattern="[a-zA-Z0-9_-\s]{1,40}" required/>
                <textarea name="description" placeholder="Opis" required></textarea>
                <input type="submit" value="Wyślij zgłoszenie"/>
            </form>
        </div>
    </body>
</html>
