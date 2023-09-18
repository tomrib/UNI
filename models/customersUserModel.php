<?php
require_once "database.php";
class customersUser
{
    public $db = NULL;
    public int $id_customers = 0;
    public int $id_users = 0;
    public string $date = "";
    public string $startDatePlanned = "";
    public string $endDatePlanned = "";
    public string $startDateReal = "";
    public string $endDateReal = "";

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
