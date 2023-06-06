<?php
require '../../DB.php';
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];

echo $method;
if ($method == 'POST') {
   if ($_POST['id']) {
      $use = ['comment' => $_POST['comment'] ?? '', 'rating' => $_POST['rating'] ?? ''];
      $user = new CRUD();
      $update = $user->UpdateById('Review', (int) $_POST['id'], $use);
      echo $update;



   } else {
      echo "id required";
   }

} else {

}



?>