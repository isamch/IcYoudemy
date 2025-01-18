<?php

namespace MyApp\Model;

use MyApp\config\dbh;
use \PDO;



class Tags extends BaseModel
{

  private $conn;

  public function __construct()
  {
    $this->conn = new dbh();
  }




  public function displayAll()
  {
    $query = "SELECT * FROM tags;";

    $stmt = $this->conn->Connection()->query($query);
    return $stmt->fetchAll();
  }



  public function gettagidbyname($name)
  {
    $query = "SELECT Id FROM tags WHERE Name = :Name";
    $stmt = $this->conn->Connection()->prepare($query);
    $stmt->bindParam(':Name', $name);
    $stmt->execute();

    return $stmt->fetchColumn();
  }


  public function inserttag($name)
  {
    $query = "INSERT INTO tags (Name) VALUES (:Name)";
    $stmt = $this->conn->Connection()->prepare($query);
    $stmt->bindParam(':Name', $name);

    if ($stmt->execute()) {
      // $lastidtag = $this->gettagidbyname($name);
      $lastidtag = $this->conn->Connection()->lastInsertId();
      return $lastidtag;
    }

    return false;
  }

}
