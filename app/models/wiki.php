<?php

class Wiki{

  private $id;
  private $title;
  private $content;
  private $date;
  private $image;
  private $category_id;
  private $user_id;
  private $archived;

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