<?php
class Packages extends Controller {
  public function __construct(){
    if(!isLoggedIn()){
      redirect('admin/users/login');
    }

    $this->packageModel = $this->model('Package');
    $this->userModel = $this->model('User');
  }

  public function index(){
    // Get packages
    $packages = $this->packageModel->getPackages();

    $data = [
      'packages' => $packages
    ];

    $this->view('packages/index', $data);
  }

  public function add(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // sanitize POST array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'user_id' => $_SESSION['user_id'],
        'title_error' => '',
        'body_error' => ''
      ];

      // validate data
      if(empty($data['title'])){
        $data['title_error'] = 'Please enter a title';
      }
      if(empty($data['body'])){
        $data['body_error'] = 'Please enter your content';
      }

      // ensure no errors
      if(empty($data['title_error']) && empty($data['body_error'])){
        // validated
        if($this->packageModel->addPackage($data)){
          flash('post_message', 'Package Added');
          redirect('admin/packages');
        } else {
          die('Something went wrong');
        }
      } else {
        // load in the view with the errors
        $this->view('packages/add', $data);
      }

    } else {
      $data = [
        'title' => '',
        'body' => ''
      ];
      $this->view('packages/add', $data);
    }
  }

  public function edit($id){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // sanitize POST array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'id' => $id,
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'user_id' => $_SESSION['user_id'],
        'title_error' => '',
        'body_error' => ''
      ];

      // validate data
      if(empty($data['title'])){
        $data['title_error'] = 'Please enter a title';
      }
      if(empty($data['body'])){
        $data['body_error'] = 'Please enter your content';
      }

      // ensure no errors
      if(empty($data['title_error']) && empty($data['body_error'])){
        // validated
        if($this->packageModel->updatePackage($data)){
          flash('post_message', 'Package Updated');
          redirect('admin/packages');
        } else {
          die('Something went wrong');
        }
      } else {
        // load in the view with the errors
        $this->view('packages/edit', $data);
      }

    } else {
      // get existing package from model
      $package = $this->packageModel->getPackageById($id);
      $data = [
        'id' => $id,
        'title' => $package->title,
        'body' => $package->body
      ];
      $this->view('packages/edit', $data);
    }
  }

  public function show($id){
    $package = $this->packageModel->getPackageById($id);
    $data = [
      'packages' => $package,
    ];
    $this->view('packages/show', $data);
  }
  public function delete($id){
      // get existing package from model
      $package = $this->packageModel->getPackageById($id);

      if($this->packageModel->deletePackage($id)){
        flash('post_message', 'Package Removed');
        redirect('admin/packages');
      } else {
        die('Something went wrong');
      }
  }
}