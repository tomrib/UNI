<?php
require_once "database.php";
class business
{
    public $db = NULL;
    public int $id = 0;
    public string $name = "";
    public string $address = "";
    public int $phone = 0;
    public string $email = "";
    public int $siret = 0;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4', DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
