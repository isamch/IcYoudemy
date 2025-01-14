<?php


namespace MyApp\controllers;
use MyApp\controllers\SessionController;

class DashboardController
{
  
  public function dashboard() {


    SessionController::checksesession('user', 'login' , false);

    $title = 'Youdemy | Dashboard';
    include __DIR__ . '../../view/dashboard.php';


  }


}


