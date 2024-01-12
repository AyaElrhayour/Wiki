<?php


class WikiDao extends crudDao
{

  private $wikiEntity;

  public function __construct()
  {
    parent::__construct();
    $this->tablename = 'wikis';
    $this->wikiEntity = new Wiki();
  }

  public function getAllWikis()
  {
    $this->db->query("SELECT * FROM wikis WHERE archived = 0");
    $this->db->execute();

    $array = [];
    $wikis = $this->db->resultSet();
    foreach ($wikis as $wiki) {
      $wikiEntity = new Wiki($wiki->id, $wiki->title, $wiki->content, $wiki->date, $wiki->image, $wiki->category_id, $wiki->user_id);
      $array[] = $wikiEntity;
    }
    return $array;
  }

  public function getWikisByCategory($category_id)
  {
    $this->db->query("SELECT * FROM wikis WHERE archived = 0 AND category_id = :category_id");
    $this->db->bind(':category_id', $category_id);
    $this->db->execute();

    $array = [];
    $wikis = $this->db->resultSet();
    foreach ($wikis as $wiki) {
      $wikiEntity = new Wiki($wiki->id, $wiki->title, $wiki->content, $wiki->date, $wiki->image, $wiki->category_id, $wiki->user_id);
      $array[] = $wikiEntity;
    }
    return $array;
  }

  public function getWikiById($id)
  {
    return $this->getById($id);
  }

  public function insertWikis($data)
  {
    $data = [
      "id" =>$this->wikiEntity->__get("id"),
      "title" =>$this->wikiEntity->__get("title"),
      "content" =>$this->wikiEntity->__get("content"),
      "date" =>$this->wikiEntity->__get("date"),
      "image" =>$this->wikiEntity->__get("image"),
      "category_id" =>$this->wikiEntity->__get("category_id"),
      "user_id" =>$this->wikiEntity->__get("user_id"),
    ];

    $this->insert($data);

  }

  public function getLastWiki()
  {
    $this->db->query("SELECT * FROM wikis LIMIT 1");
    $this->db->execute();
    return $this->db->single();
  }

  public function archiveWiki($id)
  {
    $query = "UPDATE {$this->tablename} SET archived = 1 WHERE id = :id ";
    $this->db->query($query);
    $this->db->bind(':id', $id);
    return $this->db->execute();
  }

  
}
