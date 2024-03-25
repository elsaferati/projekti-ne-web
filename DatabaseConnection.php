<?php

class DatabaseConnection{
    private $server="localhost";
    private $username="root";
    private $password="";
    private $database = "userinfo";

    private $port = "4306";


    function startConnection(){

        try{
            $conn = new PDO("mysql:host=$this->server;port=$this->port;dbname=$this->database",$this->username,$this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch(PDOException $e){
            echo "Database Connection Failed".$e->getMessage();
            return null;
        }


    }
}

?>