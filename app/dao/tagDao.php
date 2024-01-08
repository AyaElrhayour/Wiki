<?php

class Tag extends crudDao{

  public function __construct()
  {
    parent::__construct();
    $this->tablename= 'tags';
  }
   
  public function getAllTags(){
    return $this->getAll();
  }

  public function insertTags($data){
    return $this->insert($data);
  }

  public function deleteTags($id){
    return $this->delete($id);
  }

  public function searchForTags($column, $data){
    return $this->search($column, $data);
  }



}

?>