<?php
session_start();


class AddWiki extends Controller
{
  private $CategoryDao;
  private $TagDao;
  private $WikiTagDao;

  public function __construct()
  {
    $this->CategoryDao = $this->model('categoryDao');
    $this->TagDao = $this->model('tagDao');
    $this->WikiTagDao = $this->model('wikiTagDao');
  }


  public function index()
  {
    $data = [
      'title' => 'Add Wiki',
      'categories' => $this->CategoryDao->getAllCategories(),
      'tags' => $this->TagDao->getAllTags(),
    ];

    $this->view('pages/addWiki', $data);
  }

  public function addWiki()
  {
    $wikiData = [
      'title' => $_POST['title'],
      'content' => $_POST['content'],
      // 'date' => $_POST['date'],
      'image' =>  $_FILES['img']['name'],
      'category_id' => $_POST['category_id'],
      'user_id' => $_SESSION['id'],
      // 'archived' => $_POST['archived'],
    ];

    $tagIds = isset($_POST['tag_ids']) ? $_POST['tag_ids'] : [];
    die(print_r($tagIds));
    if ($this->WikiTagDao->insertWikiWithTags($wikiData, $tagIds)) {
      $file = $_FILES['img']['name'];
      $folder = './img/' . $file;
      $fileTmp = $_FILES['img']['tmp_name'];
      move_uploaded_file($fileTmp, $folder);
      redirect("home");
    }
  }
}
