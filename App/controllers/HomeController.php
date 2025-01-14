<?php


namespace MyApp\controllers;
use MyApp\controllers\SessionController;
use MyApp\Model\CoursesModel;


class HomeController
{
  
  public function home() {

    // SessionController::checksesession('user', 'login' , false);

    $coursesModel = new CoursesModel();
    $topcourses = $coursesModel->displayTopCoursesModel();

    
    $title = 'Youdemy | Home';
    include __DIR__ . '../../view/home.php';


  }

}


