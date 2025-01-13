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
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $this->conn->Connection()->prepare($query);
    $stmt->bindParam(':email', $email);

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      return true;
    }
    return false;
  }


  public function registermodel($username, $email, $password)
  {
    if ($this->checkemail($email)) {
      echo 'repet ';
      return false;
    }

    $passwordhash = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $this->conn->Connection()->prepare($query);

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $passwordhash);


    if ($stmt->execute()) {
      return true;
    
    } else {
      return false;
    }
  }



  public function loginmodel($email)
  {

    $stmt = $this->conn->Connection()->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();


    if ($stmt->rowCount() > 0) {
      return $stmt->fetch();
    } else {
      return false;
    }
  }
}
