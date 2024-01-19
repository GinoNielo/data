<?php
include 'databaseconnectie.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $pdo = new Database();
    $hash = password_hash($_POST["wachtwoord"], PASSWORD_DEFAULT);
    $pdo->editUser($_POST["gebruikersnaam"], $hash, $_GET['id']);
    header("Location: beheerder.php");
    //execute
} 
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>edit</h1>
<form method="POST">
<input type="text" name="gebruikersnaam">
<input type="text" name="wachtwoord">
<input type="submit">
    </form>

</body>
</html>