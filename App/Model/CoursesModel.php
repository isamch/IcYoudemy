<?php

namespace MyApp\Model;

use MyApp\Model\dbh;




class CoursesModel
{

  private $conn;

  public function __construct()
  {
    $this->conn = new dbh();
  }



  // display function as pagination:
  public function displayCourses($startindx, $page)
  {


    $row_per_page = ($page - 1) * $startindx;

    $query = "SELECT * FROM courses LIMIT :startindx , :row_per_page";
    $stmt = $this->conn->Connection()->prepare($query);
    $stmt->bindValue(':startindx', $startindx);
    $stmt->bindValue(':row_per_page', $row_per_page);
    $stmt->execute();
    return $stmt->fetchAll();
    
  }

  public function countCourses()
  {

    $query = "SELECT COUNT(*) as total FROM courses";
    $stmt = $this->conn->Connection()->prepare($query);
    return $stmt->fetch();
  }
}
