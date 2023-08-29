<?php
require_once "database.php";
class time
{
    public $db = NULL;
    public int $id = 0;
    public string $arrived = "";
    public string $disparates = "";
    public int $id_users  = 0;
  

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4', DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
