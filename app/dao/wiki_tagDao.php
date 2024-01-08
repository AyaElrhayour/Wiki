<?php

require_once(APPROOT . '/models/wiki_tag.php');

class WikiTagDao extends crudDao{

  public function __construct()
  {
    parent::__construct();
    $this->tablename= 'wiki_tag';
  }


}

?>