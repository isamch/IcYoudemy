<?php 

// echo 'start';

session_start();

// session_unset();

require_once '../vendor/autoload.php';

// use :
use Router\Router;
use Pub\Application;


// router class :
$router = new Router();

$routes = [
  // '/' => ['LandingepageController', 'landingepage'],
  '/' => ['HomeController', 'home'],
  '/home' => ['HomeController', 'home'],
  '/about' => ['AboutController', 'about'],
  '/courses' => ['CoursesController', 'courses'],
  '/mycourses' => ['CoursesController', 'mycourses'],
  // '/profile' => ['UserController', 'profile'],
  '/dashboard' => ['DashboardController', 'dashboard'],
  '/login' => ['AuthController', 'loginpage'],
  '/register' => ['AuthController', 'registerpage'],
  '/logout' =>['AuthController', 'logout']

];


foreach ($routes as $key => $values) {
  $values_1 = 'MyApp\\controllers\\'.$values[0];
  $router->addrout($key, [new $values_1(), $values[1]]);
}


// app :
$myapp = new Application();
$myapp->run($router);
