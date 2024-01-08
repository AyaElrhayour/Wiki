<?php


class UserDao extends crudDao{

  public function __construct()
  {
    parent::__construct();
    $this->tablename = 'users';
  }
   
  public function insertUser($data){
    return $this->insert($data);
  }

  public function getUserByEmail($email){

    $this->db->query("SELECT" .implode(',', $this->All) . "FROM USERS WHERE email LIKE = :email");
    $this->db->bind(':email' , $email); 
  }


}

?>