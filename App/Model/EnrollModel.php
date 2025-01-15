<?php

namespace MyApp\Model;

use MyApp\Model\dbh;
use \PDO;



class EnrollModel
{

  private $conn;

  public function __construct()
  {
    $this->conn = new dbh();
  }

  // -- enroll :

  // INSERT INTO Enrollments (StudentID, CourseID) VALUES
  // (3, 4);
  
  // -- unenroll :
  // DELETE FROM `enrollments` WHERE StudentID = 3 AND CourseID = 4;
  
  public function enroll($StudentID, $CourseID) {
    
    $query = "INSERT INTO Enrollments (StudentID, CourseID) VALUES (:StudentID, :CourseID)";


    $stmt = $this->conn->Connection()->prepare($query);

    $stmt->bindParam(':StudentID', $StudentID);
    $stmt->bindParam(':CourseID', $CourseID);


    if ($stmt->execute()) {

      return True;
    }

    return false;


  }



  public function unEnroll($StudentID, $CourseID) {

    $query = "DELETE FROM Enrollments WHERE StudentID = :StudentID AND CourseID = :CourseID";


    $stmt = $this->conn->Connection()->prepare($query);

    $stmt->bindParam(':StudentID', $StudentID);
    $stmt->bindParam(':CourseID', $CourseID);


    if ($stmt->execute()) {

      return True;
    }

    return false;
    
  }



}