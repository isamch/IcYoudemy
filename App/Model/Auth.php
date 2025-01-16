<?php

namespace MyApp\Model;

use MyApp\Model\dbh;



class Auth
{

  private $conn;

  public function __construct()
  {
    $this->conn = new dbh();
  }

  private function checkemail($email)
  {
    $query = "SELECT * FROM users WHERE Email = :email";
    $stmt = $this->conn->Connection()->prepare($query);
    $stmt->bindParam(':email', $email);

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      return true;
    }
    return false;
  }


  public function registermodel($username, $email, $password, $role)
  {
    if ($this->checkemail($email)) {
      echo 'repet ';
      return false;
    }

    $passwordhash = password_hash($password, PASSWORD_DEFAULT);


    $query = "INSERT INTO users (Name, Email, Password, Role) VALUES (:username, :email, :password, :role)";
    $stmt = $this->conn->Connection()->prepare($query);

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $passwordhash);
    $stmt->bindParam(':role', $role);


    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }



  public function loginmodel($email)
  {

    $stmt = $this->conn->Connection()->prepare("SELECT * FROM users WHERE Email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();


    if ($stmt->rowCount() > 0) {
      $this->updateConnStatusToOnline($email);
      return $stmt->fetch();
    } else {
      return false;
    }
  }

  
  public function updateConnStatusToOnline($email){
    $stmt = $this->conn->Connection()->prepare("UPDATE users SET connectStatus = 'online' WHERE Email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

  }


  public function updateConnStatusToOffline($email){
    $stmt = $this->conn->Connection()->prepare("UPDATE users SET connectStatus = 'offline' WHERE Email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

  }

  


}
