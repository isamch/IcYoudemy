<?php


namespace MyApp\controllers;

class NotFoundController
{

  public function notfound() {


    $title = 'Page Not Found';
    include __DIR__ . '../../view/page404.php';


  }

}


