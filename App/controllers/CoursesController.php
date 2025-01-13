<?php


namespace MyApp\controllers;
use MyApp\controllers\SessionController;

class coursesController
{
  
  public function courses() {

    // SessionController::checksesession('user', 'login' , false);


    $title = 'Youdemy | Courses';
    include __DIR__ . '../../view/courses.php';


  }


}


