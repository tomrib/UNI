<?php
require_once "database.php";
class intervention
{
    public $db = NULL;
    public int $id = 0;
    public string $text = "";
    public string $img = "";
    public int $id_business  = 0;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4', DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
