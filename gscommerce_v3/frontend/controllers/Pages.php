<?php
class Pages extends Controller {
  public function __construct(){
  }

  public function index(){
    $data = [
      'title' => 'Gravity Sites',
      'description' => 'Perfect Web Design For Any Business'
    ];
    $this->view('pages/index', $data);
  }

  public function about(){

    $data = [
      'title' => 'About Us',
      'description' => 'App to share posts with other users'
    ];
    $this->view('pages/about', $data);
  }

  public function contact_us(){

    $data = [
      'title' => 'Contact Us',
      'description' => 'Fill out the form below to contact us'
    ];
    $this->view('pages/contact_us', $data);
  }

}