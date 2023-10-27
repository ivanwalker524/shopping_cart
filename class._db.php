<?php
class DB extends mysqli {
    public $db;
    public function __construct() {
        $host = 'localhost';
        $database = 'shopping-cart';
        $user = 'root';
        $password = '';
        $this->db = new mysqli($host,$user,$password,$database);
    }
}
$conn = new DB;
$db = $conn->db;
