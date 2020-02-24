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
                        WHERE deleted = \'N\'
                        ORDER BY created_at DESC                       
                        ');

    $results = $this->db->resultSet();

    return $results;
  }

  public function addPackage($data){
    $this->db->query('INSERT INTO packages (title, user_id, body) VALUES(:title, :user_id, :body)');
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
  public function updatePackage($data){
    $this->db->query('UPDATE packages SET title = :title, body = :body WHERE id = :id');
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

  public function getPackageById($id){
    $this->db->query('SELECT * FROM packages WHERE id = :id');

    $this->db->bind(':id', $id);
    $row = $this->db->single();
    return $row;
  }
  public function deletePackage($id){
    $this->db->query('UPDATE packages SET deleted = \'Y\' WHERE id = :id');
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


