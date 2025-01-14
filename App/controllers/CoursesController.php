<?php


namespace MyApp\controllers;

use MyApp\controllers\SessionController;
use MyApp\Model\CoursesModel;

class coursesController
{

  public function courses()
  {

    // SessionController::checksesession('user', 'login' , false);
    
    $title = 'Youdemy | Courses';
    include __DIR__ . '../../view/courses.php';
  }



  // display function as pagination:
  public function displayCourses($page, $row_per_page, $pageinclude)
  {

    $startindx = ($page - 1) * $row_per_page;

    $coursesModel = new CoursesModel();

    $courses = $coursesModel->displayCourses($startindx, $row_per_page);
    
    $totalCourses = $coursesModel->countCourses();
    
    $totalPages = ceil($totalCourses / $row_per_page);


    // $this->courses();
    $title = 'Youdemy | Courses';

    include __DIR__ . '../../view' . $pageinclude . '.php';

  }


  public function displayTopCourses()
  {
    
    $coursesModel = new CoursesModel();
    $coursesModel->displayTopCoursesModel();


  }

}
