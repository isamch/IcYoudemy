<?php


namespace MyApp\controllers;

use MyApp\controllers\SessionController;
use MyApp\controllers\TagsController;
use MyApp\Model\CoursesModel;
use MyApp\Model\Category;
use MyApp\Model\EnrollModel;

class coursesController
{

  public function courses()
  {

    // SessionController::checksesession('user', 'login' , false);

    $title = 'Youdemy | Courses';
    include __DIR__ . '../../view/courses.php';
  }



  // display function as pagination:
  public function displayCourses($page, $row_per_page, $pageinclude)
  {

    $startindx = ($page - 1) * $row_per_page;

    $coursesModel = new CoursesModel();

    $courses = $coursesModel->displayCourses($startindx, $row_per_page);

    $totalCourses = $coursesModel->countCourses();

    $totalPages = (int)ceil($totalCourses / $row_per_page);

    // display category:
    $categorymodel = new Category();
    $categorys = $categorymodel->getallcategory();


    // SessionController::checksesession('user', 'login' , false);

    $title = 'Youdemy | Courses';

    include __DIR__ . '../../view' . $pageinclude . '.php';
  }


  // display mycourses:
  public function mycourses()
  {

    $studentName = $_SESSION['user']['Name'];
    // mycoursesModel
    $coursesModel = new CoursesModel();
    $mycourses = $coursesModel->mycoursesModel($studentName);

    $title = 'Youdemy | MyCourses';

    include __DIR__ . '../../view/mycourses.php';
  }

  





  
  public function displayCoursesTeacher($page, $row_per_page)
  {

    $teacherID = $_SESSION['user']['Id'];

    $startindx = ($page - 1) * $row_per_page;
    $coursesModel = new CoursesModel();

    $courses = $coursesModel->displayCoursesTeacher($startindx, $row_per_page, $teacherID);

    $totalCourses = $coursesModel->countCoursesTeacher($teacherID);

    $totalPages = (int)ceil($totalCourses / $row_per_page);


    
    // display category:
    $categorymodel = new Category();
    $categorys = $categorymodel->getallcategory();


    SessionController::checksesession('user', 'login' , false);

    $title = 'Youdemy | Dashboard courses';

    include __DIR__ . '../../view/dashboard.php';


  }


  public function displayTopCourses()
  {

    $coursesModel = new CoursesModel();
    $coursesModel->displayTopCoursesModel();
  } 



  // add courses:
  public function addCourses()
  {



    $CourseTitle = $_POST['add-course-title'];
    $CourseDescription = $_POST['add-course-description'];
    $CategoryId = $_POST['add-course-category'];
    $Tags = $_POST['add-course-tags'];
    $teacherID = $_SESSION['user']['Id'];

    if (empty($CourseTitle) || empty($CourseDescription) || empty($CategoryId) || empty($Tags)) {
      $_SESSION['error']['add_post'] = 'Add : empth inputs';
      header('Location: /Youdemy/public/index.php/dashboard');
      exit;
    }


    if (!preg_match('/^[\w\s\-:,\'.!]+$/', $CourseTitle)) {
      $_SESSION['error']['add_post'] = 'Add : invalide CourseTitle inputs';
      header('Location: /Youdemy/public/index.php/dashboard');
      exit;
    }

    if (!preg_match('/^.{1,500}$/', $CourseDescription)) {
      $_SESSION['error']['add_post'] = 'Add : invalideCourseDescription inputs';
      header('Location: /Youdemy/public/index.php/dashboard');
      exit;
    }


    if (!preg_match('/^([a-zA-Z0-9@#]+( [a-zA-Z0-9@#]+)*)?$/', $Tags)) {
      $_SESSION['error']['add_post'] = 'Add : invalideTags inputs';
      header('Location: /Youdemy/public/index.php/dashboard');
      exit;
    }


    if (!preg_match('/^\d+$/', $CategoryId)) {
      $_SESSION['error']['add_post'] = 'Add : invalide CategoryId inputs';
      header('Location: /Youdemy/public/index.php/dashboard');
      exit;
    }



    
    // courses :
    $coursesModel = new CoursesModel();
    $coursId = $coursesModel->addCoursesModel($CourseTitle, $CourseDescription, $CategoryId, $teacherID);

    if (!$coursId) {
      $_SESSION['error']['add_course'] = "Add : can't insert course probleme data base";
      header('Location: /Youdemy/public/index.php/dashboard');
      exit;
    }

    // tags :
    $tagsController = new TagsController();


    $Tags = explode(" ", $Tags);

    foreach ($Tags as $tag) {

      $Tag_id = $tagsController->addTag(trim($tag));

      $tagsController->linkTagToCourse($coursId, $Tag_id);
    }

    $_SESSION['success']['add_post'] = 'course Add success';
    if (isset($_GET['page-nbr'])) {
      header('Location: /Youdemy/public/index.php/dashboard?page-nbr='.$_GET['page-nbr']);
      exit;
    }else{
      header('Location: /Youdemy/public/index.php/dashboard');
      exit;
    }


  }



  // update courses:
  public function updateCourses()
  {

    $CourseID = $_POST['update-course-id'];
    $CourseTitle = $_POST['update-course-title'];
    $CourseDescription = $_POST['update-course-description'];
    $CategoryId = $_POST['update-course-category'];
    $Tags = $_POST['update-course-tags'];




    if (empty($CourseID) || empty($CourseTitle) || empty($CourseDescription) || empty($CategoryId) || empty($Tags)) {
      $_SESSION['error']['update_post'] = 'update: empth inputs';
      header('Location: /Youdemy/public/index.php/dashboard');
      exit;
    }

    if (!preg_match('/^\d+$/', $CourseID)) {
      $_SESSION['error']['update_post'] = 'update:invalide CourseID inputs';
      header('Location: /Youdemy/public/index.php/dashboard');
      exit;
    }

    if (!preg_match('/^[\w\s\-:,\'.!]+$/', $CourseTitle)) {
      $_SESSION['error']['update_post'] = 'update:Invalid CourseTitle inputs';
      header('Location: /Youdemy/public/index.php/dashboard');
      exit;
    }

    if (!preg_match('/^.{1,500}$/', $CourseDescription)) {
      $_SESSION['error']['update_post'] = 'update: invalide CourseDescription inputs';
      header('Location: /Youdemy/public/index.php/dashboard');
      exit;
    }


    if (!preg_match('/^([a-zA-Z0-9@#]+( [a-zA-Z0-9@#]+)*)?$/', $Tags)) {
      $_SESSION['error']['update_post'] = 'update: invalide Tags inputs';
      header('Location: /Youdemy/public/index.php/dashboard');
      exit;
    }


    if (!preg_match('/^\d+$/', $CategoryId)) {
      $_SESSION['error']['update_post'] = 'update: invalide CategoryId inputs';
      header('Location: /Youdemy/public/index.php/dashboard');
      exit;
    }


    // courses :
    $coursesModel = new CoursesModel();
    $coursesModel->updateCoursesModel($CourseID, $CourseTitle, $CourseDescription, $CategoryId);



    // tags :
    $tagsController = new TagsController();

    // delete course from coursetag table:
    $tagsController->deleteTeagToCourse($CourseID);

    $Tags = explode(" ", $Tags);

    foreach ($Tags as $tag) {

      $Tag_id = $tagsController->addTag(trim($tag));

      $tagsController->linkTagToCourse($CourseID, $Tag_id);
    }


    $_SESSION['success']['update_post'] = 'course update success';
    if (isset($_GET['page-nbr'])) {
      header('Location: /Youdemy/public/index.php/dashboard?page-nbr='.$_GET['page-nbr']);
      exit;
    }else{
      header('Location: /Youdemy/public/index.php/dashboard');
      exit;
    }

  }




  // delete course :
  public function deleteCourse()
  {
    $CourseID = $_POST['delete-course-id'];

    $coursesModel = new CoursesModel();

    if (!$coursesModel->deleteCourseModel($CourseID)) {
      $_SESSION['error']['delete-course'] = "delete feild";
    }

    if (isset($_GET['page-nbr'])) {
      header('Location: /Youdemy/public/index.php/dashboard?page-nbr='.$_GET['page-nbr']);
      exit;
    }else{
      header('Location: /Youdemy/public/index.php/dashboard');
      exit;
    }

  }

  // restore poste :
  public function restoreCourse()
  {
    $CourseID = $_POST['restore-course-id'];

    $coursesModel = new CoursesModel();

    if (!$coursesModel->restoreCourseModel($CourseID)) {
      $_SESSION['error']['restore-course'] = "restore feild";
    }

    if (isset($_GET['page-nbr'])) {
      header('Location: /Youdemy/public/index.php/dashboard?page-nbr='.$_GET['page-nbr']);
      exit;
    }else{
      header('Location: /Youdemy/public/index.php/dashboard');
      exit;
    }
  }




  // enroll: relation with enroll model :
  public function enrollCourse(){
    $StudentID = $_SESSION['user']['Id'];
    $CourseID = $_GET['enroll-id'];

    $enroll = new EnrollModel();
    $enroll->enroll($StudentID, $CourseID);

  }

  public function unEnrollCourse(){
    
    $StudentID = $_SESSION['user']['Id'];
    $CourseID = $_GET['unenroll-id'];

    $enroll = new EnrollModel();
    $enroll->unEnroll($StudentID, $CourseID);

  }


}
