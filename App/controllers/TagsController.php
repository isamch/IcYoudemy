<?php

namespace MyApp\Controllers;

use MyApp\Model\Tags;
use MyApp\Model\CoursesTagsModel;

class TagsController
{



  public function addTag($tagName)
  {
    $tagModel = new Tags();

    $tag_id = $tagModel->gettagidbyname($tagName);

    if (!$tag_id) {
      $tag_id = $tagModel->inserttag($tagName);
    }

    return $tag_id;
  }



  public function linkTagToCourse($CourseID, $tag_id)
  {
    $postTagModel = new CoursesTagsModel();
    $postTagModel->insertPostTag($CourseID, $tag_id);
  }



  public function deleteTeagToCourse($CourseID)
  {
    $postTagModel = new CoursesTagsModel();
    $postTagModel->deleteCourseTagsModel($CourseID);
  }
  



}
