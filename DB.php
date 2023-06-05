<?php



class CRUD
{


   function connect()
   {
      $username = 'root';
      $pwd = '';
      $Servername = 'localhost';
      $Db = 'flutter_project';

      $Db_Connect = new mysqli($Servername, $username, $pwd, $Db);
      if ($Db_Connect->error) {
         die('connection Error' . $Db_Connect->error);
      } else {
         
         return $Db_Connect;
      }
   }

   function CreateData(string $tablename, $user)
   {

      $table = [
         'User' => [
            "INSERT INTO User(name,email,password,photo_url,role) VALUES(?,?,?,?,?)",
            "sssss",
            [
               $user['name'] ?? '',
               $user['email'] ?? '',
               $user['password'] ?? '',
               $user['url'] ?? '',
               $user['role'] ?? ''
            ]
         ],
         'Review' => [
            "INSERT INTO Review(user_id,place_id,comment,rating) VALUES(?,?,?,?)",
            "iiss",
            [
               (int) $user['user_id'],
               (int) $user['place_id'],
               $user['comment'],
               $user['rating']
            ]
         ],
         'Bookmark' => [
            "INSERT INTO Bookmark(user_id,place_id,event_id) VALUES(?,?,?)",
            "iiss",
            [
               (int) $user['user_id'],
               (int) $user['place_id'],
               (int) $user['event_id']
            ]
         ],
         'Event' => [
            "INSERT INTO Event(title,latitude,longitude,start_date,end_date,price) VALUES(?,?,?,?,?,?)",
            "siissi",
            [
               $user['title'],
               (int) $user['latitude'],
               (int) $user['longitude'],
               $user['start_date'],
               $user['end_date'],
               (int) $user['price']

            ]
         ]

      ];
      $con = $this->connect();
      $stm = $con->prepare($table[$tablename][0]);
      $stm->bind_param($table[$tablename][1], ...$table[$tablename][2]);
      $stm->execute();
      $insertedId = $stm->insert_id;
      $stm->close();

      // Retrieve the inserted data from the database
      $query = "SELECT * FROM " . $tablename . " WHERE id = ?";
      $stm = $con->prepare($query);
      $stm->bind_param("i", $insertedId);
      $stm->execute();
      $result = $stm->get_result();
      $insertedData = $result->fetch_assoc();
      $u = json_encode($insertedData);
      // Print the inserted data
      return $u;
   }
   function Display($tablename)
   {
      $con = $this->connect();
      $stm = $con->prepare("SELECT * FROM " . $tablename);
      $stm->execute();
      $result = $stm->get_result();
      $user = [];
      while ($getter = $result->fetch_assoc()) {
         $user[] = $getter;
      }
      return json_encode(['user' => $user]);

   }
   function DisplayById(int $id, string $tablename)
   {
      $con = $this->connect();
      $query = "SELECT * FROM " . $tablename . " WHERE id = ?";
      $stm = $con->prepare($query);
      $stm->bind_param("i", $id);
      $stm->execute();
      $result = $stm->get_result();
      $insertedData = $result->fetch_assoc();
      $u = json_encode($insertedData);
      return $u;
   }
   function UpdateById(string $tablename, int $id, array $Data)
   {
      $con = $this->connect();
      $GetOldData = json_decode($this->DisplayById($id, $tablename), true);


      $name = $Data['name'] == "" ? $GetOldData['name'] : $Data['name'];
      $email = $Data['email'] == "" ? $GetOldData['email'] : $Data['email'];

      $password = $Data['password'] == '' ? $GetOldData['password'] : $Data['password'];

      $photo = $Data['url'] == '' ? $GetOldData['url'] : $Data['url'];
      $role = $Data['role'] == '' ? $GetOldData['role'] : $Data['role'];
      $sql = "UPDATE " . "$tablename " . "SET name = ? ,email = ? ,password = ? ,photo_url = ? ,role = ? WHERE id = ?";
      $result = $con->prepare($sql);
      $result->bind_param("sssssi", $name, $email, $password, $photo, $role, $id);


      $result->execute();
      $result->close();


      return $this->DisplayById($id, $tablename);
      if (!$result) {
         $errormessage = 'invalid query ' . $con->error;
         echo $errormessage;
      }


   }
   function Delete(int $id, string $tablename)
   {

      $con = $this->connect();
      $sql = "DELETE FROM " . $tablename . " WHERE id = ?";
      $del = $con->prepare($sql);
      $del->bind_param("i", $id);
      $del->execute();
   }

}

?>