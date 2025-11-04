<?php
class Database
{
    private $host = "localhost";
    private $dbname = "student_db";
    private $username = "root";
    private $password = "";
    public $conn;

    public function connect()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Kết nối thất bại: " . $e->getMessage();
        }
        return $this->conn;
    }
}
// class concac
// {
//     public $concaca;
//     private $host = "localhost";
//     private $dbname = "student_db";
//     private $username = "root";
//     private $password = "";
//     public function conntected(){
//         $this->concaca = null;
//         try{
//            $this->concaca = new PDO("mysql:host={$this->host},dbname={$this->dbname},$this->username,$this->password");
//            $this->concaca->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


//         }
//          catch(PDOException $e){
//             echo $e->getMessage();
//         }
//         return $this->concaca;
//     }
// }
