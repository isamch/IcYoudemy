<?php


namespace MyApp\controllers;
use MyApp\controllers\SessionController;
use MyApp\controllers\coursesController;

class DashboardController
{
  
  public function dashboard() {


    SessionController::checksesession('user', 'login' , false);

    $controllcourses = new coursesController;

    

    
    $title = 'Youdemy | Dashboard';
    include __DIR__ . '../../view/dashboard.php';


  }


}


