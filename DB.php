<?php

$username = 'root';
$pwd = '';
$Servername = 'localhost';
$Db = 'flutter';

$Db_Connect = new mysqli($Servername, $username, $pwd, $Db);
if($Db_Connect->error){
   die('connection Error' . $Db_Connect->error);
}else{
   echo "connected";
   return $Db_Connect;
}



?>