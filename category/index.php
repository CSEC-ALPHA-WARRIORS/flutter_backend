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

      $res = $user->DisplayById($id, "Category");
      http_response_code(200);
      echo $res;
   } else {
      $user = new CRUD();
      $um = $user->Display("Category");
      header('Content-Type: application/json');
      http_response_code(200);
      echo $um;
   }



}
function CreateCategory()
{
   if ($_POST['name'] && $_POST['describtion'] && isset($_POST['cover_pic'])) {

      $use = ['name' => $_POST['name'], 'describtion' => $_POST['describtion'], 'cover_pic' => $_POST['cover_pic']];
      $user = new CRUD();
      $res = $user->CreateData('Category', $use);
      header('Content-Type: application/json');
      http_response_code(200);

      echo $res;
   }

}



?>