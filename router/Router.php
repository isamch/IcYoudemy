<?php

namespace Router;

use MyApp\controllers\NotFoundController;
use MyApp\controllers\AuthController;
use MyApp\controllers\CoursesController;
use MyApp\Controllers\UserController;

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
      $usersobject = new UserController;

      // check for post method :
      if (isset($_POST['register'])) {
        echo 'post register method';
        $authobject->register();
      }

      if (isset($_POST['login'])) {
        echo 'post Login method';
        $authobject->login();
      }

      // update courses :
      if (isset($_POST['update-course'])) {
        echo 'post update method';
        $coursesobject->updateCourses();
      }

      // delete & restore courses :
      if (isset($_POST['delete-course'])) {
        echo 'post delete method';
        $coursesobject->deleteCourse();
      }

      if (isset($_POST['restore-course'])) {
        echo 'post restore method';
        $coursesobject->restoreCourse();
      }

      // add courses :
      if (isset($_POST['add-course'])) {
        echo 'post add method';
        $coursesobject->addCourses();
      }



      // check for get method enroll and unenroll:
      if (isset($_GET['enroll-id'])) {
        echo 'get enroll method';
        $coursesobject->enrollCourse();
      }

      if (isset($_GET['unenroll-id'])) {
        echo 'get unEnroll method';
        $coursesobject->unEnrollCourse();
      }



      // // update status user :
      // if (isset($_POST['activate-user'])) {
      //   echo 'post activate user method';
      //   $usersobject->activateStatusUsers();
      // }

      // if (isset($_POST['deactivate-user'])) {
      //   echo 'post deactivate user method';
      //   $usersobject->deactivateStatusUsers();
      // }


      
      // get method for users dashboard
      if (isset($_GET['section'])) {

        // update status user :
        if (isset($_POST['activate-user'])) {
          echo 'post activate user method';
          $usersobject->activateStatusUsers();
        }

        if (isset($_POST['deactivate-user'])) {
          echo 'post deactivate user method';
          $usersobject->deactivateStatusUsers();
        }





        if ($_GET['section'] == 'userdashboard') {
          echo 'get users method';
          $usersobject->displayUsers();
        }

        if ($_GET['section'] == 'categorydashboard') {
          echo 'get category method';
          // $usersobject->displayCategory();
        }
      }



      if ($route == '/courses' || $route == '/dashboard') {
        // check methode get for pagination:
        echo 'get pagination method';
        $row_per_page = 6;
        $page = isset($_GET['page-nbr']) ? (int)$_GET['page-nbr'] : 1;
        if ($route == '/dashboard' && $_SESSION['user']['Role'] == 'teacher') {
          $coursesobject->displayCoursesTeacher($page, $row_per_page);
        } else {
          $coursesobject->displayCourses($page, $row_per_page, $route);
        }
      }


      call_user_func($this->routes[$route]);
    } else {
      echo 'page 404';
      $notfnd = new NotFoundController();
      $notfnd->notfound();
    }
  }
}
