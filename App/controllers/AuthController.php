<?php


namespace MyApp\controllers;

use MyApp\Model\Auth;
use MyApp\controllers\SessionController;

class AuthController
{

  public function loginpage()
  {

    SessionController::checksesession('user', 'home');
    $title = 'Login | page';
    include __DIR__ . '../../view/login.php';

  }

  public function registerpage()
  {

    SessionController::checksesession('user', 'home');
    $title = 'Register | page';
    include __DIR__ . '../../view/register.php';

  }




  public function register()
  {

    $username = $_POST['full-name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($username) || empty($email) || empty($password)) {
      header('Location: /brief10/public/index.php/register');
      exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header('Location: /brief10/public/index.php/register');
      exit;
    }


    if (strlen($password) < 8) {
      header('Location: /brief10/public/index.php/register');
      exit;
    }

    if (!preg_match('/[A-Za-z]/', $password) || !preg_match('/[0-9]/', $password)) {
      header('Location: /brief10/public/index.php/register');
      exit;
    }


    // after validation ;
    $authregister = new Auth();

    if ($authregister->registermodel($username, $email, $password)) {
      
      header('Location: /brief10/public/index.php/login');
      exit;
    } else {


      $_SESSION['error'] = 'email exist';
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      exit;
    }
    
  }




  public function login()
  {

    
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
      header('Location: /brief10/public/index.php/login');
      exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header('Location: /brief10/public/index.php/login');
      exit;
    }


    if (strlen($password) < 8) {
      header('Location: /brief10/public/index.php/login');
      exit;
    }

    if (!preg_match('/[A-Za-z]/', $password) || !preg_match('/[0-9]/', $password)) {
      header('Location: /brief10/public/index.php/login');
      exit;
    }


    
    // send data to model login :
    $authloging = new Auth();
    

    $result = $authloging->loginmodel($email, $password);

    if ($result) {
      
      // dump($result);

      if(password_verify($password, $result['password']) || $password == $result['password']){
        $_SESSION['user'] = $result;
        header('Location: /brief10/public/index.php/home');
        exit;

      }else{
        $_SESSION['error'] = 'password incorecct';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        // header('Location: /brief10/public/index.php/login');
        exit;
      }


    }else{
      $_SESSION['error'] = 'email not incorecct';

      header('Location: ' . $_SERVER['HTTP_REFERER']);
      // header('Location: /brief10/public/index.php/login');
      exit;
    }


  }


  public function logout()
  {
    session_start();

    // session_unset();

    unset($_SESSION['user']);

    session_destroy();

    header("Location: /brief10/public/index.php/login");
    exit();

  }



}
