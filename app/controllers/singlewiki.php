<?php 

class SingleWiki extends Controller{

  private $WikiDao;

  public function __construct()
  {
    $this->WikiDao = $this->model('wikiDao');
  }


  public function index($id)
  {
    $data = [
      'title' => 'Wiki',
      'wiki' => $this->WikiDao->getWikiById($id),
    ];

    $this->view('pages/wiki', $data);
  }
}