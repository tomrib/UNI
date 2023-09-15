<?php
require_once "database.php";
class interventions
{
    public $db = NULL;
    public int $id = 0;
    public string $text = "";
    public string $img = "";
    public string $datetime = "";
    public int $id_business = 0;
    public int $id_users = 0;
    public int $id_typesInterventions = 0;
    public int $id_subcontractor = 0;


    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
