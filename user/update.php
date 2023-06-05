<?php
require '../DB.php';
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];


if ($method == 'POST') {
   if ($_POST['id']) {
      $use = ['name' => $_POST['name'] ?? '', 'email' => $_POST['email'] ?? '', 'password' => $_POST['password'] ?? '', 'url' => $_POST['url'] ?? '', 'role' => $_POST['role'] ?? 'User'];
      $user = new CRUD();
      $update = $user->UpdateById('User', (int) $_POST['id'], $use);
      echo $update;



   } else {
      echo "id required";
   }

}



?>