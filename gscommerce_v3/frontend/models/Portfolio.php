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

  public function getPortfolioById($id){
    $this->db->query('SELECT * FROM portfolio WHERE id = :id');

    $this->db->bind(':id', $id);
    $row = $this->db->single();
    return $row;
  }

}


