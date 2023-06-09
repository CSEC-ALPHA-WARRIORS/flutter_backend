<?php
require '../../DB.php';
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];

echo $method;
if ($method == "POST") {
   if (isset($_POST['url']) && isset($_POST['id'])) {

      $Data = ['url' => $_POST['url']];
      $User = new CRUD();
      $Update = $User->UpdateById('Photo', (int) $_POST['id'], $Data);
      echo $Update;

   } else {
      echo json_encode(["error" => "parameter missed"]);
   }

}

?>