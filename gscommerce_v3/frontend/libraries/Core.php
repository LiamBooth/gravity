<?php
/*
  App core class
  creates the URL, and loads the core controller
  URL format will be - /controller/method/params
*/

class Core {
  protected $currentController = 'Pages';
  protected $currentMethod = 'Index';
  protected $params = [];

  public function __construct(){

    $url = $this->getUrl();

    // look in the controller for the first value
    if(file_exists('../frontend/controllers/' . ucwords($url[0]) . '.php')){
      // if file exists, set as controller
      $this->currentController = ucwords($url[0]); // overrides the default set in controller $currentController above as 'Pages'
      // unset the zero index
      unset($url[0]);
    }
    // require the controller
    require_once '../frontend/controllers/' . $this->currentController . '.php';
    // instantiate the controller
    $this->currentController = new $this->currentController;

    // check for second part of the URL
    if(isset($url[1])){
      // check to see if method exists in the controller
      if(method_exists($this->currentController, $url[1])){
        $this->currentMethod = $url[1];
        // unset the 1 index
        unset ($url[1]);
      }
    }

    //get params
    $this->params = $url ? array_values($url) : [];

    // call a callback with array of params
    call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
  }
  public function getUrl(){
    if(isset($_GET['url'])){
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }
}