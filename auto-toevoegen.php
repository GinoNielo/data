<?php
include 'databaseconnectie.php';
session_start();

if (isset($_SESSION['userId'])) {
    echo "Ingelogd als: " . $_SESSION['userId'];
    echo "<br><a href=logout.php>Logout</a>";
} else {
    header("Location:login.php");
    exit();
}


?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    

</head>
<body>
    <div class="container">
        <h2 class="mt-4 mb-4">Add Product</h2>
        <form method="post">
            <div class="mb-3">
                <label for="model" class="form-label">Model:</label>
                <input type="text" class="form-control" name="model" required>
            </div>

            <div class="mb-3">
                <label for="prijs" class="form-label">prijs:</label>
                <input type="text" class="form-control" name="prijs" required>
            </div>


            <div class="mb-3">
                <label for="kenteken" class="form-label">Kenteken:</label>
                <input type="text" class="form-control" name="kenteken" required>
            </div>

            <div class="mb-3">
                <label for="kleur" class="form-label">Kleur:</label>
                <input type="text" class="form-control" name="kleur" required>
            </div>

            <div class="mb-3">
                <label for="jaar" class="form-label">Jaar:</label>
                <input type="text" class="form-control" name="jaar" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>





</body>
</html>




