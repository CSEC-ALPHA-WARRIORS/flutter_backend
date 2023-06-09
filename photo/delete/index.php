<?php
require '../../DB.php';
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
   if (isset($_GET['id'])) {
      $user = new CRUD();
      $user->Delete((int) $_GET['id'], 'Photo');
      echo "delete id number " . $_GET['id'];
   } else {
      echo json_encode(['error' => "id not found"]);
   }

}

?>