<?php
class Pages extends Controller
{

  private $categoryDao;
  public function __construct()
  {
    $this->categoryDao = $this->model("CategoryDao");
  }

  public function index()
  {
    $categories = $this->categoryDao->getAllCategories();
    $data = [
      'title' => 'TraversyMVC',
      'categories' => $categories,
    ];

    $this->view('pages/index', $data);
  }

  public function about()
  {
    $data = [
      'title' => 'About Us'
    ];

    $this->view('pages/about', $data);
  }
}
