<?php

require 'DB.php';
header('Content-Type: application/json');

// Retrieve the HTTP method and requested endpoint
$method = $_SERVER['REQUEST_METHOD'];
$endpoint = $_SERVER['PATH_INFO'] ?? '';
$end = $_SERVER['REQUEST_URI'];


// Define your API routes and corresponding actions
$routes = [
   'GET' => [
      '/user' => 'getuser'
      // '/users/{id}/' => 'getUserById',
   ],
   'POST' => [
      '/users' => 'createUser',
   ],
   'PUT' => [
      '/users/{id}' => 'updateUser',
   ],
   'DELETE' => [
      '/users/{id}' => 'deleteUser',
   ],
];

// Handle the API request
if (isset($routes[$method])) {
   foreach ($routes[$method] as $route => $action) {
      $pattern = '/^' . str_replace('/', '\/', $route) . '$/';
      echo preg_match($pattern, $endpoint, $matches);
      echo $pattern;
      echo $endpoint;
      echo $matches;
      if (preg_match($pattern, $endpoint, $matches)) {
         // Extract the route parameters
         $params = array_slice($matches, 1);

         // Call the corresponding action
         if (function_exists($action)) {
            echo call_user_func_array($action, $params);

            exit();
         } else {
            echo json_encode(['error' => 'route not found']);
            exit();
         }
      }
   }
}


function getuser()
{
   if ($_GET['id'] || $_POST['id']) {
      $id = (integer) $_GET['id'];
      echo "herr";
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

}
function createUser()
{



   $use = ['name' => $_POST['name'], 'email' => $_POST['email'], 'password' => $_POST['password'], 'url' => $_POST['url'], 'role' => $_POST['role'] ?? 'User'];
   $user = new CRUD();
   $res = $user->CreateData('User', $use);
   header('Content-Type: application/json');
   http_response_code(200);
}
function getUserById()
{

}


?>