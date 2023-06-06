<?php
require '../DB.php';
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
   case ('GET'):
      GetDesc();
      break;
   case ('POST'):
      CreateDesc();
      break;
   default:
      // Handle unknown endpoint
      header('Content-Type: application/json');
      http_response_code(404);
      echo json_encode(['error' => 'Method not found']);



}


// Handle GET request for "api/Review" endpoint
function GetDesc()
{
   if (isset($_GET['id'])) {
      $id = (integer) $_GET['id'];
      $user = new CRUD();
      echo "helo";
      $res = $user->DisplayById($id, "Description");
      http_response_code(200);
      echo $res;
   } else {
      $user = new CRUD();
      $um = $user->Display("Description");
      header('Content-Type: application/json');
      http_response_code(200);
      echo $um;
   }



}
function CreateDesc()
{
   if ($_POST['event_id'] && $_POST['place_id'] && $_POST['content'] && $_POST['language']) {
      $use = ['event_id' => $_POST['event_id'], 'place_id' => $_POST['place_id'], 'language' => $_POST['language'], 'content' => $_POST['content']];
      $user = new CRUD();
      $res = $user->CreateData('Description', $use);
      header('Content-Type: application/json');
      http_response_code(200);

      echo $res;
   }

}



?>