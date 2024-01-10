<?php

class TagDao extends crudDao
{

  public function __construct()
  {
    parent::__construct();
    $this->tablename = 'tags';
  }

  public function getAllTags()
  {
    $array = [];
    $tags = $this->getAll();
    foreach ($tags as $tag) {
      $tagEntity = new Tag($tag->id, $tag->name);
      $array[] = $tagEntity;
    }
    return $array;
  }

  public function insertTags($data)
  {
    return $this->insert($data);
  }

  public function deleteTags($id)
  {
    return $this->delete($id);
  }

  public function searchForTags($column, $data)
  {
    return $this->search($column, $data);
  }
}
