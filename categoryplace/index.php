<?php



require '../DB.php';

header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
   case ('GET'):
      GetCategory();
      break;
   case ('POST'):
      CreateCategory();

      break;
   default:
      // Handle unknown endpoint
      header('Content-Type: application/json');
      http_response_code(404);
      echo json_encode(['error' => 'Method not found']);



}


// Handle GET request for "api/Review" endpoint
function GetCategory()
{
   if (isset($_GET['id'])) {
      $id = (integer) $_GET['id'];
      $user = new CRUD();

      $res = $user->DisplayById($id, "CategoryPlace");
      http_response_code(200);
      echo $res;
   } else {
      $user = new CRUD();
      $um = $user->Display("CategoryPlace");
      header('Content-Type: application/json');
      http_response_code(200);
      echo $um;
   }



}
function CreateCategory()
{
   if ($_POST['CategoryId'] && $_POST['place_id']) {

      $use = ['CategoryId' => $_POST['CategoryId'], 'place_id' => $_POST['place_id']];
      $user = new CRUD();
      $res = $user->CreateData('CategoryPlace', $use);
      header('Content-Type: application/json');
      http_response_code(200);

      echo $res;
   }

}



?>