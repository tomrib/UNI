<?php
require_once "database.php";

class imginterventions
{
    public $db = NULL;
    public int $id = 0;
    public string $img = "";
    public int $id_interventions  = 0;


    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function addImgIntervention()
    {
        $query = 'INSERT INTO `jg7b_imginterventions` (
            `img`
        ) VALUES (
            :img
        );';
        $request = $this->db->prepare($query);
        $request->bindValue(':img', $this->img, PDO::PARAM_STR);
        $request->execute();
    }
}
