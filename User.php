<?php
class User{
  static function addUser(){
    $mysqli = mysqli_connect("localhost", "reez74_tech", "WrdT&V2K", "reez74_tech");
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = mb_strtolower(trim($_POST['email']));
    $pass = trim($_POST['pass']);
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $result = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email'");
    if ($result->num_rows){
      echo "exist";
    }else{
      $mysqli->query("INSERT INTO `users`(`name`, `lastname`, `email`, `pass`) VALUES ('$name','$lastname','$email','$pass')");
      echo "success";
    }
  }  
  
  static function authUser(){
    $mysqli = new mysqli("localhost", "reez74_tech", "WrdT&V2K", "reez74_tech");
    $email = mb_strtolower(trim($_POST['email']));
    $pass = trim($_POST['pass']);
    $result = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email'");
    $row = $result->fetch_assoc();
    if (password_verify($pass,$row['pass'])){
      $_SESSION["name"] = $row["name"];
      $_SESSION["lastname"] = $row["lastname"];
      $_SESSION["email"] = $row["email"];
      $_SESSION["id"] = $row["id"];
      echo "success";
    }else{
      echo "error";
    }
  }

  static function changeUserData(){
    $mysqli = new mysqli("localhost", "reez74_tech", "WrdT&V2K", "reez74_tech");
    $value = $_POST['value'];
    $item = $_POST['item'];
    $userId = $_SESSION['id'];
    $mysqli->query("UPDATE `users` SET `$item`='$value' WHERE `id` = '$userId'");
    $_SESSION[$item] = $value;
  }
}
?>
