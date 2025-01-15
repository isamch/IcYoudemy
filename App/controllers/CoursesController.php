<?php


namespace MyApp\controllers;

use MyApp\controllers\SessionController;
use MyApp\controllers\TagsController;
use MyApp\Model\CoursesModel;
use MyApp\Model\Category;

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

    // $this->courses();
    $title = 'Youdemy | Courses';

    include __DIR__ . '../../view' . $pageinclude . '.php';
  }


  public function displayTopCourses()
  {

    $coursesModel = new CoursesModel();
    $coursesModel->displayTopCoursesModel();
  } 



  // add courses:
  public function addCourses()
  {

    // add-course-title
    // add-course-description
    // add-course-category -->
    // add-course-tags


    $CourseTitle = $_POST['add-course-title'];
    $CourseDescription = $_POST['add-course-description'];
    $CategoryId = $_POST['add-course-category'];
    $Tags = $_POST['add-course-tags'];
    $teacherID = $_SESSION['user']['Id'];

    if (empty($CourseTitle) || empty($CourseDescription) || empty($CategoryId) || empty($Tags)) {
      $_SESSION['error']['add_post'] = 'empth inputs';
      header('Location: /Youdemy/public/index.php/dashboard');
      exit;
    }


    if (!preg_match('/^[A-Za-z\s]+$/', $CourseTitle)) {
      $_SESSION['error']['add_post'] = 'CourseTitle inputs';
      header('Location: /Youdemy/public/index.php/dashboard');
      exit;
    }

    if (!preg_match('/^.{1,500}$/', $CourseDescription)) {
      $_SESSION['error']['add_post'] = 'CourseDescription inputs';
      header('Location: /Youdemy/public/index.php/dashboard');
      exit;
    }


    if (!preg_match('/^([a-zA-Z0-9@#]+( [a-zA-Z0-9@#]+)*)?$/', $Tags)) {
      $_SESSION['error']['add_post'] = 'Tags inputs';
      header('Location: /Youdemy/public/index.php/dashboard');
      exit;
    }


    if (!preg_match('/^\d+$/', $CategoryId)) {
      $_SESSION['error']['add_post'] = 'CategoryId inputs';
      header('Location: /Youdemy/public/index.php/dashboard');
      exit;
    }



    
    // courses :
    $coursesModel = new CoursesModel();
    $coursId = $coursesModel->addCoursesModel($CourseTitle, $CourseDescription, $CategoryId, $teacherID);

    if (!$coursId) {
      $_SESSION['error']['add_course'] = "can't insert course probleme data base";
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



    header('Location: /Youdemy/public/index.php/dashboard');
    exit;




  }



  // update courses:
  public function updateCourses()
  {


    // $CourseID = $valuecourses['CourseID'];
    // $TeacherName = $valuecourses['TeacherName'];
    // $CourseTitle = $valuecourses['CourseTitle'];
    // $CourseDescription = $valuecourses['CourseDescription'];
    // $CourseDate = $valuecourses['CourseDate'];
    // $Category = $valuecourses['Category'];
    // $tagsarrays = explode(",", $valuecourses['Tags']);
    // $tags = implode(" ", $tagsarrays);


    // <!-- update-course-id
    // update-course-title
    // update-course-description
    // update-course-category -->
    // update-course-tags

    $CourseID = $_POST['update-course-id'];
    $CourseTitle = $_POST['update-course-title'];
    $CourseDescription = $_POST['update-course-description'];
    $CategoryId = $_POST['update-course-category'];
    $Tags = $_POST['update-course-tags'];




    if (empty($CourseID) || empty($CourseTitle) || empty($CourseDescription) || empty($CategoryId) || empty($Tags)) {
      $_SESSION['error']['update_post'] = 'empth inputs';
      header('Location: /Youdemy/public/index.php/dashboard');
      exit;
    }

    if (!preg_match('/^\d+$/', $CourseID)) {
      $_SESSION['error']['update_post'] = 'CourseID inputs';
      header('Location: /Youdemy/public/index.php/dashboard');
      exit;
    }


    if (!preg_match('/^[A-Za-z\s]+$/', $CourseTitle)) {
      $_SESSION['error']['update_post'] = 'CourseTitle inputs';
      header('Location: /Youdemy/public/index.php/dashboard');
      exit;
    }

    if (!preg_match('/^.{1,500}$/', $CourseDescription)) {
      $_SESSION['error']['update_post'] = 'CourseDescription inputs';
      header('Location: /Youdemy/public/index.php/dashboard');
      exit;
    }


    if (!preg_match('/^([a-zA-Z0-9@#]+( [a-zA-Z0-9@#]+)*)?$/', $Tags)) {
      $_SESSION['error']['update_post'] = 'Tags inputs';
      header('Location: /Youdemy/public/index.php/dashboard');
      exit;
    }


    if (!preg_match('/^\d+$/', $CategoryId)) {
      $_SESSION['error']['update_post'] = 'CategoryId inputs';
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


    header('Location: /Youdemy/public/index.php/dashboard');
    exit;
  }




  // delete course :
  public function deleteCourse()
  {
    $CourseID = $_POST['delete-course-id'];

    $coursesModel = new CoursesModel();

    if (!$coursesModel->deleteCourseModel($CourseID)) {
      $_SESSION['error']['delete-course'] = "delete feild";
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

  }




}
