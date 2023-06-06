<?php
require '../../DB.php';
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];

echo $method;
if ($method == "POST") {
   if (isset($_POST['title']) && isset($_POST['latitude']) && isset($_POST['longitude']) && isset($_POST['distance']) && isset($_POST['region']) && isset($_POST['id'])) {

      $Data = ['title' => $_POST['title'], 'latitude' => $_POST['latitude'], 'longitude' => $_POST['longitude'], 'region' => $_POST['region'], 'distance' => $_POST['distance']];
      $User = new CRUD();
      $Update = $User->UpdateById('Place', (int) $_POST['id'], $Data);
      echo $Update;

   } else {
      echo json_encode(["error" => "parameter missed"]);
   }

}

?>