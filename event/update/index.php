<?php
require '../../DB.php';
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];

echo $method;
if ($method == "POST") {
   if (isset($_POST['title']) && isset($_POST['latitude']) && isset($_POST['longitude']) && isset($_POST['start_date']) && isset($_POST['end_date']) && isset($_POST['price']) && isset($_POST['id'])) {

      $Data = ['title' => $_POST['title'], 'latitude' => $_POST['latitude'], 'longitude' => $_POST['longitude'], 'start_date' => $_POST['start_date'], 'end_date' => $_POST['end_date'], 'price' => $_POST['price']];
      $User = new CRUD();
      $Update = $User->UpdateById('Event', (int) $_POST['id'], $Data);
      echo $Update;

   } else {
      echo json_encode(["error" => "parameter missed"]);
   }

}

?>