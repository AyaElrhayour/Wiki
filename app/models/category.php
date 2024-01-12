<?php

class Category{

  private $id;
  private $name;
  private $image;
  

  public function __construct($id = null, $name = "" ,$image = "" )
  {
    $this->id = $id;
    $this->name = $name; 
    $this->image = $image;
  }
   
  public function __set($property, $value){
    $this->$property = $value;
  }
  public function __get($property){
    return $this->$property;
  }


}

