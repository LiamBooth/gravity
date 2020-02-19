<?php
class Portfolios extends Controller {
  public function __construct(){
    if(!isLoggedIn()){
      redirect('users/login');
    }

    $this->portfolioModel = $this->model('Portfolio');
    $this->userModel = $this->model('User');
  }

  public function index(){
    // Get portfolio
    $portfolios = $this->portfolioModel->getPortfolios();

    $data = [
      'portfolios' => $portfolios
    ];

    $this->view('portfolios/index', $data);
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
        if($this->portfolioModel->addPortfolio($data)){
          flash('post_message', 'Portfolio Added');
          redirect('portfolios');
        } else {
          die('Something went wrong');
        }
      } else {
        // load in the view with the errors
        $this->view('portfolios/add', $data);
      }

    } else {
      $data = [
        'title' => '',
        'body' => ''
      ];
      $this->view('portfolios/add', $data);
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
        if($this->portfolioModel->updatePortfolio($data)){
          flash('post_message', 'Portfolio Updated');
          redirect('portfolios');
        } else {
          die('Something went wrong');
        }
      } else {
        // load in the view with the errors
        $this->view('portfolios/edit', $data);
      }

    } else {
      // get existing post from model
      $portfolio = $this->portfolioModel->getPortfolioById($id);
      // check user id
      if($portfolio->user_id != $_SESSION['user_id']){
        redirect('portfolios');
      }
      $data = [
        'id' => $id,
        'title' => $portfolio->title,
        'body' => $portfolio->body
      ];
      $this->view('portfolios/edit', $data);
    }
  }

  public function show($id){
    $portfolio = $this->portfolioModel->getPortfolioById($id);
    $user = $this->userModel->getUserById($portfolio->user_id);
    $data = [
      'portfolios' => $portfolio,
      'user' => $user
    ];
    $this->view('portfolios/show', $data);
  }
  public function delete($id){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // get existing portfolio from model
      $portfolio = $this->portfolioModel->getPortfolioById($id);
      // check user id
      if($portfolio->user_id != $_SESSION['user_id']){
        redirect('portfolios');
      }
      if($this->portfolioModel->deletePortfolio($id)){
        flash('post_message', 'Portfolio Removed');
        redirect('portfolios');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('portfolios');
    }
  }
}