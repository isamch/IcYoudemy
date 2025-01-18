<?php

namespace MyApp\Model;

use MyApp\config\dbh;
use \PDO;



class EnrollModel
{

  private $conn;

  public function __construct()
  {
    $this->conn = new dbh();
  }

  
  // -- enroll :
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