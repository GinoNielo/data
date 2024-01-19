<?php

class Database {
  public $pdo;
  private string $tableName = "autos";

  public function __construct(String $db = "auto", String $host = "localhost:3307", String $user = "root", String $pass = "") {
    try {
      $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die("Connection failed: " . $e->getMessage());
    }
  }

  public function addCar($model, $prijs, $kenteken, $kleur, $jaar) {
    try {
      $stmt = $this->pdo->prepare("INSERT INTO $this->tableName (model, prijs, kenteken, kleur, jaar) VALUES (?, ?, ?, ?, ?)");
      $stmt->execute([$model, $prijs, $kenteken, $kleur, $jaar]);
      return true;
    } catch (PDOException $e) {
      // Handle the error, for example, log it or display a user-friendly message
      return false;
    }
  }
}

$db = new Database(); // Create an instance of the Database class

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $model = $_POST["model"];
  $prijs = $_POST["prijs"];
  $kenteken = $_POST["kenteken"];
  $kleur = $_POST["kleur"];
  $jaar = $_POST["jaar"];

  // Add car to the database
  if ($db->addCar($model, $prijs, $kenteken, $kleur, $jaar)) {
    echo "Car added successfully!";
  } else {
    echo "Error adding car.";
  }
}
?>
