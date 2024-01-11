<?php


class Dashboard extends Controller
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
    $data = [
      'title' => 'Dashboard',
      'categories' => $this->CategoryDao->getAllCategories(),
      'tags' => $this->TagDao->getAllTags(),
    ];


    $this->view('pages/dashboard', $data);
  }


  public function addCategory()
  {
    $name = $_POST['name'];
    $this->CategoryDao->insertCategory($name);
    redirect("dashboard");
  }

  public function addTag()
  {
    $name = $_POST['name'];
    $this->TagDao->insertTags($name);
    redirect("dashboard");
  }

  public function modifyCategory()
  {
    $data = [
      'name' => $_POST['name'],
      "id" => $_POST['id']
    ];
    $this->CategoryDao->updateCategory($data);
    redirect("dashboard");
  }

  public function modifyTag()
  {
    $data = [
      'name' => $_POST['name'],
      "id" => $_POST['id']
    ];
    $this->TagDao->updateTag($data);
    redirect("dashboard");
  }

  public function deleteCategory()
  {
    $id = $_POST["id"];
    if ($this->CategoryDao->deleteCategory($id)) {
      redirect("dashboard");
    }
  }

  public function deleteTag()
  {
    $id = $_POST["id"];
    if ($this->TagDao->deleteTag($id)) {
      redirect("dashboard");
    }
  }
}
