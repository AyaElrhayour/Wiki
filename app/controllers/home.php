<?php

class Home extends Controller
{

  private $CategoryDao;
  private $TagDao;
  private $WikiDao;
  private $WikiTagDao;

  public function __construct()
  {
    $this->CategoryDao = $this->model('categoryDao');
    $this->TagDao = $this->model('tagDao');
    $this->WikiDao = $this->model('wikiDao');
    $this->WikiTagDao = $this->model('wikitagDao');
  }

  public function index()
  {
    $wikis = $this->WikiDao->getAllWikis();
    if(isset($_POST["filterByName"])) {
      
    }
    $data = [
      'title' => 'Home',
      'categories' => $this->CategoryDao->getAllCategories(),
      'wikis' => $wikis,
    ];

    $this->view('pages/index', $data);
  }

  public function archivedWiki(){

    if(isset ($_POST['archive'])){
      $this->WikiDao->archiveWiki($_POST["id"]);
    }
    redirect('home');
  }

  public function filterWikiByCategory(){
    
  }
}
