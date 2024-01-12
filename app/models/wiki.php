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

  public function __construct($id = null, $title = "",$content= "",$date ="" ,$image = "",$category_id ="" ,$user_id ="",$archived = null )
  {
    $this->id = $id;
    $this->title = $title; 
    $this->image = $image;
    $this->content = $content;
    $this->date = $date; 
    $this->category_id = $category_id;
    $this->user_id = $user_id;
    $this->archived = $archived;
  }
   
  public function __set($property, $value){
    $this->$property = $value;
  }
  public function __get($property){
    return $this->$property;
  }


}

?>