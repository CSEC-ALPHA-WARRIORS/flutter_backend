<?php
require '../../DB.php';
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];


if ($method == 'POST') {
   if ($_POST['id']) {
      $use = ['language' => $_POST['language'] ?? '', 'content' => $_POST['content'] ?? ''];
      $user = new CRUD();
      $update = $user->UpdateById('Description', (int) $_POST['id'], $use);
      echo $update;



   } else {
      echo "id required";
   }

} else {

}



?>