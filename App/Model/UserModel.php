<?php

namespace MyApp\Model;


use MyApp\config\dbh;
use \PDO;

class UserModel
{


  private $conn;

  public function __construct()
  {
    $this->conn = new dbh();
  }




  // display users :
  public function displayUsersModel()
  {

    $query = "SELECT * 
              FROM users
              WHERE role != 'admin'
              ORDER BY `CreatedAt` DESC;";



    $stmt = $this->conn->Connection()->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
  }



  // update status user :
  public function activateStatusUsersModel($updateUserId) {

    $query = "UPDATE users SET accStatus = 'active' WHERE users.`Id` = :updateUserId;";

    $stmt = $this->conn->Connection()->prepare($query);
    $stmt->bindParam(':updateUserId', $updateUserId);

    if ($stmt->execute()) {
      return true;
    }
    return false;

  }

  
  // deactivate status user :
  public function deactivateStatusUsersModel($updateUserId) {

    $query = "UPDATE users SET accStatus = 'not active' WHERE users.`Id` = :updateUserId;";

    $stmt = $this->conn->Connection()->prepare($query);
    $stmt->bindParam(':updateUserId', $updateUserId);

    if ($stmt->execute()) {
      return true;
    }
    return false;

  }



  // get user account status:
  public function countUserAccountActive()
  {

    $query = "SELECT COUNT(users.`Id`) 
              FROM users
              WHERE users.`accStatus` = 'active';";


    $stmt = $this->conn->Connection()->query($query);
    return $stmt->fetchColumn();
  }



  // get user account teachers:
  public function countUserAccountTeachers()
  {

    $query = "SELECT COUNT(users.`Id`) 
              FROM users
              WHERE users.`Role` = 'teacher';";


    $stmt = $this->conn->Connection()->query($query);
    return $stmt->fetchColumn();
  }



  // get user account students:
  public function countUserAccountStudents()
  {

    $query = "SELECT COUNT(users.`Id`) 
    FROM users
    WHERE users.`Role` = 'student';";


    $stmt = $this->conn->Connection()->query($query);
    return $stmt->fetchColumn();
  }







}
