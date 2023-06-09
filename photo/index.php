<?php
require '../DB.php';
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
   case ('GET'):
      GetPhotos();
      break;
   case ('POST'):
      CreatePostPhoto();
      break;
   default:
      // Handle unknown endpoint
      header('Content-Type: application/json');
      http_response_code(404);
      echo json_encode(['error' => 'Method not found']);



}


// Handle GET request for "api/Review" endpoint
function GetPhotos()
{
   if (isset($_GET['id'])) {
      $id = (integer) $_GET['id'];
      $user = new CRUD();

      $res = $user->DisplayById($id, "Photo");
      http_response_code(200);
      echo $res;
   } else {
      $user = new CRUD();
      $um = $user->Display("Photo");
      header('Content-Type: application/json');
      http_response_code(200);
      echo $um;
   }



}
function CreatePostPhoto()
{
   if ($_POST['place_id'] && $_POST['event_id'] && $_POST['url']) {
      $use = ['place_id' => $_POST['place_id'], 'event_id' => $_POST['event_id'], 'url' => $_POST['url']];
      $user = new CRUD();
      $res = $user->CreateData('Photo', $use);
      header('Content-Type: application/json');
      http_response_code(200);
      echo $res;
   }

}



?>