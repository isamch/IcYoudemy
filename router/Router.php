<?php

namespace Router;

use MyApp\controllers\NotFoundController;
use MyApp\controllers\AuthController;
use MyApp\controllers\CoursesController;

class Router
{

  private $routes = [];

  // public function diplay(){
  //   return $this->routes;
  // }

  public function addrout($route, $routemethod)
  {

    $this->routes[$route] = $routemethod;
  }



  public function routecheck($route)
  {



    $route = str_replace('/Youdemy/public', '', $route);
    $route = str_replace('/Youdemy/public', '', $route);
    $route = str_replace('index.php/', '', $route);
    $route = str_replace('index.php', '', $route);
    $route = strtok($route, '?');



    echo 'rout in handler : ' . $route . " ";

    if (isset($this->routes[$route])) {

      $authobject = new AuthController;
      $coursesobject = new CoursesController;

      // check for post method :
      if (isset($_POST['register'])) {
        echo 'post register method';
        $authobject->register();
      }

      if (isset($_POST['login'])) {
        echo 'post Login method';
        $authobject->login();
      }


      if ($route == '/courses' || $route == '/dashboard') {
        // check methode get for pagination:
        echo 'get pagination method';
        $page = isset($_GET['page-nbr']) ? (int)$_GET['page-nbr'] : 1;
        $coursesobject->displayCourses($page, 6, $route);
      }


      call_user_func($this->routes[$route]);
    } else {
      echo 'page 404';
      $notfnd = new NotFoundController();
      $notfnd->notfound();
    }
  }
}
