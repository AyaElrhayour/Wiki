<?php


class CategoryDao extends crudDao
{

  private $categoryEntity;

  public function __construct()
  {
    parent::__construct();
    $this->tablename = 'categories';
    $this->categoryEntity = new Category();
  }

  public function getAllCategories()
  {
    $array = [];
    $categories = $this->getAll();
    foreach ($categories as $category) {
      $categoryEntity = new Category($category->id, $category->name);
      $array[] = $categoryEntity;
    }
    return $array;
  }

  public function getCategoryById($id)
  {
    return $this->getById($id);
  }

  public function insertCategory($name)
  {
    $this->categoryEntity->__set("name", $name);
    return $this->insert($this->categoryEntity);
  }

  public function updateCategory($data)
  {
    $this->categoryEntity->__set("name", $data['name']);
    $this->categoryEntity->__set("id", $data['id']);
    $updateData = ['name' => $this->categoryEntity->__get('name')];

    return $this->update($this->categoryEntity, $updateData);
  }


  public function deleteCategory($id)
  {
    $this->categoryEntity->id = $id;
    return $this->delete($this->categoryEntity);
  }

  public function searchForCategory($column, $data)
  {
    return $this->search($column, $data);
  }
}
