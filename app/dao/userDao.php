<?php


class UserDao extends crudDao
{

  public function __construct()
  {
    parent::__construct();
    $this->tablename = 'users';
  }


  public function insertUser($data)
  {
    if ($this->isEmailUnique($data['email'])) {
      return $this->insert($data);
    } else {
      return false;
    }
  }

  public function getUserByEmail($email)
  {
    $this->db->query("SELECT * FROM users WHERE email = :email");
    $this->db->bind(':email', $email);
    $this->db->execute();

    return $this->db->single();
  }

  private function isEmailUnique($email)
  {
    $existingUser = $this->getUserByEmail($email);
    return !$existingUser;
  }
}
