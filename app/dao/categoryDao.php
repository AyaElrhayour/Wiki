<?php


class CategoryDao extends crudDao
{

  public function __construct()
  {
    parent::__construct();
    $this->tablename = 'categories';
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

  public function insertCategory($data)
  {
    return $this->insert($data);
  }

  public function deleteCategory($id)
  {
    return $this->delete($id);
  }

  public function getCategoryById($id)
  {
    return $this->getById($id);
  }

  public function searchForCategory($column, $data){
    return $this->search($column, $data);
  }

}
