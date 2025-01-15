<?php

namespace MyApp\Model;

use MyApp\Model\dbh;
use \PDO;



class Category
{

  private $conn;

  public function __construct()
  {
    $this->conn = new dbh();
  }


  public function getallcategory() {
    $query = "SELECT * FROM category;";

    $stmt = $this->conn->Connection()->query($query);
    return $stmt->fetchAll();

  }


  // public function insertcategory($categoryname) {


  //   $query = "INSERT INTO categories (name) VALUES (:categoryname)";
  //   $stmt = $this->conn->Connection()->prepare($query);
  //   $stmt->bindParam(':categoryname', $categoryname);
 
  //   if ($stmt->execute()) {
  //     return true;
  //   }else{
  //     return false;
  //   }



  // }


  // update :

  
  // public function updatecategorymodel($category_id ,$categoryname) {


  //   $query = "UPDATE categories SET name = :categoryname WHERE id = :id";
  //   $stmt = $this->conn->Connection()->prepare($query);
  //   $stmt->bindParam(':categoryname', $categoryname);
  //   $stmt->bindParam(':id', $category_id);
 
  //   if ($stmt->execute()) {
  //     return true;
  //   }else{
  //     return false;
  //   }


  // }



  

  // delete category :
  // public function deletecategorymodel($id){

  //   $query = "UPDATE categories SET deleted = 'off' WHERE categories.id = :categoryeid";
  //   $stmt = $this->conn->Connection()->prepare($query);
  //   $stmt->bindParam(':categoryeid', $id);

  //   if ($stmt->execute()) {
  //     return true;
  //   }
  //   return false;

  // }
  
  // restore category :
  // public function restorecategorymodel($id){

  //   $query = "UPDATE categories SET deleted = 'one' WHERE categories.id = :categoryeid";
  //   $stmt = $this->conn->Connection()->prepare($query);
  //   $stmt->bindParam(':categoryeid', $id);

  //   if ($stmt->execute()) {
  //     return true;
  //   }
  //   return false;

  // }




}

