<?php

namespace MyApp\Model;


use MyApp\Model\dbh;
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



  // // get user account status:
  // public function userAccountStatus($UserId)
  // {

  //   $query = "SELECT * 
  //             FROM users
  //             WHERE users.Id != 'admin'
  //             ORDER BY `CreatedAt` DESC;";

  //   $stmt = $this->conn->Connection()->prepare($query);
  //   $stmt->bindParam(':updateUserId', $UserId);

  //   if ($stmt->execute()) {
  //     return true;
  //   }
  //   return false;


  // }








}
