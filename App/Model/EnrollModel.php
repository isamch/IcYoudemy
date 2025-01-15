<?php

namespace MyApp\Model;

use MyApp\Model\dbh;
use \PDO;



class EnrollModel
{

  private $conn;

  public function __construct()
  {
    $this->conn = new dbh();
  }







}