<?php

class WikiTagDao extends crudDao
{

  public function __construct()
  {
    parent::__construct();
    $this->tablename = 'wiki_tag';
  }
}
