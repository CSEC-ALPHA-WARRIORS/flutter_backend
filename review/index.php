<?php
require '../DB.php';
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];
echo $method;
switch ($method) {
   case ('GET'):
      GetReviews();
      break;
   case ('POST'):
      CreateReview();
      break;

   default;
}


// Handle GET request for "api/Review" endpoint
function GetReviews()
{
   if (isset($_GET['id'])) {
      $id = (integer) $_GET['id'];
      $user = new CRUD();
      $res = $user->DisplayById($id, "Review");
      http_response_code(200);
      echo $res;
   } else {
      $user = new CRUD();
      $um = $user->Display("Review");
      header('Content-Type: application/json');
      http_response_code(200);
      echo $um;
   }

   // } else {
//    // Handle unknown endpoint
//    header('Content-Type: application/json');
//    http_response_code(404);
//    echo json_encode(['error' => 'Endpoint not found']);
}
function CreateReview()
{
   if ($_POST['user_id'] && $_POST['place_id'] && $_POST['comment'] && $_POST['rating']) {
      $use = ['user_id' => $_POST['user_id'], 'place_id' => $_POST['place_id'], 'comment' => $_POST['comment'], 'rating' => $_POST['rating']];
      $user = new CRUD();
      $res = $user->CreateData('Review', $use);
      header('Content-Type: application/json');
      http_response_code(200);
      echo "hello";
      echo $res;
   }

}



?>