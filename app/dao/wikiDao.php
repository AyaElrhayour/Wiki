<?php


class WikiDao extends crudDao{

public function __construct()
{
  parent::__construct();
  $this->tablename= 'wikis';
}

public function getAllWikis(){
  return $this->getAll();
}

public function insertWikis($data){
  return $this->insert($data);
}

public function searchForWikis($column, $data){
  return $this->search($column, $data);
}

}

?>