<?php
require '../../DB.php';
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];


if ($method == 'POST') {
   if ($_POST['id']) {
      $use = ['name' => $_POST['name'] ?? '', 'describtion' => $_POST['describtion'] ?? '', 'cover_pic' => $_POST['cover_pic'] ?? ''];
      $user = new CRUD();
      $update = $user->UpdateById('Category', (int) $_POST['id'], $use);
      echo $update;



   } else {
      echo "id required";
   }

} else {

}



?>