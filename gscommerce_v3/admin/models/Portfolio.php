<?php
class Portfolio {
  private $db;

  public function __construct(){
    $this->db = new Database;
  }

  public function getPortfolios(){
    $this->db->query('SELECT
                        id as portfolioId,
                        user_id as userID,
                        title as title,
                        body as body,
                        active as active,
                        deleted as deleted,
                        created_at as portfolioCreated
                        FROM portfolio
                        ORDER BY created_at DESC                       
                        ');

    $results = $this->db->resultSet();

    return $results;
  }

  public function addPortfolio($data){
    $this->db->query('INSERT INTO portfolio (title, user_id, body) VALUES(:title, :user_id, :body)');
    // Bind values
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':body', $data['body']);

    // Execute
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }
  public function updatePortfolio($data){
    $this->db->query('UPDATE portfolio SET title = :title, body = :body WHERE id = :id');
    // Bind values
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':body', $data['body']);

    // Execute
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }

  public function getPortfolioById($id){
    $this->db->query('SELECT * FROM portfolio WHERE id = :id');

    $this->db->bind(':id', $id);
    $row = $this->db->single();
    return $row;
  }
  public function deletePortfolio($id){
    $this->db->query('DELETE FROM portfolio WHERE id = :id');
    // Bind values
    $this->db->bind(':id', $id);

    // Execute
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }
}


