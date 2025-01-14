<?php

namespace MyApp\Model;

use MyApp\Model\dbh;
use PDO;




class CoursesModel
{

  private $conn;

  public function __construct()
  {
    $this->conn = new dbh();
  }



  // display function as pagination:
  public function displayCourses($startindx, $row_per_page)
  {




    $query = "SELECT courses.`Id`, courses.`Title`,courses.`Description`, courses.`CreatedAt`, category.`Name` as category, GROUP_CONCAT(tags.`Name`) as tags, users.`Name` as teacherName
              FROM
                  courses
                  LEFT JOIN category ON `CategoryID` = category.`Id`
                  LEFT JOIN coursetags ON courses.`Id` = coursetags.`CourseID`
                  LEFT JOIN tags ON coursetags.`TagID` = tags.`Id`
                  LEFT JOIN users ON users.`Id` = courses.`TeacherID`
              GROUP BY
                  courses.`Id`
              LIMIT :startindx, :row_per_page;";

    $stmt = $this->conn->Connection()->prepare($query);
    $stmt->bindParam(':startindx', $startindx, PDO::PARAM_INT);
    $stmt->bindParam(':row_per_page', $row_per_page, PDO::PARAM_INT);


    $stmt->execute();
    return $stmt->fetchAll();
  }




  public function countCourses()
  {

    $query = "SELECT COUNT(*) as total FROM courses";
    $stmt = $this->conn->Connection()->prepare($query);
    $stmt->execute();
    return $stmt->fetchColumn();
    
  }



}
