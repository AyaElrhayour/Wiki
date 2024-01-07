<?php

session_start();
unset($_SESSION['id']);
unset($_SESSION['role']);

class Users extends Controller
{

  private $UserDao;

  public function __construct()
  {
    $this->UserDao = $this->model('UserDao');
  }
  public function index()
  {
    $data = [
      'title' => 'Register',
    ];

    $this->view('pages/index', $data);
  }


  public function signUp(){

    if (isset($_POST["signup"])) {

      $Name = $_POST["name"];
      $lastName = $_POST["last_name"];
      $email = $_POST["email"];
      $role = $_POST["role"];
      $password = $_POST["password"];
      $repeat_password = $_POST["repeat-password"];

      $password_hash = password_hash($repeat_password, PASSWORD_DEFAULT);
      $errors = array();
      $patternEmail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
      $patternName = '/^[a-zA-Z\s\'.-]+$/';
      $patternPassword = '/^.{8,}$/';

      if (!preg_match($patternName, $Name, $lastName)) {
        array_push($errors, "Name is not valid.");
      }

      if (!preg_match($patternEmail, $email)) {
        array_push($errors, "Email is not valid.");
      }

      if (!preg_match($patternPassword, $password)) {
        array_push($errors, "Please use at least 4 characters");
      }

      if ($password !== $repeat_password) {
        array_push($errors, "The password does not match");
      }

      if (count($errors) > 0) {
        foreach ($errors as $error) {
          echo '<div class="bg-red-500 rounded-xl text-white p-2 my-2">' . $error . '</div>';
        }
      } else {

        $result = $this->UserDao->signup($Name, $lastName, $email, $password_hash, $role);
        if ($result) {
          echo '<div class="bg-green-500 rounded-xl text-white p-2 my-2">Registration successful!</div>';
        } else {
          echo '<div class="bg-red-500 rounded-xl text-white p-2 my-2">Registration failed. Please try again.</div>';
        }
      }
    }

    $this->view('pages/registration/register');
  }

  public function logIn(){
    if (isset($_POST["login"])) {
      $email = $_POST["email"];
      $password = $_POST["password"];

      $patternEmail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
      $patternPassword = '/^.{8,}$/';
      $errors = array();

      if (!preg_match($patternEmail, $email)) {
        array_push($errors, "Email is not valid.");
      }

      if (!preg_match($patternPassword, $password)) {
        array_push($errors, "Please use at least 4 characters");
      }

      if (count($errors) > 0) {
        foreach ($errors as $error) {
          echo '<div class="bg-red-500 rounded-xl text-white p-2 my-2">' . $error . '</div>';
        }
      } else {
        $Result = $this->UserDao->login($email);

        if ($Result &&  count($Result) > 0) {
          $user = $Result[0];
          $enteredPass = $user->getPassword();
          $role = $user->getRole();
          $_SESSION['role'] = $role;
          $_SESSION['email'] =  $email;
          $_SESSION['id'] = $user->getUser_id();
          if ($user && password_verify($password, $enteredPass)) {
            $this->redirectBasedOnRole($role);
          } else {
            echo '<div class="bg-red-500 rounded-xl text-white p-2 my-2">Password incorrect</div>';
          }
        } else {
          echo '<div class="bg-red-500 rounded-xl text-white p-2 my-2">User not found</div>';
        }
      }
    }

    $this->view('pages/Registration/register');
  }

  private function redirectBasedOnRole($role){
    switch ($role) {
      case 'admin':
        redirect('dashboard');
        echo '<script>window.location.replace(" ' . URLROOT . '/DashbordControler");</script>';
        break;
      case 'client':
        echo '<script>window.location.replace("/UserController.php");</script>';
        break;
      default:
        break;
    }
  }

  
}
?>