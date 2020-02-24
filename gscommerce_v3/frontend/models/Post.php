<?php
class Post {
  private $db;

  public function __construct(){
    $this->db = new Database;
  }

  public function getPosts(){
    $this->db->query('SELECT
                        id as postId,
                        user_id as userID,
                        title as title,
                        body as body,
                        active as active,
                        deleted as deleted,
                        created_at as postCreated
                        FROM posts
                        ORDER BY created_at DESC                       
                        ');

    $results = $this->db->resultSet();

    return $results;
  }

  public function getPostById($id){
    $this->db->query('SELECT * FROM posts WHERE id = :id');

    $this->db->bind(':id', $id);
    $row = $this->db->single();
    return $row;
  }

}


