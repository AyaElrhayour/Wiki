<?php

class TagDao extends crudDao
{

  private $tagEntity;

  public function __construct()
  {
    parent::__construct();
    $this->tablename = 'tags';
    $this->tagEntity = new Tag();
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

  public function insertTags($name)
  {
    $this->tagEntity->__set("name", $name);
    return $this->insert($this->tagEntity);
  }

  public function deleteTag($id)
  {
    $this->tagEntity->id = $id;
    return $this->delete($this->tagEntity);
  }

  public function searchForTags($column, $data)
  {
    return $this->search($column, $data);
  }
}
