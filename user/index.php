<?php
require '../DB.php';
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];


switch ($method) {
   case ('GET'):
      GetUsers();
      break;
   case ('POST'):
      CreateUser();
      break;

   default;
}


// Handle GET request for "api/user" endpoint
function GetUsers()
{
   if ($_GET['id']) {
      $id = (integer) $_GET['id'];
      echo "herr";
      echo $id;
      $user = new CRUD();
      $res = $user->DisplayById($id, "User");
      echo $res;
   } else {
      $user = new CRUD();
      $um = $user->Display("User");
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
function CreateUser()
{
   if ($_POST['name'] && $_POST['email'] && $_POST['password'] && $_POST['url']) {
      $use = ['name' => $_POST['name'], 'email' => $_POST['email'], 'password' => $_POST['password'], 'url' => $_POST['url'], 'role' => $_POST['role'] ?? 'User'];
      $user = new CRUD();
      $res = $user->CreateData('User', $use);
      header('Content-Type: application/json');
      http_response_code(200);
      echo $res;
   }

}
function UpdateUser()
{
   if ($_GET['id']) {
      $id = $_GET['id'];
      $data = ['name' => $_POST['name'], 'email' => $_POST['email'], 'password' => $_POST['password'], 'url' => $_POST['url'], 'role' => $_POST['role'] ?? 'User'];
      echo "me";
      $user = new CRUD();
      $update = $user->UpdateById('User', $id, $data);
      echo $update;
   }
}

?>