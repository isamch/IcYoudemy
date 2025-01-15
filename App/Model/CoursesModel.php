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


    $query = "SELECT
              courses.`Id` AS CourseID,
              courses.`Title` AS CourseTitle,
              courses.`Description` AS CourseDescription,
              courses.`CreatedAt` AS CourseDate,
              courses.`StatusDisplay` AS StatusDisplay,
              category.`Name` AS Category,
              GROUP_CONCAT(DISTINCT tags.`Name`) AS Tags,
              teacher.`Name` AS TeacherName,
              COUNT(DISTINCT students.`Id`) AS StudentCount,
              GROUP_CONCAT(DISTINCT students.`Name`) AS StudentNames
          FROM
              courses
              LEFT JOIN enrollments ON enrollments.`CourseID` = courses.`Id`
              LEFT JOIN users as students ON students.`Id` = enrollments.`StudentID`
              LEFT JOIN category ON `CategoryID` = category.`Id`
              LEFT JOIN coursetags ON courses.`Id` = coursetags.`CourseID`
              LEFT JOIN tags ON coursetags.`TagID` = tags.`Id`
              LEFT JOIN users as teacher ON teacher.`Id` = courses.`TeacherID`
          GROUP BY
              courses.`Id`,
              courses.`Title`
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







  public function displayTopCoursesModel()
  {





    $query = "SELECT
                  courses.`Id` AS CourseID,
                  courses.`Title` AS CourseTitle,
                  courses.`Description` AS CourseDescription,
                  courses.`CreatedAt` AS CourseDate,
                  category.`Name` AS Category,
                  GROUP_CONCAT(DISTINCT tags.`Name`) AS Tags,
                  teacher.`Name` AS TeacherName,
                  COUNT(DISTINCT students.`Id`) AS StudentCount,
                  GROUP_CONCAT(DISTINCT students.`Name`) AS StudentNames
              FROM
                  courses
                  INNER JOIN enrollments ON enrollments.`CourseID` = courses.`Id`
                  INNER JOIN users as students ON students.`Id` = enrollments.`StudentID`
                  LEFT JOIN category ON `CategoryID` = category.`Id`
                  LEFT JOIN coursetags ON courses.`Id` = coursetags.`CourseID`
                  LEFT JOIN tags ON coursetags.`TagID` = tags.`Id`
                  LEFT JOIN users as teacher ON teacher.`Id` = courses.`TeacherID`
              GROUP BY
                  courses.`Id`,
                  courses.`Title`
              ORDER BY 
                  StudentCount DESC
              LIMIT 0, 10";
  

    $stmt = $this->conn->Connection()->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();


  }

  // update courses:
  public function updateCoursesModel()
  {
    // $query = 


  }







}
