<?php

namespace MyApp\Controllers;

use MyApp\Model\UserModel;

class UserController
{




  // display user :
  public function displayUsers()
  {

    $userModel = new UserModel();

    $users = $userModel->displayUsersModel();

    // count active user :
    $countActive = $userModel->countUserAccountActive();
    
    // count teacher :
    $countTeacher = $userModel->countUserAccountTeachers();
    // count students:
    $countStudents = $userModel->countUserAccountStudents();

    $title = 'Dashboard | Users';

    include __DIR__ . '../../view/dashboard.php';

  } 




  
  // update status user :
  public function activateStatusUsers()
  {

    $updateUserId = $_POST['activate-user-id'];

    $userModel = new UserModel();

    $userModel->activateStatusUsersModel($updateUserId);


  }


  
  // update status user :
  public function deactivateStatusUsers()
  {
    
    $updateUserId = $_POST['deactivate-user-id'];

    $userModel = new UserModel();

    $userModel->deactivateStatusUsersModel($updateUserId);



  }







}


