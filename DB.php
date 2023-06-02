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
         echo "connected";
         return $Db_Connect;
      }
   }

   function CreateData(string $tablename)
   {
      $con = $this->connect();
      $stm = $con->prepare("INSERT INTO " . $tablename . "(name,email,password,photo_url,role) VALUES(?,?,?,?,?)");
      $stm->bind_param("sssss", $name, $email, $password, $url, $roll);
      $name = "abe";
      $email = "pasword@gmail.com";
      $password = "pasworddd";
      $url = "jaisdfkjsdf.url";
      $roll = "User";
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
      echo $u;
   }
   function Display($tablename)
   {
      $con = $this->connect();
      $stm = $con->prepare("SELECT * FROM " . $tablename);
      $stm->execute();
      $result = $stm->get_result();
      $getter = $result->fetch_all();
      echo json_encode($getter);
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
      echo $u;
   }

}

?>