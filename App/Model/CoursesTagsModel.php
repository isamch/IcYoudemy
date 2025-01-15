<?php

namespace MyApp\Model;

use PDO;

class CoursesTagsModel
{


  private $conn;

  public function __construct()
  {
    $this->conn = new dbh();
  }



  public function insertPostTag($CourseID, $tag_id)
  {
    $query = "INSERT INTO coursetags (CourseID, TagID) VALUES (:CourseID, :TagID)";
    $stmt = $this->conn->Connection()->prepare($query);
    $stmt->bindParam(':CourseID', $CourseID);
    $stmt->bindParam(':TagID', $tag_id);
    $stmt->execute();
  }



  public function deleteCourseTagsModel($CourseID)
  {
    $query = "DELETE FROM coursetags WHERE CourseID = :CourseID";
    $stmt = $this->conn->Connection()->prepare($query);
    $stmt->bindParam(':CourseID', $CourseID);
    $stmt->execute();
  }



}
