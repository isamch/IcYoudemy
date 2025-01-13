<?php

namespace MyApp\controllers;

class SessionController
{

  public static function checksesession($sesname, $redirectpage, $checkstatus = true)
  {

    if ($checkstatus && isset($_SESSION[$sesname])) {
      header("Location: /brief10/public/index.php/$redirectpage");
      exit;
    } elseif (!$checkstatus && !isset($_SESSION[$sesname])) {
      header("Location: /brief10/public/index.php/$redirectpage");
      exit;
    }
  }

  
  public static function sessionDeniedRole($sesname, $redirectpage, $role)
  {

    if (isset($_SESSION[$sesname]) && $_SESSION[$sesname]['roles'] == $role) {
      header("Location: /brief10/public/index.php/$redirectpage");
      exit;
    }
  }
  

}
