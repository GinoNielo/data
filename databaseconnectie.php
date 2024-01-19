<?php


class Database {
  public $pdo;
  private string $userTable = "beheerder";

  public function __construct(String $db="auto", String $host="localhost:3307", 
                              String $user="root", String $pass="") {
          $this->pdo = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
          $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  public function login($gebruikersnaam) {
    $stmt = $this->pdo->prepare("SELECT * FROM beheerder where gebruikersnaam = ?");
    $stmt->execute([$gebruikersnaam]);
    $result = $stmt->fetch();
    return $result;
}

public function loginUser($gebruikersnaam) {
  $stmt = $this->pdo->prepare("SELECT * FROM klanten where gebruikersnaam = ?");
  $stmt->execute([$gebruikersnaam]);
  $result = $stmt->fetch();
  return $result;
}

public function deleteUser(int $id) {
  $stmt = $this->pdo->prepare("DELETE from $this->userTable WHERE id = ?");
  $stmt->execute([$id]);
}
public function insertUser(string $gebruikersnaam, string $wachtwoord) {
  $stmt = $this->pdo->prepare("insert into $this->userTable values (null, ?, ?)");
  $stmt->execute([$gebruikersnaam, $wachtwoord]);
}
public function editUser(string $gebruikersnaam, string $wachtwoord, int $id) {
  $stmt = $this->pdo->prepare("UPDATE beheerder SET gebruikersnaam=?, wachtwoord=? where id =?");
  $stmt->execute([$gebruikersnaam, $wachtwoord, $id]);
}
public function selectAllUsers() {
  $stmt = $this->pdo->query("SELECT * from $this->userTable");
  $result = $stmt->fetchAll();
  return $result;
}

}



?>

