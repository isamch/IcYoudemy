<?php

namespace MyApp\Model;

use MyApp\config\dbh;
use PDO;
// use MyApp\Model\BaseModel;



class CoursesModel extends BaseModel
{

  private $conn;

  public function __construct()
  {
    $this->conn = new dbh();
  }

  // display Courses:
  public function displayAll()
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
              courses.`Title`;";


    $stmt = $this->conn->Connection()->query($query);
    return $stmt->fetchAll();
  }


  public function activeCoursesModel()
  {
    $query = "SELECT COUNT(courses.`Id`) 
              FROM courses
              WHERE courses.`StatusDisplay` = 'active';";
              
    $stmt = $this->conn->Connection()->query($query);
    return $stmt->fetchColumn();
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

  // count courses for teacher :
  public function countCoursesTeacher($teacherID)
  {
    $query = "SELECT COUNT(*) as total FROM courses WHERE `TeacherID` = :TeacherID";
    $stmt = $this->conn->Connection()->prepare($query);

    $stmt->bindParam(':TeacherID', $teacherID, PDO::PARAM_INT);

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
                  courses.`StatusDisplay` AS StatusDisplay,
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




  // display pagination courses for teacher :
  public function displayCoursesTeacher($startindx, $row_per_page, $teacherID)
  {

    $query = "SELECT
                    courses.`Id` AS CourseID,
                    courses.`Title` AS CourseTitle,
                    courses.`Description` AS CourseDescription,
                    courses.`CreatedAt` AS CourseDate,
                    courses.`StatusDisplay` AS StatusDisplay,
                    category.`Name` AS Category,
                    GROUP_CONCAT(DISTINCT tags.`Name`) AS Tags,
                    teacher.`Id` AS TeacherID,
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
                WHERE TeacherID = :teacherID
                GROUP BY
                    courses.`Id`,
                    courses.`Title`
                LIMIT :startindx, :row_per_page;";



    $stmt = $this->conn->Connection()->prepare($query);
    $stmt->bindParam(':teacherID', $teacherID, PDO::PARAM_INT);
    $stmt->bindParam(':startindx', $startindx, PDO::PARAM_INT);
    $stmt->bindParam(':row_per_page', $row_per_page, PDO::PARAM_INT);


    $stmt->execute();
    return $stmt->fetchAll();
  }






  // display mycourses:
  public function mycoursesModel($studentName)
  {


    $query = "SELECT 
                  courses.`Id` AS CourseID,
                  courses.`Title` AS CourseTitle,
                  courses.`Description` AS CourseDescription,
                  courses.`CreatedAt` AS CourseDate,
                  courses.`StatusDisplay` AS StatusDisplay,
                  category.`Name` AS Category,
                  teacher.`Name` AS TeacherName,
                  GROUP_CONCAT(DISTINCT tags.`Name`) AS Tags,
                  students.`Id` AS studentID,
                  students.`Name` AS studentName,
                  (
                      SELECT COUNT(enrollments.`StudentID`)
                      FROM enrollments
                      WHERE enrollments.`CourseID` = courses.`Id`
                  ) AS StudentCount
              FROM
                  courses
                  INNER JOIN enrollments ON enrollments.`CourseID` = courses.`Id`
                  INNER JOIN users as students ON students.`Id` = enrollments.`StudentID`

                  INNER JOIN category ON `CategoryID` = category.`Id`
                  INNER JOIN coursetags ON courses.`Id` = coursetags.`CourseID`
                  INNER JOIN tags ON coursetags.`TagID` = tags.`Id`
                  INNER JOIN users as teacher ON teacher.`Id` = courses.`TeacherID`
              WHERE 
                  students.`Name` = :studentName
              GROUP BY
                  courses.`Id`,
                  courses.`Title`";


    $stmt = $this->conn->Connection()->prepare($query);
    $stmt->bindParam(':studentName', $studentName);

    $stmt->execute();

    return $stmt->fetchAll();
  }



  // add courses:
  public function addCoursesModel($CourseTitle, $CourseDescription, $CategoryId, $teacherID)
  {


    $query = "INSERT INTO courses (Title, Description, CategoryID, TeacherID) VALUES (:CourseTitle, :CourseDescription, :CategoryId, :teacherID)";


    $stmt = $this->conn->Connection()->prepare($query);
    $stmt->bindParam(':CourseTitle', $CourseTitle);
    $stmt->bindParam(':CourseDescription', $CourseDescription);
    $stmt->bindParam(':CategoryId', $CategoryId);
    $stmt->bindParam(':teacherID', $teacherID);

    if ($stmt->execute()) {

      $lastid = $this->conn->Connection()->lastInsertId();

      return $lastid;
    }

    return false;
  }



  // update courses:
  public function updateCoursesModel($CourseID, $CourseTitle, $CourseDescription, $CategoryId)
  {


    $query = "UPDATE courses 
              SET CategoryID = :CategoryID, Title = :Title, Description = :Description
              WHERE Id = :CourseID";


    $stmt = $this->conn->Connection()->prepare($query);
    $stmt->bindParam(':CourseID', $CourseID);
    $stmt->bindParam(':Title', $CourseTitle);
    $stmt->bindParam(':Description', $CourseDescription);
    $stmt->bindParam(':CategoryID', $CategoryId);

    if ($stmt->execute()) {

      return true;
    }

    return false;
  }




  // delete poste :
  public function deleteCourseModel($CourseID)
  {

    $query = "UPDATE courses SET StatusDisplay = 'not active' WHERE courses.Id = :CourseID";
    $stmt = $this->conn->Connection()->prepare($query);
    $stmt->bindParam(':CourseID', $CourseID);

    if ($stmt->execute()) {
      return true;
    }
    return false;
  }

  // delete poste :
  public function restoreCourseModel($CourseID)
  {

    $query = "UPDATE courses SET StatusDisplay = 'active' WHERE courses.Id = :CourseID";
    $stmt = $this->conn->Connection()->prepare($query);
    $stmt->bindParam(':CourseID', $CourseID);

    if ($stmt->execute()) {
      return true;
    }
    return false;
  }








  // search :
  public function searchmodel($keysearch)
  {

    $query = "SELECT
                  courses.`Id` AS CourseID,
                  courses.`Title` AS CourseTitle,
                  courses.`Description` AS CourseDescription,
                  courses.`CreatedAt` AS CourseDate,
                  courses.`StatusDisplay` AS StatusDisplay,
                  category.`Name` AS Category,
                  GROUP_CONCAT(tags.`Name`) AS Tags,
                  teacher.`Id` AS TeacherID,
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
              WHERE
                  courses.`StatusDisplay` = 'active'
              GROUP BY
                  courses.`Id`,
                  courses.`Title`
              HAVING
                  LOWER(courses.`Title`) LIKE :keysearch
                  OR LOWER(courses.`Description`) LIKE :keysearch
                  OR LOWER(category.`Name`) LIKE :keysearch
                  OR LOWER(teacher.`Name`) LIKE :keysearch
                  OR LOWER(GROUP_CONCAT(tags.`Name`)) LIKE :keysearch;";



    $stmt = $this->conn->Connection()->prepare($query);

    $searchwordsql = '%' . strtolower($keysearch) . '%';

    $stmt->bindParam(':keysearch', $searchwordsql);

    $stmt->execute();
    return $stmt->fetchAll();
  
  }


  // search by id :
  public function searchByIdmodel($CourseID)
  {

    $query = "SELECT
                  courses.`Id` AS CourseID,
                  courses.`Title` AS CourseTitle,
                  courses.`Description` AS CourseDescription,
                  courses.`CreatedAt` AS CourseDate,
                  courses.`StatusDisplay` AS StatusDisplay,
                  category.`Name` AS Category,
                  GROUP_CONCAT(tags.`Name`) AS Tags,
                  teacher.`Id` AS TeacherID,
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
              WHERE
                  courses.`StatusDisplay` = 'active'
                  and courses.`Id` = :CourseId
              GROUP BY
                  courses.`Id`,
                  courses.`Title`;";



    $stmt = $this->conn->Connection()->prepare($query);

    $stmt->bindParam(':CourseId', $CourseID);

    $stmt->execute();
    return $stmt->fetch();
  
  }


}
