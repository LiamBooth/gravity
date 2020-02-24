<?php
class Packages extends Controller {
  public function __construct(){

    $this->packageModel = $this->model('Package');
  }

  public function index(){
    // Get packages
    $packages = $this->packageModel->getPackages();

    $data = [
      'packages' => $packages
    ];

    $this->view('packages/index', $data);
  }

  public function show($id){
    $package = $this->packageModel->getPackageById($id);
    $data = [
      'packages' => $package,
    ];
    $this->view('packages/show', $data);
  }

}