<?php
require_once "database.php";
class contractsTypes
{
    public $db = NULL;
    public int $id = 0;
    public string $name = "";

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4', DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function listContractTypes()
    {
        $query = 'SELECT `id`, `name` FROM `jg7b_contractstypes`;';
        $request = $this->db->query($query);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
}
