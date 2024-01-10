<?php

class Category{

  private $id;
  private $name;
  

  public function __construct($id = null, $name = "")
  {
    $this->id = $id;
    $this->name = $name; 
  }
   
  public function __set($property, $value){
    $this->$property = $value;
  }
  public function __get($property){
    return $this->$property;
  }


}

