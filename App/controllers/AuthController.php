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
    $role = $_POST['role'];
 

    if (empty($username) || empty($email) || empty($password) || empty($role)) {
      $_SESSION['error'] = 'inputs vide!';
      header('Location: /Youdemy/public/index.php/register?empth=0');
      exit;
    }

    // dump($role);

    if ($role != "student" && $role != "teacher") {
      $_SESSION['error'] = 'select role!';
      header('Location: /Youdemy/public/index.php/register?select=0');
      exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $_SESSION['error'] = 'email invalide!';
      header('Location: /Youdemy/public/index.php/register?email=err');
      exit;
    }


    if (strlen($password) < 8) {
      header('Location: /Youdemy/public/index.php/register?pass=err');
      exit;
    }


    if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)/', $password)) {
      $_SESSION['error'] = 'password invalide!';
      header('Location: /Youdemy/public/index.php/register?pass=err');
      exit;
    }


    // after validation ;
    $authregister = new Auth();

    if ($authregister->registermodel($username, $email, $password, $role)) {
      
      header('Location: /Youdemy/public/index.php/login');
      exit;
    } else {


      $_SESSION['error'] = 'email exist!!';
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      exit;
    }
    
  }




  public function login()
  {

    
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
      $_SESSION['error'] = 'inputs vide!';
      header('Location: /Youdemy/public/index.php/login?empty=login');
      exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $_SESSION['error'] = 'email invalide!';
      header('Location: /Youdemy/public/index.php/login?email=err');
      exit;
    }


    if (strlen($password) < 8) {
      $_SESSION['error'] = 'password length!';
      header('Location: /Youdemy/public/index.php/login?pass=err8');
      exit;
    }

    if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)/', $password)) {
      $_SESSION['error'] = 'password invalide!';
      header('Location: /Youdemy/public/index.php/login?pass=err');
      exit;
    }


    
    // send data to model login :
    $authloging = new Auth();
    

    $result = $authloging->loginmodel($email, $password);


    if ($result) {
      

      if(password_verify($password, $result['Password']) || $password == $result['Password']){

        $_SESSION['user'] = $result;

        header('Location: /Youdemy/public/index.php/home');
        exit;

      }else{
        $_SESSION['error'] = 'password incorecct';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        // header('Location: /Youdemy/public/index.php/login');
        exit;
      }


    }else{
      $_SESSION['error'] = 'email not found';
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      // header('Location: /Youdemy/public/index.php/login');
      exit;
    }


  }



  public function logout()
  {
    session_start();

    // session_unset();
    $authloging = new Auth();
    $authloging->updateConnStatusToOffline($_SESSION['user']['Email']);

    unset($_SESSION['user']);

    session_destroy();

    header("Location: /Youdemy/public/index.php/login");
    exit();

  }



}
