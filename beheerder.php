<?php
include 'databaseconnectie.php';
include 'navbar.php';

session_start();

if (isset($_SESSION['userId'])) {
    echo "Ingelogd als: " . $_SESSION['userId'];
    echo "<br><a class='btn btn-danger' href=logout.php>Logout</a>";
} else {
    header("Location:login.php");
    exit();
}

try {
    $db = new Database();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $hash = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);
        $insertId = $db->insertUser($_POST['gebruikersnaam'], $hash);
        echo "Successfully added " . $insertId;
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    
</head>
<body><br><br><br>
<a class="btn btn-primary" href="auto-toevoegen.php">Toevoegen Auto</a>
    <br> <br><br>
    <h1>Toevoegen gebruiker</h1>

    <form method="POST">
        <input type="text" name="gebruikersnaam" placeholder="gebruikersnaam"> <br> 
        <input type="password" name="wachtwoord" placeholder="wachtwoord"> <br>
        <input type="submit" >
    </form>
    
    <br><br><br><br>
    <h1>Overzicht gebruiker</h1>

    <table class="table table-success table-striped">
        <tr>
            <th>id</th>
            <th>gebruikersnaam</th>
            <th>wachtwoord</th>
            <th colspan="2">Action</th>
        </tr>

        <?php
        $users = $db->selectAllUsers(); 
        if ($users) { 
            foreach ($users as $user) {?>
                <tr>
                    <td><?php echo $user['id'];?></td>
                    <td><?php echo $user['gebruikersnaam']?></td>
                    <td><?php echo $user['wachtwoord']?></td>
                    <td><a href="edit.php?id=<?php echo $user['id']; ?>">Edit</a></td>
                    <td><a href="delete-user.php?id=<?php echo $user['id']; ?>">Delete</a></td>
                </tr>
        <?php 
            }
        }
        ?>
    </table>


    

