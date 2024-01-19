<?php
    include 'databaseconnectie.php';
    include 'navbar.php';

    try {
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $gebruikersnaam = htmlspecialchars($_POST['gebruikersnaam']);
        $db = new Database();
        $user = $db->login($gebruikersnaam);
         
        if ($user) {
            $wachtwoord = $_POST['password'];
            $verify = password_verify($wachtwoord, $user['wachtwoord']);
            if ($user && $wachtwoord == $verify) {
                session_start();
                $_SESSION['userId'] = $user['id'];
                $_SESSION['naam'] = $user['naam'];
                $_SESSION['role'] = $user['role'];
                header('Location:beheerder.php?ingelogd');
            } else {
                echo "incorrect gebruikersnaam or wachtwoord";
            }
        } else {
            echo "incorrect gebruikersnaam or wachtwoord";
        }
    }
    } catch (\Exception $e) {
        echo $e->getMessage();
    }

    ?>



    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>Document</title>
        <style>body{background-color: #333;} h1{color: white}</style>
    </head>
    <body>
    <br><br><br>
        <div class="d-flex flex-column align-items-center">
        <h1>Log in Admin</h1><br>
        <form method="POST">
        <div class="mb-3">
            <input type="text" name="gebruikersnaam" placeholder="gebruikersnaam" required>
        </div>
        <div class="mb-3">
            <input type="password" name="wachtwoord" placeholder="Password" required>
        </div>
            <input type="submit" class="btn btn-primary">
        </form>
        </div>
    </body>
    </html>




   

