<?php


class DashboardController extends Controller{

  private $CategoryDao;
  private $TagDao;
  private $WikiDao;
  private $WikiTagDao;

  public function __construct(){
    $this->CategoryDao =$this->model('categoryDao');
    $this->TagDao =$this->model('tagDao');
    $this->WikiDao =$this->model('wikiDao');
    $this->WikiTagDao =$this->model('wiki_tagDao');
    
  }

  public function index(){
    $data = [
      'title' => 'Dashboard',
      'categories' => $this->CategoryDao->getAllCategories(),
      'tags' => $this->TagDao->getAllTags(), 
    ];
   
    $this->view('pages/index', $data);
  }


}
