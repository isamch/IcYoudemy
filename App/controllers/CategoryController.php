<?php


namespace MyApp\controllers;

use MyApp\Model\Category;

class CategoryController
{





  public function displayAllCategory()
  {

    $category = new Category();

    return $category->getallcategory();

  }


  // add category :

  // public function addcategory() {


  //   $categoryname = $_POST['nameaddcategory'];


  //   if (empty($categoryname)) {
  //     header('Location: /brief10/public/index.php/home?errorcategory=empty');
  //     exit;
  //   }

  //   if (!preg_match('/^[a-zA-Z\s]+$/', $categoryname)) { 
  //     header('Location: /brief10/public/index.php/home?errorcategory=2');
  //     exit;
  //   }


  //   $category = new Category();

  //   if ($category->insertcategory($categoryname)) {

  //     echo 'added category';

  //   } ; 

  // }


  // // update :
  // public function updatecategory()
  // {

  //   $categoryid = $_POST['idupdatecategory'];
  //   $categoryname = $_POST['nameupdatecategory'];


  //   if (empty($categoryname) && empty($categoryid)) {
  //     header('Location: /brief10/public/index.php/home?errorcategory=empty');
  //     exit;
  //   }

  //   if (!preg_match('/^[a-zA-Z\s]+$/', $categoryname)) {
  //     header('Location: /brief10/public/index.php/home?errorcategory=2');
  //     exit;
  //   }



  //   // call model update in category :


  //   $category = new Category();

  //   if ($category->updatecategorymodel($categoryid, $categoryname)) {
  //     header('Location: /brief10/public/index.php/dashboard?section=categorydashboard');
  //     echo 'added category';
  //   };
  // }






  // // delete postes :

  // public function deletecategory()
  // {
  //   $id = $_POST['iddeletecategory'];
  //   $categorymodel = new Category();

  //   if (!$categorymodel->deletecategorymodel($id)) {
  //     echo 'delete feild';
  //   }
  // }

  // // restore poste :
  // public function restorecategory()
  // {
  //   $id = $_POST['idrestorecategory'];
  //   $categorymodel = new Category();

  //   if (!$categorymodel->restorecategorymodel($id)) {
  //     echo 'restore feild';
  //   }
  // }



}
