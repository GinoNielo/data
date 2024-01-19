<?php

include 'databaseconnectie.php';
include 'navbar.php';

if (isset($_GET['id'])) {
  try {
   $db = new Database();
    $db->deleteUser($_GET['id']);
    header("Location:beheerder.php");
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }
} else {
  header("Location:beheerder.php");
}


?>

