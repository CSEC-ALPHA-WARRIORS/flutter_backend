<?php
require '../DB.php';
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
   case ('GET'):
      GetPlaces();
      break;
   case ('POST'):
      CreatePlace();
      break;
   default:
      // Handle unknown endpoint
      header('Content-Type: application/json');
      http_response_code(404);
      echo json_encode(['error' => 'Method not found']);



}


// Handle GET request for "api/Review" endpoint
function GetPlaces()
{
   if (isset($_GET['id'])) {
      $id = (integer) $_GET['id'];
      $user = new CRUD();

      $res = $user->DisplayById($id, "Place");
      http_response_code(200);
      echo $res;
   } else {
      $user = new CRUD();
      $um = $user->Display("Place");
      header('Content-Type: application/json');
      http_response_code(200);
      echo $um;
   }



}
function CreatePlace()
{
   if ($_POST['title'] && $_POST['latitude'] && $_POST['longitude'] && $_POST['region'] && $_POST['region'] && $_POST['distance']) {
      $use = ['title' => $_POST['title'], 'latitude' => $_POST['latitude'], 'longitude' => $_POST['longitude'], 'region' => $_POST['region'], 'distance' => $_POST['distance']];
      $user = new CRUD();
      $res = $user->CreateData('Place', $use);
      header('Content-Type: application/json');
      http_response_code(200);
      echo $res;
   }

}



?>