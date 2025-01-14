<?php


namespace MyApp\controllers;
use MyApp\controllers\SessionController;

class AboutController
{
  
  public function about() {

    // SessionController::checksesession('user', 'login' , false);

    $title = 'Youdemy | About';
    include __DIR__ . '../../view/about.php';


  }

  // private function includeview(){

  // }

}


