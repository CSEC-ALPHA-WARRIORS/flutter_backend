<?php
require '../DB.php';
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
   case ('GET'):
      GetBookmark();
      break;
   case ('POST'):
      CreateBookmark();
      break;
   default:
      // Handle unknown endpoint
      header('Content-Type: application/json');
      http_response_code(404);
      echo json_encode(['error' => 'Method not found']);



}


// Handle GET request for "api/Review" endpoint
function GetBookmark()
{
   if (isset($_GET['id'])) {
      $id = (integer) $_GET['id'];
      $user = new CRUD();

      $res = $user->DisplayById($id, "Bookmark");
      http_response_code(200);
      echo $res;
   } else {
      $user = new CRUD();
      $um = $user->Display("Bookmark");
      header('Content-Type: application/json');
      http_response_code(200);
      echo $um;
   }



}
function CreateBookmark()
{
   if ($_POST['user_id'] && $_POST['place_id'] && $_POST['event_id']) {
      $use = ['user_id' => $_POST['user_id'], 'place_id' => $_POST['place_id'], 'event_id' => $_POST['event_id']];
      $user = new CRUD();
      $res = $user->CreateData('Bookmark', $use);
      header('Content-Type: application/json');
      http_response_code(200);
      echo $res;
   }

}



?>