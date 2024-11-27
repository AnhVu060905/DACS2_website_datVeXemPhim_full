<?php 
class Database
{
    private $server_name = 'localhost';
    private $user_name = 'root';
    private $pass_word = '';
    private $data ='be-sell-movie-tickets';
    public $conn = "";

    function __construct(){
        $this->ketnoi();
    } 

    function ketnoi(){
        $this->conn = mysqli_connect($this->server_name,$this->user_name,$this->pass_word,$this->data);
        return $this->conn;
    }

    function thucthi($sql){
       $result = mysqli_query($this->conn,$sql);
       return $result;
    }

    function prepare($sql) {
        return $this->conn->prepare($sql);
    }
}
?>