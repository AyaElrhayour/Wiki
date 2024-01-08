<?php

class WikiTag{

  private $id;
  private $wiki_id;
  private $tag_id;

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