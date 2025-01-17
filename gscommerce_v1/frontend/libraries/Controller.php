<?php
/*
  This is the base controller
  Loads rhe models and views
 */
class Controller {
  // load model
  public function model($model){
    // require the model file
    require_once '../frontend/models/' . $model . '.php';

    // instantiate the model
    return new $model();
  }

  // load the view
  public function view($view, $data =[]){
    //check for the view file
    if(file_exists('../frontend/views/' . $view . '.php')){
      require_once '../frontend/views/' . $view . '.php';
    } else {
      // view does not exist
      die('View does not exist');
    }
  }
}