<?php

class Wikis extends Controller{
  
  private $WikiDao;

  public function __construct()
  {
    $this->WikiDao = $this->model('wikiDao');
  }


  public function index($catgory_id)
  {
    $data = [
      'title' => 'Wikis',
      'wikis' => $this->WikiDao->getWikisByCategory($catgory_id),
    ];

    $this->view('pages/categories', $data);
  }
}