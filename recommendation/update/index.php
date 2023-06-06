<?php
require '../../DB.php';
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];

echo $method;
if ($method == "POST") {
   if (isset($_POST['name']) && isset($_POST['pricing']) && isset($_POST['id'])) {

      $Data = ['name' => $_POST['name'], 'pricing' => $_POST['pricing']];
      $User = new CRUD();
      $Update = $User->UpdateById('Recommendation', (int) $_POST['id'], $Data);
      echo $Update;

   } else {
      echo json_encode(["error" => "parameter missed"]);
   }

}

?>