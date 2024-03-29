<?php

class crudDao
{
  protected $db;
  protected $tablename;
  protected $All = ['*'];

  public function __construct()
  {
    $this->db = new Database();
  }


  protected function getAll()
  {
    $this->db->query("SELECT " . implode(', ', $this->All) . " FROM {$this->tablename}");
    $this->db->execute();
    return $this->db->resultSet();
  }

  protected function insert($entity)
  {
    $data = [];
    foreach ($entity as $property => $value) {
      if ($property != 'id') {
        $data[$property] = $value;
      }
    }

    $columns = implode(', ', array_keys($data));
    $values = ':' . implode(', :', array_keys($data));

    $this->db->query("INSERT INTO {$this->tablename} ($columns) VALUES ($values)");

    foreach ($data as $key => $value) {
      $this->db->bind(":$key", $value);
    }

    return $this->db->execute();
  }


  protected function update($entity, $data)
  {
    $columns = implode(', ', array_map(function ($column) {
      return "$column = :$column";
    }, array_keys($data)));

    $query = "UPDATE {$this->tablename} SET $columns WHERE id = :id";

    $this->db->query($query);

    foreach ($data as $key => $value) {
      $this->db->bind(":$key", $value);
    }
    $this->db->bind(':id', $entity->__get('id'));

    return $this->db->execute();
  }



  protected function delete($entity)
  {
    $this->db->query("DELETE FROM {$this->tablename} WHERE id = :id");
    $this->db->bind(':id', $entity->id);

    return $this->db->execute();
  }

  protected function getById($id)
  {
    $this->db->query("SELECT " . implode(', ', $this->All) . " FROM {$this->tablename} WHERE id = :id");
    $this->db->bind(':id', $id);

    $this->db->execute();
    return $this->db->single();
  }


  protected function search($column, $data)
  {

    $columns = implode(', ', array_keys($data));

    $this->db->query("SELECT " . $columns . " FROM {$this->tablename} WHERE {$column} LIKE :column");
    $this->db->bind(':column', '%' . $data[$column] . '%');

    return $this->db->execute();
  }
}
