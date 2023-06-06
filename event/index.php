<?php
require "../DB.php";
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
   case ('GET'):
      GetEvents();
      break;
   case ('POST'):
      CreateEvent();
      break;

   default;
}

function GetEvents()
{
   if (isset($_GET['id'])) {
      $id = (integer) $_GET['id'];
      $user = new CRUD();
      $res = $user->DisplayById($id, "Events");
      http_response_code(200);
      echo $res;
   } else {
      $user = new CRUD();
      $um = $user->Display("Event");
      header('Content-Type: application/json');
      http_response_code(200);
      echo $um;
   }
}

function CreateEvent()
{
   if ($_POST['title'] && $_POST['latitude'] && $_POST['longitude'] && $_POST['start_date'] && $_POST['end_date'] && isset($_POST['price'])) {
      $use = ['title' => $_POST['title'], 'latitude' => $_POST['latitude'], 'longitude' => $_POST['longitude'], 'start_date' => $_POST['start_date'], 'end_date' => $_POST['end_date'], 'price' => $_POST['price']];
      $user = new CRUD();
      $res = $user->CreateData('Event', $use);
      header('Content-Type: application/json');
      http_response_code(200);
      
      echo $res;
   }

}

?>