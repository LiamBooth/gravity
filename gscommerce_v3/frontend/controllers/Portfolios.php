<?php
class Portfolios extends Controller {
  public function __construct(){

    $this->portfolioModel = $this->model('Portfolio');
  }

  public function index(){
    // Get portfolio
    $portfolios = $this->portfolioModel->getPortfolios();

    $data = [
      'portfolios' => $portfolios
    ];

    $this->view('portfolios/index', $data);
  }

  public function show($id){
    $portfolio = $this->portfolioModel->getPortfolioById($id);
    $data = [
      'portfolios' => $portfolio,
    ];
    $this->view('portfolios/show', $data);
  }

}