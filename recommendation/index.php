<?php
require '../DB.php';
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
   case ('GET'):
      GetRecom();
      break;
   case ('POST'):
      CreateRecom();
      break;
   default:
      // Handle unknown endpoint
      header('Content-Type: application/json');
      http_response_code(404);
      echo json_encode(['error' => 'Method not found']);



}


// Handle GET request for "api/Review" endpoint
function GetRecom()
{
   if (isset($_GET['id'])) {
      $id = (integer) $_GET['id'];
      $user = new CRUD();
      echo "helo";
      $res = $user->DisplayById($id, "Recommendation");
      http_response_code(200);
      echo $res;
   } else {
      $user = new CRUD();
      $um = $user->Display("Recommendation");
      header('Content-Type: application/json');
      http_response_code(200);
      echo $um;
   }



}
function CreateRecom()
{
   if ($_POST['name'] && $_POST['place_id'] && $_POST['pricing']) {
      $use = ['name' => $_POST['name'], 'place_id' => $_POST['place_id'], 'pricing' => $_POST['pricing']];
      $user = new CRUD();
      $res = $user->CreateData('Recommendation', $use);
      header('Content-Type: application/json');
      http_response_code(200);
      echo "hello";
      echo $res;
   }

}



?>