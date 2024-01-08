<?php

class Category{

  private $id;
  private $name;
  

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