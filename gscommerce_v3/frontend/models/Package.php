<?php
class Package {
  private $db;

  public function __construct(){
    $this->db = new Database;
  }

  public function getPackages(){
    $this->db->query('SELECT
                        id as packageId,
                        user_id as userID,
                        title as title,
                        body as body,
                        active as active,
                        deleted as deleted,
                        created_at as packageCreated
                        FROM packages
                        ORDER BY created_at DESC                       
                        ');

    $results = $this->db->resultSet();

    return $results;
  }

  public function getPackageById($id){
    $this->db->query('SELECT * FROM packages WHERE id = :id');

    $this->db->bind(':id', $id);
    $row = $this->db->single();

    return $row;
  }

}


