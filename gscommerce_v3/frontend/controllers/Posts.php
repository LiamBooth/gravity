<?php
class Posts extends Controller {
  public function __construct(){
//    if(!isLoggedIn()){
//      redirect('users/login');
//    }

    $this->postModel = $this->model('Post');
  }

  public function index(){
    // Get posts
    $posts = $this->postModel->getPosts();
    $data = [
      'posts' => $posts
    ];

    $this->view('posts/index', $data);
  }
  public function show($id){
    $post = $this->postModel->getPostById($id);
    $data = [
      'post' => $post,
    ];
    $this->view('posts/show', $data);
  }
}