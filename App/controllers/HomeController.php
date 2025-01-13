<?php


namespace MyApp\controllers;
use MyApp\controllers\SessionController;

class HomeController
{
  
  public function home() {

    SessionController::checksesession('user', 'login' , false);


    $title = 'Youdemy | Home';
    include __DIR__ . '../../view/home.php';


  }

  // private function includeview(){

  // }

}


