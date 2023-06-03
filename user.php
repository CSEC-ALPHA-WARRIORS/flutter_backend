<?php
$method = $_SERVER['REQUEST_METHOD'];
$endpoint = $_SERVER['REQUEST_URI'];

// Handle GET request for "/users" endpoint
if ($method === 'GET' && $endpoint === '/users') {
   $users = ['John', 'Jane', 'Mike'];

   // Generate the API response
   $response = json_encode(['users' => $users]);

   // Set the appropriate headers
   header('Content-Type: application/json');
   http_response_code(200);

   // Return the response
   echo $response;
} else {
   // Handle unknown endpoint
   header('Content-Type: application/json');
   http_response_code(404);
   echo json_encode(['error' => 'Endpoint not found']);
}
?>