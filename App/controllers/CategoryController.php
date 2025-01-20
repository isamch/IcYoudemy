<?php


namespace MyApp\controllers;

use MyApp\Model\Category;

class CategoryController
{





  public function displayAllCategory()
  {

    $category = new Category();

    return $category->displayAll();

  }




  // add category :
  public function addcategory() {


    $categoryname = $_POST['name-add-category'];


    if (empty($categoryname)) {
      $_SESSION['error']['add_category'] = 'Add : empth inputs';
      header('Location: dashboard');
      exit;
    }

    if (!preg_match('/^[a-zA-Z\s]+$/', $categoryname)) { 
      $_SESSION['error']['add_category'] = 'Add : invalid inputs';
      header('Location: dashboard');
      exit;
    }


    $category = new Category();

    if ($category->insertcategory($categoryname)) {

      $_SESSION['success']['add_category'] = 'Add Success';
      header('Location: dashboard?section=categorydashboard');
      exit;
    } ; 

  }


  // update :
  public function updatecategory()
  {

    $categoryid = $_POST['id-update-category'];
    $categoryname = $_POST['name-update-category'];

    if (!preg_match('/^[a-zA-Z\s]+$/', $categoryname)) { 
      $_SESSION['error']['add_category'] = 'Add : invalid inputs';
      header('Location: dashboard');
      exit;
    }


    if (empty($categoryname) && empty($categoryid)) {
      $_SESSION['error']['update_category'] = 'update : empth inputs';
      header('Location: dashboard');
      exit;
    }

    if (!preg_match('/^[a-zA-Z\s]+$/', $categoryname)) {
      $_SESSION['error']['update_category'] = 'update : invalid inputs';
      header('Location: dashboard');
      exit;
    }
    $category = new Category();

    if ($category->updatecategorymodel($categoryid ,$categoryname)) {

      $_SESSION['success']['update_category'] = 'update Success';
      header('Location: dashboard?section=categorydashboard');
      exit;
    }; 
    

  }










}
