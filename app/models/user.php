<?php

class User{

  private $id;
  private $name;
  private $last_name;
  private $email;
  private $password;
  private $role;
  

  public function __construct()
  {
    
  }
   
  public function __set($property, $value){
    $this->$property = $value;
  }
  public function __get($property){
    return $this->$property;
  }


}

?>