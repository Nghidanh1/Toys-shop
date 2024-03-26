<?php

class Connect{
    public $server;
    public $dbname;
    public $uname;
    public $pass;

    public function __construct()
    {
        $this->server ="localhost";
        $this->dbname = "shop_GCC210350";
        $this->uname = "root";
        $this->pass = "";
    }
    //option1: mysqli => Select không điều kiện
    function connectToMySQL():mysqli{ // connectToMySQL() sử dụng mysqli để kết nối đến MySQL.
        $conn = new mysqli($this->server,$this->uname,$this->pass,$this->dbname);

        if($conn->connect_error){
            die("Failed ".$conn->connect_error);
        }else{
            // echo "Connect!";
        }
        return $conn;
    }
    //option2: PDO => Select, insert, update, delete có điều kiện
    function connectToPDO():PDO{ //connectToPDO() sử dụng PDO để kết nối đến MySQL.
        try{
            $conn = new PDO("mysql:host=$this->server;dbname=$this->dbname",$this->uname,
            $this->pass);
            // echo "Connect! PDO";
        }catch(PDOException $e){
            die("Failed ".$e);
        }
        return $conn;
    }
}


$c = new Connect();
$c->connectToMySQL();
echo "<br>";
$c->connectToPDO();

?>