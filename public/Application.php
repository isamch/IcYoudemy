<?php  

namespace Pub;

class Application
{

  public function run($router){
    
    $router->routecheck($_SERVER['REQUEST_URI']);
  }

}


?>