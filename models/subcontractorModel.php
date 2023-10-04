<?php
require_once "database.php";
class subcontractor
{
    public $db = NULL;
    public int $id = 0;
    public string $name = "";
    public string $contactName = "";
    public string $address = "";
    public string $phone = "";
    public string $email = "";

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function listSubcontractor()
    {
        $query = '
        SELECT `id`, `name` FROM `jg7b_subcontractor`;
        ';
        $request = $this->db->query($query);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

}
