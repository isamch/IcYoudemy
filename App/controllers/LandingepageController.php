<?php


namespace MyApp\controllers;
use MyApp\controllers\SessionController;

class LandingepageController
{
  
  public function landingepage() {

    SessionController::checksesession('user', 'home');
    $title = 'Youdemy | Welcome';
    include __DIR__ . '../../view/landingpage.php';

  }


}


