<?php
/*
  This is the base controller
  Loads the models and views
 */
class Controller {
  // load model
  public function model($model){
    // require the model file
    require_once '../admin/models/' . $model . '.php';

    // instantiate the model
    return new $model();
  }

  // load the view
  public function view($view, $data =[]){
    //check for the view file
    if(file_exists('../admin/views/' . $view . '.php')){
      require_once '../admin/views/' . $view . '.php';
    } else {
      // view does not exist
      die('View does not exist');
    }
  }
}