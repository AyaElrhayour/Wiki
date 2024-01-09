<?php

session_start();
// unset($_SESSION['id']);
// unset($_SESSION['role']);

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

    $this->view('pages/register', $data);
  }

  public function signUp()
  {
    if (isset($_POST["signup"])) {
      $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
      $errors = array();
      $patternEmail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
      $patternName = '/^[a-zA-Z\s\'.-]+$/';
      $patternPassword = '/^.{8,}$/';

      $data = [
        "name" => $_POST["name"],
        "last_name" => $_POST["last_name"],
        "email" => $_POST["email"],
        "role" => $_POST["role"],
        "password" => $password,
      ];

      $result = $this->UserDao->insertUser($data);

      if (!preg_match($patternName, $data["name"])) {
        array_push($errors, "First name is not valid.");
      }

      if (!preg_match($patternName, $data["last_name"])) {
        array_push($errors, "Last name is not valid.");
      }

      if (!preg_match($patternEmail, $data["email"])) {
        array_push($errors, "Email is not valid.");
      }

      if (!preg_match($patternPassword, $_POST["password"])) {
        array_push($errors, "Password should be at least 8 characters");
      }

      if (count($errors) > 0) {
        foreach ($errors as $error) {
          echo '<div class="bg-red-500 rounded-xl text-white p-2 my-2">' . $error . '</div>';
        }
      } else {
        $result = $this->UserDao->insertUser($data);
        if ($result == false) {
          echo '<div class="bg-green-500 rounded-xl text-white p-2 my-2">Registration successful!</div>';
        } else {
          if (!$this->UserDao->getUserByEmail($data['email'])) {
            echo '<div class="bg-red-500 rounded-xl text-white p-2 my-2">Email already exists. Please choose a different email.</div>';
          } else {
            echo '<div class="bg-red-500 rounded-xl text-white p-2 my-2">Registration failed. Please try again later.</div>';
          }
        }
      }
    }

    $this->view('pages/register');
  }

  public function logIn()
  {

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
        array_push($errors, "Password should be at least 8 characters");
      }

      if (count($errors) > 0) {

        foreach ($errors as $error) {
          echo '<div class="bg-red-500 rounded-xl text-white p-2 my-2">' . $error . '</div>';
        }
      } else {

        $user = $this->UserDao->getUserByEmail($email);

        if ($user) {

          // die(print($user->role));
          $enteredPass = $user->password;
          // die("here");
          $role = $user->role;
          $_SESSION['role'] = $role;
          $_SESSION['email'] = $email;
          $_SESSION['id'] = $user->id;
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

    $this->view('pages/register');
  }

  private function redirectBasedOnRole($role)
  {
    if ($role === 'admin') {
      header('location:' . URLROOT . '/dashboard');
    } elseif ($role === 'user') {
      header('location:' . URLROOT . '/pages/home');
    }
  }
}
