<?php
  // load config
  require_once 'config/config.php';
  // load helpers
  //require_once 'helpers/url_helper.php';
  //require_once 'helpers/session_helper.php';
  // load Libraries
  //  require_once 'libraries/Core.php';
  //  require_once 'libraries/Controller.php';
  //  require_once 'libraries/Database.php';

  // autoload core Libraries instead of having them all listed above, Class Name in the files however need to be named exactly like the file. So Controller.php needs to have the class named the same inside. So any new ones added will automatically be included.
  spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
  });