<?php
class Pages extends Controller {
  public function __construct(){
  }

  public function index(){
    if(isLoggedIn()){
      redirect('posts');
    }
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

  public function packages(){

    $data = [
      'title' => 'Our Packages',
      'description' => 'All the packages we can supply'
    ];
    $this->view('pages/packages', $data);
  }

  public function portfolio(){

    $data = [
      'title' => 'Our Portfolio',
      'description' => 'A list of our portfolio, showcasing our latest sites'
    ];
    $this->view('pages/portfolio', $data);
  }

  public function contact_us(){

    $data = [
      'title' => 'Contact Us',
      'description' => 'Fill out the form below to contact us'
    ];
    $this->view('pages/contact_us', $data);
  }

}